<x-layout title="Update User">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit User</div>

                    <div class="card-body">
                        <form method="POST"
                            action="#">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group p-2">
                                <label for="inputAddress">Mobile</label>
                                <input type="text" class="form-control" name="mobile" value="{{ $user -> mobile}}" id="inputAddress" placeholder="Mobile">
                                @error('mobile')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group p-2">
                                <label for="inputAddress">Department</label>
                                <select class="form-control" name="department" value="{{ $user->department }}" id="inputAddress2">
                                    <option value="{{ $user->department }}" selected>{{ $user->department }}</option>
                                    <option selected>Choose...</option>
                                    <option value="1" {{ $user->department == 1 ? 'selected' : '' }}> Production</option>
                                    <option value="2" {{ $user->department == 2 ? 'selected' : '' }}>Sales</option>
                                    <option value="3" {{ $user->department == 3 ? 'selected' : '' }}>Marketing</option>

                                </select>
                                @error('department')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group p-2 mb-3">
                                <label for="inputAddress2">Position/ Role</label>
                                <select class="form-control" name="role_id" id="inputAddress2">
                                    <option selected>Choose...</option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id}}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group p-2">
                                <label for="inputAddress">Password</label>
                                <input type="password" class="form-control" name="password" id="inputAddress" placeholder="Password">
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group p-2">
                                <label for="inputAddress">Status</label>
                                <select class="form-control" name="is_active" value="{{ $user->is_active }}" id="inputAddress2">
                                    <option selected>Choose...</option>
                                    <option value="0" {{ $user->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                                    <option value="1" {{ $user->is_active == 1 ? 'selected' : '' }}>Active</option>
                                </select>
                                @error('is_active')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Add other fields as necessary -->

                            <button type="submit" class="btn btn-primary">Update User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-layout>