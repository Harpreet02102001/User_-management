<x-layout title="Users">
    <!-- User Master and List -->
    <div class="d-flex justify-content-between py-1 mb-2 border-bottom">
        <h4 class="text-primary">User Master</h4>
        <!-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
            Add New User
        </button> -->
        <a href="{{ route('users.create') }}" class="btn btn-primary">Add New User</a>
    </div>
    <table class="table table-striped">

        <thead class="table-light">
            <tr>
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
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->mobile }}</td>
                <td>{{ $user->department ?? 'N/A' }}</td>
                <td>{{ $user->roles->name ?? 'N/A' }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->is_active ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{route('users.show', $user->id)}}" class="btn btn-sm btn-outline-primary">Edit</a>
                    <form action="" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">No users found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</x-layout>