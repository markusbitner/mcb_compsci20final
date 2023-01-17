<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return inertia::render('Home');
});

Route::get('/users', function () {
    return inertia::render('Users/Index', [
        'users' => User::query()
        ->when(Request::input('search'), function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })
        ->paginate(10)
        ->withQueryString()
        ->through(fn($user) => [
            'id' => $user->id,
            'name' => $user->name
        ]),

        'filters' => Request::only(['search'])
    ]);
});

Route::get('/users/create', function () {
    return inertia::render('Users/Create');
});

Route::post('/users', function () {
    // validate the request
    $attributes = Request::validate([
        'name' => 'required',
        'email' => ['required', 'email'],
        'password' => 'required',
    ]);

    // create the user
    User::create($attributes);

    // redirect
    return redirect('/users');
});

Route::get('/settings', function () {
    return inertia::render('Settings');
});

Route::post('/logout', function () {
    dd(request('foo'));
});