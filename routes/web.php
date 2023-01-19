<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');
Route::middleware('auth')->group(function () {



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
            'can' => [
                'createUser' => false
            ]
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

});
