<?php

namespace Database\Seeders;

use App\Models\SmsTemplate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SmsTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $templates = [
            [
                'name' => 'reaching_out_alert',
                'template' => 'New Contact Message Received! From: {customer} ({phone}) Please respond as soon as possible.'
            ],
            [
                'name' => 'reaching_out_thanks',
                'template' => 'Hello {customer},Thank you for reaching out to us! Your message has been received, and we will get back to you shortly. Best regards,StyleAStatement'
            ],
            [
                'name' => 'message_reply_alert',
                'template' => 'A client has responded to a message. Check the conversation here: {reply_link}'
            ],
            [
                'name' => 'contact_reply_notification',
                'template' => 'Hello {customer}, you have a new reply regarding your inquiry. Click here to view and respond: {reply_link}'
            ]
        ];

        foreach ($templates as $template) {
            SmsTemplate::updateOrCreate(['name' => $template['name']], $template);
        }
    }
}
