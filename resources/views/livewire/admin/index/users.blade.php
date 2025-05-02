<div class="">
    <div class="card">
        <div class="card-header">
            <!-- Filter Bar -->
            <div class="d-flex flex-wrap align-items-end gap-3">
                <div class="col-12 col-md-auto flex-grow-1">
                    <label for="filterName" class="form-label">Name</label>
                    <input type="text" wire:model.live.debounce.500ms='search' id="filterName"
                        class="form-control w-100" placeholder="Search by name">
                </div>

                <div class="col-12 col-md-auto flex-grow-1">
                    <label for="filterRole" class="form-label">Role</label>
                    <select wire:model.change="role" id="filterRole" class="form-select w-100">
                        <option value="">All</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 col-md-auto ms-md-auto">
                    <a href="{{ route('users.create') }}" class="btn btn-primary w-100">
                        <i class="bi bi-person-plus me-1"></i> Add User
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
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td class="pe-0">{{ $users->firstItem() + $loop->index }}</td>
                                <td class="ps-0">
                                    <div class="d-flex align-items-center">
                                        <img width="50" src="{{ asset('storage/' . ($user->avatar ?? NO_IMAGE)) }}"
                                            alt="" class="img-4by3-sm rounded-3" />
                                        <div class="ms-3">
                                            <h5 class="mb-0">
                                                <a href="#!" class="text-inherit">{{ $user->username }}</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    @foreach ($user->getRoleNames() as $role)
                                        @php
                                            $badgeClass = match ($role) {
                                                'admin' => 'bg-danger',
                                                'editor' => 'bg-success',
                                                'user' => 'bg-primary',
                                                'super-admin' => 'bg-primary',
                                                default => 'bg-secondary',
                                            };
                                        @endphp
                                        <span class="badge {{ $badgeClass }}">{{ ucfirst($role) }}</span>
                                    @endforeach

                                </td>
                                <td>
                                    <a href="{{ route('users.edit', ['user' => $user->uuid]) }}"
                                        class="btn btn-primary btn-sm"> <span wire:ignore><i data-feather="edit"
                                                class="icon-xs"></i></span>Edit</a>
                                    <button type="button" @if ($user->hasRole('super-admin') || $user->hasRole('admin')) disabled @endif
                                        wire:click="confirmDelete('{{ $user->uuid }}')"
                                        class="btn btn-sm btn-danger">
                                        <span wire:ignore><i data-feather="trash-2" class="icon-xs"></i></span>
                                        Delete
                                    </button>

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
                    @isset($users)
                        {{ $users->links() }}
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
