<?php

use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard', [
            'projects' => auth()->user()->projects()->get(),
        ]);
    })->name('dashboard');
});



Route::prefix('social')->as('social.')
    ->controller(SocialController::class)
    ->group(function (){
        Route::get('/github', 'github')->name('github');
        Route::any('/github/callback', 'githubCallback')->name('github.callback');

        Route::get('/google', function (){
            return Socialite::driver('google')->redirect();
        })->name('google');
        Route::get('/google/callback', function (){
            $user = Socialite::driver('google')->user();
            dd($user);
        })->name('google.callback');

    });


Route::get('/git', function (){
    $uniqueName = Str::random(10);
    \App\Services\Cloner::clone('https://github.com/FurqatMashrabjonov/Flutter-learning.git',  $uniqueName);

});


Route::prefix('projects')->as('projects.')
    ->controller(ProjectController::class)->group(function (){
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
    });


Route::get('/config', function (){
    dd(config('services.github'));
});


Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();
    dd($user);
    // $user->token
});
