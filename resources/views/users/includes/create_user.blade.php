<x-layout title="add_user">
    <h4 class="text-primary">Add New User</h4>
    <div class="col-lg-8   mx-auto card p-3">
        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="row p-2">
                <div class="form-group col-md-6 p-2">
                    <label for="inputEmail4">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="inputEmail4" placeholder="Name">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6 p-2">
                    <label for="inputPassword4">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="inputPassword4" placeholder="Email">
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group p-2">
                <label for="inputAddress">Mobile</label>
                <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" id="inputAddress" placeholder="Mobile">
                @error('mobile')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group p-2">
                <label for="inputAddress">Department</label>
                <select class="form-control" name="department" selected value="{{  old('department')  }}" id="inputAddress2">
                    <option selected>Choose...</option>
                    <option value="1">Production</option>
                    <option value="2">Sales</option>
                    <option value="3">Marketing</option>
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
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group p-2">
                <label for="inputAddress">Password</label>
                <input type="password" class="form-control" name="password" value="{{ old('password') }}" id="inputAddress" placeholder="Password">
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group p-2">
                <label for="inputAddress">Status</label>
                <select class="form-control" name="is_active" id="inputAddress2">
                    <option selected>Choose...</option>
                    <option value="0">Inactive</option>
                    <option value="1">Active</option>
                </select>
                @error('is_active')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group p-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_active" id="gridCheck" {{ old('is_active') ? 'checked' : '' }}>
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add User</button>
        </form>
    </div>
</x-layout>