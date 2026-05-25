<?php

use App\Http\Controllers\auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WelcomeController;
use App\Mail\MyTestEmail;
use Illuminate\Support\Facades\Mail;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UsersController::class, 'index'])->name('users');    //route for listing users
    Route::get('/create', [UsersController::class, 'create'])->name('users.create'); //route for showing create user form
    Route::post('/store', [UsersController::class, 'store'])->name('users.store'); //route for storing new user

    //update and delete routes can be added here 
    Route::get('/{id}', [UsersController::class, 'edit'])->name('users.show'); //route for showing user details
    Route::put('/{id}', [UsersController::class, 'update'])->name('users.update')->can('update', 'post'); //route for updating user details
    Route::delete('/{id}', [UsersController::class, 'destroy'])->name('users.destroy'); //route for deleting user
});


Route::group(['prefix' => 'login'], function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');    //route for login page
    Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate'); //route for handling login form submission
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout'); //route for handling logout



// route for sending test email using Mail::send methodssss
// Route::get('/mail', function () {
//     Mail::send([], [], function ($message) {
//         $message->to("usersup52555@gmail.com", "Test User")
//             ->subject("Test Email")
//             ->text("This is a test email from Laravel 12.");
//     });
//     return "Email sent successfully!";
// });


Route::get('/mail', function () {
    return view('mail.name')->with('name', 'Harpreet Singh');
})->name('mail');

Route::get("/mail_blade", function () {
    $name = "Harpreet Singh";
    Mail::to("test@example.com")->send(new MyTestEmail($name));
});
