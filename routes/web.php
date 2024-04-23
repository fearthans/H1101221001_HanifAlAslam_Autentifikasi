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
        } elseif (auth()->user()->type == 'superadmin') {
            $home = '/superadmin/home';
        } elseif (auth()->user()->type == 'akademik') {
            $home = '/akademik/home';
        } elseif (auth()->user()->type == 'keuangan') {
            $home = '/keuangan/home';
        } elseif (auth()->user()->type == 'direktur') {
            $home = '/direktur/home';
        } elseif (auth()->user()->type == 'tendik') {
            $home = '/tendik/home';
        } elseif (auth()->user()->type == 'lppm') {
            $home = '/lppm/home';
        } elseif (auth()->user()->type == 'sdm') {
            $home = '/sdm/home';
        } elseif (auth()->user()->type == 'mahasiswa') {
            $home = '/mahasiswa/home';
        } elseif (auth()->user()->type == 'user') {
            $home = '/home';
        } elseif (auth()->user()->type == 'wd1') {
            $home = '/wd1/home';
        } elseif (auth()->user()->type == 'wd2') {
            $home = '/wd2/home';
        } elseif (auth()->user()->type == 'wd3') {
             $home = '/wd3/home';
        } elseif (auth()->user()->type == 'adminuser') {
             $home = '/adminuser/home';
        } elseif (auth()->user()->type == 'dosen') {
           $home = '/dosen/home';
        } 
    }
    else {$home = '/home';}
    return view('welcome')->with('home', $home);
})->name('welcome');

Auth::routes();

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:adminuser'])->group(function () {
    Route::get('/adminuser/home', [
        HomeController::class,
        'adminHome'
    ])->name('adminuser-home');
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
    ])->name('manager-home');
});

Route::middleware(['auth', 'user-access:superadmin'])->group(function () {
    Route::get('/superadmin/home', [
        HomeController::class,
        'superAdminHome'
    ])->name('superadmin-home');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', function(){
        return view('admin-home');
    })->name('admin.home');
});

Route::middleware(['auth', 'user-access:akademik'])->group(function () {
    Route::get('/akademik/home', function(){
        return view('akademik-home');
    })->name('akademik.home');
});

Route::middleware(['auth', 'user-access:direktur'])->group(function () {
    Route::get('/direktur/home', function(){
        return view('direktur-home');
    })->name('direktur.home');
});

Route::middleware(['auth', 'user-access:dosen'])->group(function () {
    Route::get('/dosen/home', function(){
        return view('dosen-home');
    })->name('dosen.home');
});

Route::middleware(['auth', 'user-access:keuangan'])->group(function () {
    Route::get('/keuangan/home', function(){
        return view('keuangan-home');
    })->name('keuangan.home');
});

Route::middleware(['auth', 'user-access:lppm'])->group(function () {
    Route::get('/lppm/home', function(){
        return view('lppm-home');
    })->name('lppm.home');
});

Route::middleware(['auth', 'user-access:mahasiswa'])->group(function () {
    Route::get('/mahasiswa/home', function(){
        return view('mahasiswa-home');
    })->name('mahasiswa.home');
});

Route::middleware(['auth', 'user-access:sdm'])->group(function () {
    Route::get('/sdm/home', function(){
        return view('sdm-home');
    })->name('sdm.home');
});

Route::middleware(['auth', 'user-access:tendik'])->group(function () {
    Route::get('/tendik/home', function(){
        return view('tendik-home');
    })->name('tendik.home');
});

Route::middleware(['auth', 'user-access:wd1'])->group(function () {
    Route::get('/wd1/home', function(){
        return view('wd1-home');
    })->name('wd1.home');
});

Route::middleware(['auth', 'user-access:wd2'])->group(function () {
    Route::get('/wd2/home', function(){
        return view('wd2-home');
    })->name('wd2.home');
});

Route::middleware(['auth', 'user-access:wd3'])->group(function () {
    Route::get('/wd3/home', function(){
        return view('wd3-home');
    })->name('wd3.home');
});