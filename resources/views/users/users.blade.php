<x-layout title="Users">
    <!-- User Master and List -->

    <div class="d-flex justify-content-between py-1 mb-2 border-bottom">
        <h4 class="text-primary">User Master</h4>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Add New User</a>
    </div>
    <div class="d-flex justify-content-end mb-3">
        <form action="{{ route('users') }}" method="GET" class="w-25">
            <div class="input-group">
                <input type="text" class="form-control" name="keyword" value="{{ request()->input('keyword') }}" placeholder="Search users...">
                <button class="btn btn-outline-primary" type="submit">Search</button>
                <a class="btn btn-outline-secondary" href="{{ route('users') }}">Reset</a>
            </div>
        </form>
    </div>
    <table class="table table-striped hover:table table-bordered">

        <thead class="table-light">
            <tr>
                <th>Sr.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Department</th>
                <th>Role</th>
                <th>Created At</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->mobile }}</td>
                <td>{{ $user->department ?? 'N/A' }}</td>
                <td>{{ $user->roles->name ?? 'N/A' }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->is_active ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{route('users.show', $user->id)}}" class="btn btn-sm btn-outline-primary">Edit</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center">No users found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-start">
        {{ $users->onEachSide(10)->links() }}
    </div>
</x-layout>