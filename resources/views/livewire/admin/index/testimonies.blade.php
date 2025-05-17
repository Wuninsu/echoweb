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
                                data-bs-target="#testimonyModal">
                                Add New Testimony
                            </button>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($testimonials as $testimony)
                                    <tr>
                                        <td class="text-center">
                                            @if ($testimony->image)
                                                <img src="{{ asset('storage/' . ($testimony->image ?? NO_IMAGE)) }}"
                                                    alt="image" class="img-thumbnail" width="80">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                                        <td>{{ $testimony->name }}</td>
                                        <td class="text-center">{{ $testimony->position }}</td>
                                        <td class="text-center">
                                            @if ($testimony->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button wire:click="loadTestimonyData({{ $testimony->id }})"
                                                class="btn btn-sm btn-primary">Edit</button>
                                            <button wire:click="confirmDelete({{ $testimony->id }})"
                                                class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="border-danger text-center mx-4 my-auto">
                                                <i class="fa fa-exclamation-circle fa-2x text-danger fs-3"></i>
                                                <h5 class="card-title text-danger mt-2">No Testimonials Found</h5>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div wire:ignore.self class="modal fade" id="testimonyModal" tabindex="-1" aria-labelledby="testimonyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            {{-- <form wire:submit.prevent="save"> --}}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="testimonyModalLabel">
                            {{ $this->testimony_id ? 'Update' : 'Create New' }}Testimony
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-2 col-md-6">
                                <label class="form-label mb-0">Name</label>
                                <input type="text" wire:model="name"
                                    class="form-control @error('name') border-danger is-invalid @enderror">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-md-6">
                                <label class="form-label mb-0">Position</label>
                                <input type="text" wire:model="position"
                                    class="form-control @error('position') border-danger is-invalid @enderror">
                                @error('position')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-12">
                                <label class="form-label mb-0">Message</label>
                                <textarea wire:model="message"
                                    class="form-control @error('message') border-danger is-invalid @enderror"></textarea>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-2 col-12">
                                <label class="form-label mb-0">Image</label>
                                <input type="file" wire:model="image"
                                    class="form-control @error('image') border-danger is-invalid @enderror">
                                <span wire:loading wire:target="image" class="text-success">uploading...</span>
                                @if ($image)
                                    <img src="{{ $image ? $image->temporaryUrl() : asset('storage/' . ($showImg ?? NO_IMAGE)) }}"
                                        class="img-thumbnail mt-2" width="100">
                                @endif
                                @error('image')
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
                        <button wire:click="createOrUpdateSlider" class="btn btn-primary float-right"
                            wire:loading.attr="disabled">
                            <span wire:loading.remove>Submit Data</span>
                            <span wire:loading wire:target="createOrUpdateSlider">
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
        $('#testimonyModal').modal('hide');
    });
    $wire.on('show-modal', (event) => {
        $('#testimonyModal').modal('show');
    });

    $wire.on('confirm', (event) => {
        Swal.fire({
            title: "Are you sure?",
            text: "You are about to delete this testimony. This action cannot be undone..",
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