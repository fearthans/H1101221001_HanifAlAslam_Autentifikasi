<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    if(isset(auth()->user()->type)){
        if(auth()->user()->type == 'admin'){
            $home = '/admin/home';
        } elseif (auth()->user()->type == 'manager') {
            $home = '/manager/home';
        } elseif (auth()->user()->type == 'manager') {
            $home = '/superadmin/home';
        }
    } else {$home = '/home';}
    return view('welcome')->with('home', $home);
});

Auth::routes();

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [
        HomeController::class,
        'adminHome'
    ])->name('admin.home');
});
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::get('/manager/home', [
        HomeController::class,
        'managerHome'
    ])->name('manager.home');
});

Route::middleware(['auth', 'user-access:superadmin'])->group(function () {
    Route::get('/superadmin/home', [
        HomeController::class,
        'superAdminHome'
    ])->name('superadmin.home');
});
