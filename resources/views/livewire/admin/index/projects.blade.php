<div>
    <div class="card">
        <div class="card-header">
            <!-- Filter Bar -->
            <div class="d-flex flex-wrap align-items-end gap-3">
                <div class="col-12 col-md-auto flex-grow-1">
                    <label for="filterName" class="form-label">Name</label>
                    <input type="text" wire:model.live.debounce.500ms='search' id="filterName" class="form-control w-100"
                        placeholder="Search by name">
                </div>

                <div class="col-12 col-md-auto ms-md-auto">
                    <a href="{{ route('projects.create') }}" class="btn btn-primary w-100">
                        <i class="bi bi-person-plus me-1"></i> Add New Project
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <!-- Users Table -->
            <div class="table-responsive">
                <table id="example" class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Client</th>
                            <th scope="col">Date</th>
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as $project)
                            <tr>
                                <td class="pe-0">{{ $projects->firstItem() + $loop->index }}</td>
                                <td class="ps-0">
                                    <div class="d-flex align-items-center">
                                        <img
                                            src="{{ asset('storage/' . ($project->image ?? NO_IMAGE)) }}" alt=""
                                           class="img-thumbnail" width="80" />
                                        <div class="ms-3">
                                            <h5 class="mb-0">{{ \Illuminate\Support\Str::limit($project->title, 20) }}
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $project->client }}</td>
                                <td>{{ $project->created_at?->format('M d, Y') ?? '—' }}</td>

                                <td>
                                    <a href="{{ route('projects.edit', ['project' => $project->slug]) }}"
                                        class="btn btn-primary btn-sm"> <span wire:ignore><i data-feather="edit"
                                                class="icon-xs"></i></span>Edit</a>
                                    <button type="button" wire:click="confirmDelete('{{ $project->id }}')"
                                        class="btn btn-sm btn-danger">
                                        <span wire:ignore><i data-feather="trash-2" class="icon-xs"></i></span>
                                        Delete</button>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="6">
                                    <span class="text-danger">No records found</span>
                                </td>
                            </tr>
                        @endforelse


                    </tbody>
                </table>
                <div class="mx-3">
                    @isset($projects)
                        {{ $projects->links() }}
                    @endisset
                </div>
            </div>
        </div>
    </div>
    @script
        <script>
            $wire.on('confirm', (event) => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to delete this project. This action cannot be undone.",
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
