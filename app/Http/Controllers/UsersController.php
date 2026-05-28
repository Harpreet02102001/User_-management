<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\Users\CreateUserRequest;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestEmail;
use App\Notifications\WelcomeUser;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::query();
        $roles = Role::get();

        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if ($request->has('keyword') && $request->input('keyword')) {
            $users = $users->where('name', 'LIKE', '%' . $request->input('keyword') . '%');
        }
        $users = $users->orderBy('name', 'asc')->simplePaginate(10)->withQueryString();
        return view('users/users', compact('users', 'roles'));
    }

    /** 
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $user = Auth::user();
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $this->authorize('create', User::class);
        $roles = Role::get();
        return view('users.includes.create_user', compact('roles'));
        Gate::authorize('update', $post);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        try {
            // dd($request->all());
            DB::beginTransaction();
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => bcrypt($request->password),
                'department' => $request->department,
                'role_id' => $request->role_id,
                'is_active' => $request->has('is_active'),
            ]);
            // return redirect()->route('users')->with('success', 'User created successfully.');
            User::latest()->first()->notify(new WelcomeUser());
            Alert::toast('User created successfully.', 'success')->autoClose(1500);
            User::latest()->first()->notify(new WelcomeUser());
            Alert::toast('User created successfully.', 'success')->autoClose(1500);
            DB::commit();
            return redirect()->route('users');
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::toast('An error occurred while creating the user.', 'error')->autoClose(1500);
            return redirect()->back()->with('error', 'An error occurred while creating the user: ' . $e->getMessage());
        }
    }

    // public  function to send email using mailables
    public function sendEmail()
    {
        $data = [
            'email' => "harpreet@rediff.com",
            'password' => "password123",
        ];

        Mail::to("harpreet.singh@example.com")->send(new MyTestEmail($data['email'], $data['password']));

        return "Email sent successfully!";
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
        $this->authorize('update', $user);
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
            // dd($request->all());
            // $user::validate($request, [
            //     'name' => 'required|string|max:255',
            //     'email' => 'required|email|users,email,' . $user->id,
            //     'mobile' => 'required|string|max:20',
            //     'password' => 'nullable|string|min:6',
            //     'department' => 'required|string|max:255',
            //     'role_id' => 'required|exists:roles,id',
            //     'is_active'  =>     'required|boolean',
            // ]);
            $this->authorize('update', $user);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => bcrypt($request->password),
                'department' => $request->department,
                'role_id' => $request->role_id,
                'is_active' => $request->has('is_active'),
            ]);
            DB::commit();
            Alert::toast('User updated successfully.', 'success')->autoClose(1500);
            return redirect()->route('users');
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::toast('An error occurred while updating the user.', 'error')->autoClose(1500);
            return redirect()->back()->with('error', 'An error occurred while updating the user: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $user = User::findOrFail($id);
            $user->delete();
            DB::commit();
            Alert::toast('User deleted successfully.', 'success')->autoClose(1500);
            return redirect()->route('users');
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::toast('An error occurred while deleting the user.', 'error')->autoClose(1500);
            return redirect()->back()->with('error', 'An error occurred while deleting the user: ' . $e->getMessage());
        }
    }
}
