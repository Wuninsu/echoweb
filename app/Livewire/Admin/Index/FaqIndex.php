<?php

namespace App\Livewire\Admin\Index;

use App\Models\Faq;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class FaqIndex extends Component
{
    use WithPagination;

    public $question, $answer, $is_active;
    public $faq_id;
    public $search = '';
    protected $queryString = [
        'search' => ['except' => ''],
    ];
    public function mount() {}

    public function rules()
    {
        return [
            'question' => 'required|string|max:255',
            'answer' => 'nullable|string|max:2055',
            'is_active' => 'nullable|boolean',
        ];
    }



    public function confirmDelete($id)
    {
        $this->dispatch('confirm', id: $id);
    }

    #[On('delete')]
    public function delete($id)
    {
        $faq = Faq::find($id);
        if ($faq) {
            // Delete faq from database
            $faq->delete();
            sweetalert()->success('Data deleted successfully.');
        } else {
            sweetalert()->error('No data was found');
        }
    }


    public function loadFaqData($id)
    {
        $faq = Faq::findOrFail($id);
        if ($faq) {
            $this->faq_id = $faq->id;
            $this->question = $faq->question;
            $this->answer = $faq->answer;
            $this->is_active = $faq->is_active == 1 ? true : false;
            $this->dispatch('show-modal');
        }
    }



    public function createOrUpdateFaq()
    {
        $this->validate();

        DB::beginTransaction();

        try {
            Faq::updateOrCreate(
                ['id' => $this->faq_id],
                [
                    'question' => strip_tags($this->question),
                    'answer' => strip_tags($this->answer),
                    'is_active' => $this->is_active,
                ]
            );


            DB::commit(); // ✅ Commit changes if everything is successful

            sweetalert()->success($this->faq_id ? 'Data updated successfully' : 'Data created successfully');
            $this->resetPage();
            $this->dispatch('close-modal');
        } catch (\Exception $e) {
            DB::rollBack();
            sweetalert()->error('Something went wrong! ' . $e->getMessage());
        }
    }


    public function resetPage()
    {
        $this->reset(['question', 'answer', 'is_active']);
    }

    #[Title('FAQs')]
    public function render()
    {
        $faqs = Faq::query()
            ->when($this->search, function ($query) {
                $query->where('question', 'like', '%' . $this->search . '%');
            })
            ->latest()->paginate(paginationLimit());
        return view('livewire.admin.index.faq-index', compact('faqs'));
    }
}
