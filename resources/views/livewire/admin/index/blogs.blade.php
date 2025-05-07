<div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex flex-wrap align-items-end gap-3 mb-3">
                <div class="col-12 col-md-auto flex-grow-1">
                    <label for="filterName" class="form-label">Name</label>
                    <input type="text" wire:model.live.debounce.500ms='search' id="filterName"
                        class="form-control w-100" placeholder="Search by name">
                </div>
                <div class="col-12 col-md-auto flex-grow-1">
                    <label for="filterStatus">Status</label>
                    <select wire:model.change="status"
                        class="form-control @error('status') border-danger is-invalid @enderror">
                        <option value="">All</option>
                        <option value="draft">Draft</option>
                        <option value="published">Published</option>
                    </select>
                </div>

                <div class="col-12 col-md-auto ms-md-auto">
                    <a href="{{ route('posts.create') }}" class="btn btn-primary w-100">
                        <i class="bi bi-person-plus me-1"></i> Add New Blog Post
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Published</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($blogs as $blog)
                                <tr>
                                    <td>{{ \Illuminate\Support\Str::limit($blog->title, 20) }}</td>
                                    <td>{{ $blog->author->name ?? 'N/A' }}</td>
                                    <td>
                                        @if ($blog->status == 'published')
                                            <span class="badge bg-success">
                                                {{ $blog->status }}
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                {{ $blog->status }}
                                            </span>
                                        @endif

                                    </td>
                                    <td>{{ $blog->published_at?->format('M d, Y') ?? '—' }}</td>
                                    <td>
                                        <a href="{{ route('posts.show', $blog->slug) }}" class="btn btn-sm btn-info"><i
                                                class="bi bi-eye"></i>View</a>
                                        <a href="{{ route('posts.edit', $blog->slug) }}" class="btn btn-sm btn-warning"><i
                                                class="bi bi-pencil-square"></i>Edit</a>
                                        <button type="button" wire:click="confirmDelete('{{ $blog->id }}')"
                                            class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No blog posts found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $blogs->links() }}
            </div>
        </div>
    </div>

    @script
    <script>
        $wire.on('confirm', (event) => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You are about to delete this blog post. This action cannot be undone.",
                icon: 'warning',
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