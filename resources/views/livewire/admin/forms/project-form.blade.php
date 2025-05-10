<div>
    {{-- <form wire:submit.prevent="save">
        <div class="row">
            <div class="col-lg-8 col-12">
                <!-- card -->
                <div class="card mb-4">
                    <!-- card body -->
                    <div class="card-body">
                        <div>
                            <!-- input -->
                            <div class="mb-3">
                                <label class="form-label mb-0">Project Title</label>
                                <input type="text" wire:model="title"
                                    class="form-control @error('title') border-danger is-invalid @enderror"
                                    placeholder="Enter project title">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label mb-0">Client Name</label>
                                <input type="text" wire:model="client"
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
                                <label class="form-label mb-0">Project Description</label>
                                <textarea wire:model="description"
                                    class="form-control @error('description') border-danger is-invalid @enderror"
                                    id="prod-description" rows="3"></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <h5 class="mb-1">Product Image</h5>
                                <input type="file" wire:model="image"
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
                                wire:model="status" type="checkbox" role="switch" id="flexSwitchStock">
                            <label class="form-check-label" for="flexSwitchStock">Status</label>
                        </div>
                        <div class="">
                            <div class="mb-3">
                                <label class="form-label mb-0">Start Date</label>
                                <input type="date" wire:model="start_date"
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
                                <label class="form-label mb-0">End Date</label>
                                <input type="date" wire:model="end_date"
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
    </form> --}}

    <form wire:submit.prevent="save">
        <div class="row">
            <div class="col-lg-8 col-12">
                <!-- card -->
                <div class="card mb-4">
                    <!-- card body -->
                    <div class="card-body">
                        <div>
                            <!-- input: Project Title -->
                            <div class="mb-3">
                                <label class="form-label mb-0">Project Title</label>
                                <input type="text" wire:model.live="title"
                                    class="form-control @error('title') border-danger is-invalid @enderror"
                                    placeholder="Enter project title">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- input: Client Name -->
                            <div class="mb-3">
                                <label class="form-label mb-0">Client Name</label>
                                <input type="text" wire:model="client"
                                    class="form-control  @error('client') border-danger is-invalid @enderror"
                                    placeholder="Enter client name">
                                @error('client')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- input: Project Description -->
                            <div class="mb-3">
                                <label class="form-label mb-0">Project Description</label>
                                <textarea wire:model="description"
                                    class="form-control @error('description') border-danger is-invalid @enderror"
                                    id="prod-description" rows="3"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- input: Featured Image -->
                            <div class="mb-3">
                                <h5 class="mb-1">Project Image</h5>
                                <input type="file" wire:model="images" multiple class="form-control mb-2">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <span wire:loading wire:target="image" class="text-success">uploading...</span>
                            <div class="">
                                {{-- <img width="100"
                                    src="{{ $image ? $image->temporaryUrl() : asset('storage/' . ($showImg ?? NO_IMAGE)) }}"
                                    alt="" srcset=""> --}}
                                @if ($images)
                                    <div class="mt-3">
                                        @foreach ($images as $image)
                                            <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail me-2" width="100">
                                        @endforeach
                                    </div>
                                @else
                                    <div class="mt-3">
                                        @foreach ($existingImages as $image)
                                            <img src="{{ asset('storage/' . ($image->path ?? NO_IMAGE)) }}"
                                                class="img-thumbnail me-2" width="100">
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <!-- input: Technologies -->
                            <div class="mb-3">
                                <label class="form-label mb-0">Technologies</label>
                                <input type="text" wire:model="technologies"
                                    class="form-control @error('technologies') border-danger is-invalid @enderror"
                                    placeholder="Enter technologies used (comma separated)">
                                @error('technologies')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                                wire:model="status" type="checkbox" role="switch" id="flexSwitchStock">
                            <label class="form-check-label" for="flexSwitchStock">Status</label>
                        </div>

                        <!-- input: Service -->
                        <div class="mb-3">
                            <label class="form-label mb-0">Service</label>
                            <select wire:model="service_id"
                                class="form-control @error('service_id') border-danger is-invalid @enderror">
                                <option value="">Select Service</option>
                                <!-- Loop through available services -->
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->title }}</option>
                                @endforeach
                            </select>
                            @error('service_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- input: Start Date -->
                        <div class="mb-3">
                            <label class="form-label mb-0">Start Date</label>
                            <input type="date" wire:model="start_date"
                                class="form-control  @error('start_date') border-danger is-invalid @enderror"
                                placeholder="">
                            @error('start_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- input: End Date -->
                        <div class="mb-3">
                            <label class="form-label mb-0">End Date</label>
                            <input type="date" wire:model="end_date"
                                class="form-control  @error('end_date') border-danger is-invalid @enderror"
                                placeholder="">
                            @error('end_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- input: Featured -->
                        <div class="mb-3">
                            <label class="form-check-label">Featured</label>
                            <input type="checkbox" wire:model="featured" class="form-check-input">
                        </div>

                        <!-- input: Is Visible -->
                        <div class="form-check form-switch mb-4">
                            <input class="form-check-input @error('is_visible') border-danger is-invalid @enderror"
                                wire:model="is_visible" type="checkbox" role="switch" id="flexSwitchVisibility">
                            <label class="form-check-label" for="flexSwitchVisibility">Visible</label>
                            @error('is_visible')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-check-label">Url</label>
                            <input type="text" wire:model="url"
                                class="form-control @error('url') border-danger is-invalid @enderror">
                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

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