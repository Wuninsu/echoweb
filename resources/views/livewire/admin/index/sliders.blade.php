<div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-wrap align-items-end gap-3">
                        <div class="col-12 col-md-auto flex-grow-1">
                            <label for="filterName" class="form-label">Name</label>
                            <input type="text" wire:model.live.debounce.500ms='search' id="filterName"
                                class="form-control w-100" placeholder="Search by name">
                        </div>

                        <div class="col-12 col-md-auto ms-md-auto">
                            <button class="btn btn-primary" data-bs-toggle="modal" wire:click="resetPage"
                                data-bs-target="#sliderModal">
                                <i class="bi bi-plus me-1"></i> Add New Slider
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
                                    <th>Title</th>
                                    <th>Order</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($slides as $slide)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ asset('storage/' . ($slide->image ?? NO_IMAGE)) }}"
                                                alt="Slide Image" class="img-thumbnail" width="80">
                                        </td>
                                        <td>{{ $slide->title }}</td>
                                        <td class="text-center">{{ $slide->order }}</td>
                                        <td class="text-center">
                                            @if ($slide->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button wire:click="loadSliderData({{ $slide->id }})"
                                                class="btn btn-sm btn-primary">Edit</button>
                                            <button wire:click="confirmDelete({{ $slide->id }})"
                                                class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <span class="text-danger">No records found</span>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="mx-auto">
                            @isset($slides)
                                {{ $slides->links() }}
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div wire:ignore.self class="modal fade" id="sliderModal" tabindex="-1" aria-labelledby="sliderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            {{-- <form wire:submit.prevent="save"> --}}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="sliderModalLabel">Update Slide</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-2 col-md-6">
                                <label class="form-label mb-0">Title</label>
                                <input type="text" wire:model="title"
                                    class="form-control @error('title') border-danger is-invalid @enderror">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-md-6">
                                <label class="form-label mb-0">Subtitle</label>
                                <input type="text" wire:model="subtitle"
                                    class="form-control @error('subtitle') border-danger is-invalid @enderror">
                                @error('subtitle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-md-6">
                                <label class="form-label mb-0">Button Text</label>
                                <input type="text" wire:model="button_text"
                                    class="form-control @error('button_text') border-danger is-invalid @enderror">
                                @error('button_text')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-md-6">
                                <label class="form-label mb-0">Button Link</label>
                                <input type="url" wire:model="button_link"
                                    class="form-control @error('button_link') border-danger is-invalid @enderror">
                                @error('button_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-12">
                                <label class="form-label mb-0">Description</label>
                                <textarea wire:model="description"
                                    class="form-control @error('description') border-danger is-invalid @enderror"></textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-6">
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

                            <div class="mb-2 col-md-6">
                                <label class="form-label mb-0">Order</label>
                                <input type="number" wire:model="order"
                                    class="form-control @error('order') border-danger is-invalid @enderror">
                                @error('order')
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
                            aria-label="btn-close">Close</button>
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

@script
<script>
    $wire.on('close-modal', (event) => {
        $('#sliderModal').modal('hide');
    });
    $wire.on('show-modal', (event) => {
        $('#sliderModal').modal('show');
    });

    $wire.on('confirm', (event) => {
        Swal.fire({
            title: "Are you sure?",
            text: "You are about to delete this slider. This action cannot be undone.",
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