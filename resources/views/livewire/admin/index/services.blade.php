<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <input type="text" wire:model.live="search" class="form-control" placeholder="Search by name...">
                </div>
                <div class="col-md-6 mb-2 ">
                    <div class="float-end">
                        <a class="btn btn-dark" href="{{ route('services.index') }}"><i
                                class="bi bi-arrow-clockwise"></i></a>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div
                    class="@can('manage permissions') col-md-8 @elsecannot('manage permissions') col-md-12 @endcan order-2 order-md-1">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-secondary">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    @can('manage permissions')
                                        <th class="text-end">Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @isset($services)
                                    @forelse ($services as $key => $service)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $service->title }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($service->description, 50, '...') }}</td>
                                            @can('manage permissions')
                                                <td class="text-end">
                                                    <button type="button" wire:click="editService({{ $service->id }})"
                                                        class="btn btn-primary btn-sm"><i
                                                            class="bi bi-pencil-square"></i></button>
                                                    <button type="button" wire:click="confirmDelete({{ $service->id }})"
                                                        class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>

                                                </td>
                                            @endcan
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="6">
                                                <span class="text-danger">No records found</span>
                                            </td>
                                        </tr>
                                    @endforelse
                                @endisset
                            </tbody>
                        </table>
                        <div class="">
                            @isset($services)
                                {{ $services->links() }}
                            @endisset
                        </div>

                    </div>
                </div>
                @can('manage permissions')
                    <div class="col-md-4 order-1 order-md-2">
                        <div class="my-3">
                            <form wire:submit.prevent="{{ $isEdit == true ? 'updateService' : 'saveService' }}">
                                <div class="form-group mb-2">
                                    <label for="name">Service Name</label>
                                    <input id="name" type="text" wire:model.live="title"
                                        class="form-control @error('title') border-danger is-invalid @enderror">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="sicon">Service Icon</label>
                                    <input type="text" wire:model.live="icon" id="sicon"
                                        class="form-control @error('icon') border-danger is-invalid @enderror">
                                    @error('icon')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="desc" class="">Description</label>
                                    <textarea id="desc" class="form-control" wire:model="description"></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2">
                                    @can('manage permissions')
                                        <button type="submit"
                                            class="btn btn-primary mb-0 w-100">{{ $isEdit ? 'Edit ' : 'Add ' }}
                                            Service</button>
                                    @elsecannot('manage permissions')
                                        <button type="submit" class="btn btn-primary mb-0 w-100" disabled>
                                            You do not have permission
                                        </button>
                                    @endcan

                                </div>
                            </form>
                        </div>
                    </div>
                @endcan
            </div>
        </div>
    </div>

    @script
        <script>
            $wire.on('confirm', (event) => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to delete this service. This action cannot be undone.",
                    icon: 'warning',
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
