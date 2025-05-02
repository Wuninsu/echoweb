<div>
    <form wire:submit.prevent="save">
        <div class="row">
            <div class="col-lg-8 col-12">
                <!-- card -->
                <div class="card mb-4">
                    <!-- card body -->
                    <div class="card-body">
                        <div>
                            <!-- input -->
                            <div class="mb-3">
                                <label class="form-label">Project Title</label>
                                <input type="text" wire:model.live="title"
                                    class="form-control @error('title') border-danger is-invalid @enderror"
                                    placeholder="Enter project title">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Client Name</label>
                                <input type="text" wire:model.live="client"
                                    class="form-control  @error('client') border-danger is-invalid @enderror"
                                    placeholder="">
                                @error('client')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- input -->
                            <div class="mb-3">
                                <label class="form-label">Project Description</label>
                                <textarea wire:model.live="description" class="form-control @error('description') border-danger is-invalid @enderror"
                                    id="prod-description" rows="3"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <h5 class="mb-1">Product Image</h5>
                                <input type="file" wire:model.live="image"
                                    class="form-control  @error('image') border-danger is-invalid @enderror">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <span wire:loading wire:target="image" class="text-success">uploading...</span>
                            <div class="">
                                <img width="100"
                                    src="{{ $image ? $image->temporaryUrl() : asset('storage/' . ($showImg ?? NO_IMAGE)) }}"
                                    alt="" srcset="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <!-- card -->
                <div class="card mb-4">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="form-check form-switch mb-4">
                            <input {{ $status ? 'checked' : '' }}
                                class="form-check-input  @error('status') border-danger is-invalid @enderror"
                                wire:model.live="status" type="checkbox" role="switch" id="flexSwitchStock">
                            <label class="form-check-label" for="flexSwitchStock">Status</label>
                        </div>
                        <div class="">
                            <div class="mb-3">
                                <label class="form-label">Start Date</label>
                                <input type="date" wire:model.live="start_date"
                                    class="form-control  @error('start_date') border-danger is-invalid @enderror"
                                    placeholder="">
                                @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- input -->
                            <div class="mb-3">
                                <label class="form-label">End Date</label>
                                <input type="date" wire:model.live="end_date"
                                    class="form-control  @error('end_date') border-danger is-invalid @enderror"
                                    placeholder="">
                                @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        {{ $project_id ? 'Edit ' : 'Create ' }} Project
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
