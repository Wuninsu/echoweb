<?php

namespace App\Livewire\Guest;

use App\Models\ContactMessage;
use App\Models\Setup;
use App\Models\SmsLog;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class Contact extends Component
{
    public $phone, $name, $subject, $message, $supportPhone, $email;
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|regex:/^\d{10,13}$/',
            'subject' => 'required|string',
            'message' => 'required|string',
            // 'email' => 'nullable|string|email'

        ];
    }
    public function mount()
    {
        $setting = Setup::setupData();
        $this->supportPhone = $setting ? $setting['support_phone'] : '0559954080';
    }
    public function sendContactMessage()
    {
        $this->validate();

        DB::beginTransaction();
        try {

            // Save the response as a child message
            $saved = ContactMessage::create([
                'name' => $this->name,
                'phone' => $this->phone ?? 'N/A',
                'subject' => $this->subject,
                'message' => $this->message,
                'email' => $this->phone . '@mail.com',
            ]);

            if ($saved) {

                $placeholdersCallback = fn($r) => [
                    'customer' => $this->name,
                    'phone' => $this->phone,
                ];

                // Guest Message
                $record = [
                    'phone' => $this->phone,
                    'customer' => $this->name,
                ];

                // Staff/Management Alert
                $staff = [
                    'phone' => $this->supportPhone,
                    'customer' => $this->name,
                ];

                // Send SMS Notifications
                SmsLog::sendSmsAndLog($staff, 'reaching_out_alert', $placeholdersCallback);
                SmsLog::sendSmsAndLog($record, 'reaching_out_thanks', $placeholdersCallback);

                DB::commit();

                // Clear form fields
                $this->reset();
                session()->flash('success', 'Thank you for reaching out to us! Your message has been received, and we will get back to you shortly.');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to send message: ' . $e->getMessage());
        }
    }

    public function render()
    {
        seo()
            ->site('Echo Edge Digital Solutions — Contact Us')
            ->title('Contact Us - ' . config('app.name', 'Echo Edge'))
            ->description('Reach out to Echo Edge Digital Solutions for custom digital projects, consultations, or support. Let’s build your next big idea together.')
            ->keywords('Contact Echo Edge, tech support Ghana, Tamale web company, get in touch Echo Edge, digital consultation Ghana')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => asset('header.png'))
            ->flipp('contact', 'o1vhcg5npgfu')
            ->twitterSite('@echoedgeds');

        $setups = Setup::setupData();
        return view('livewire.guest.contact', compact('setups'));
    }
}
