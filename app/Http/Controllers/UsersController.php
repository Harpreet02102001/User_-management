<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\Users\CreateUserRequest;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        $roles = Role::get();
        // dd($users->toArray(), $roles->toArray());
        return view('users/users', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::get();
        // dd($roles->toArray());
        return view('users.includes.create_user', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        try {
            DB::beginTransaction();
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => bcrypt($request->password),
                'department' => $request->department,
                'role' => $request->role,
                'is_active' => $request->has('is_active'),
            ]);
            DB::commit();
            return redirect()->route('users')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while creating the user: ' . $e->getMessage());
        }
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $user = User::findOrFail($id);
        // $roles = Role::get();
        // return view('users.includes.update_user', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::get();
        return view('users.includes.update_user', compact('user', 'roles'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        try {
            DB::beginTransaction();
            $user = User::findOrFail($id);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => bcrypt($request->password),
                'department' => $request->department,
                'role' => $request->role,
                'is_active' => $request->has('is_active'),
            ]);
            DB::commit();
            return redirect()->route('users')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while updating the user: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
