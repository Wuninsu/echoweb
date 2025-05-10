<div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <!-- Filter Bar -->
                    <div class="d-flex flex-wrap align-items-end gap-3">
                        <div class="col-12 col-md-auto flex-grow-1">
                            <label for="filterName" class="form-label">Name</label>
                            <input type="text" wire:model.live.debounce.500ms='search' id="filterName"
                                class="form-control w-100" placeholder="Search by name or position...">
                        </div>

                        <div class="col-12 col-md-auto ms-md-auto">
                            <button class="btn btn-primary" data-bs-toggle="modal" wire:click="resetPage"
                                data-bs-target="#faqModal">
                                Add New FAQ
                            </button>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($faqs as $faq)
                                    <tr>
                                        <td>{{ $faq->question }}</td>
                                        <td class="text-center">
                                            {{ \Illuminate\Support\Str::limit($faq->answer, 30, '...') }}</td>
                                        <td class="text-center">
                                            @if ($faq->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button wire:click="loadFaqData({{ $faq->id }})"
                                                class="btn btn-sm btn-primary">Edit</button>
                                            <button wire:click="confirmDelete({{ $faq->id }})"
                                                class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="border-danger text-center mx-4 my-auto">
                                                <i class="fa fa-exclamation-circle fa-2x text-danger fs-3"></i>
                                                <h5 class="card-title text-danger mt-2">No Faqs Found</h5>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="">
                            @isset($faqs)
                                {{ $faqs->links() }}
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div wire:ignore.self class="modal fade" id="faqModal" tabindex="-1" aria-labelledby="faqModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            {{-- <form wire:submit.prevent="save"> --}}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="faqModalLabel">
                            {{ $this->faq_id ? 'Update' : 'Create New' }} FAQ
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-2 col-12">
                                <label class="form-label mb-0">Question</label>
                                <input type="text" wire:model="question"
                                    class="form-control @error('question') border-danger is-invalid @enderror">
                                @error('question')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-12">
                                <label class="form-label mb-0">Answer</label>
                                <textarea wire:model="answer"
                                    class="form-control @error('answer') border-danger is-invalid @enderror"
                                    placeholder="Enter the answer"></textarea>
                                @error('answer')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-2 col-12">
                                <div class="checkbox">
                                    <label class="form-check-label">
                                        <input type="checkbox" wire:model="is_active"> Is Active
                                    </label>
                                    @error('is_active')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            aria-label="Close">Close</button>
                        <button wire:click="createOrUpdateFaq" class="btn btn-primary float-right"
                            wire:loading.attr="disabled">
                            <span wire:loading.remove>Submit Data</span>
                            <span wire:loading wire:target="createOrUpdateFaq">
                                <i class="fas fa-spinner fa-spin"></i>
                                Submitting, please wait...
                            </span>
                        </button>
                    </div>
                    {{--
            </form> --}}
        </div>
    </div>
</div>
</div>

@script
<script>
    $wire.on('close-modal', (event) => {
        $('#faqModal').modal('hide');
    });
    $wire.on('show-modal', (event) => {
        $('#faqModal').modal('show');
    });

    $wire.on('confirm', (event) => {
        Swal.fire({
            title: "Are you sure?",
            text: "You are about to delete this faq. This action cannot be undone..",
            icon: "warning",
            confirmButtonColor: "#d33",
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $wire.dispatch('delete', {
                    id: event.id
                })
            }
        });
    });
</script>
@endscript
</div>