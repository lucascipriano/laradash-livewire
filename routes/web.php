<?php

use App\Livewire\{Login, Register} ;
use App\Livewire\Pages\{Clientes, Dashboard};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');


Route::get('/logout', function(){
    Auth::logout();
    return redirect()->route('welcome');
})->name('logout');

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::get('/clientes', Clientes::class)->name('clientes');

    Route::get('/settings', function () {

        return view('settings');
    })->name('settings');
});



