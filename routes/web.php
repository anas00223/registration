<?php

use App\Http\Controllers\Authmanager;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('home');
});
Route::get('/login',[Authmanager::class, 'login'])->name('login');

Route::post('/login',[Authmanager::class, 'loginpost'])->name('login.post');

Route::get('/',[Authmanager::class, 'registration'])->name('register');

Route::post('/register',[Authmanager::class, 'registrationpost'])->name('register.post');

Route::get('/logout',[Authmanager::class,'logout'])->name('logout');

Route::get('/home',[Authmanager::class, 'home'])->name('home');