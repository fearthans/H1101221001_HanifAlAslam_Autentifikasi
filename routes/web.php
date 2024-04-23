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
   $home = '/home';
    if(isset(auth()->user()->type)){
        if(auth()->user()->type == 'admin'){
            $home = '/admin/home';
        } elseif (auth()->user()->type == 'manager') {
            $home = '/manager/home';
        } elseif (auth()->user()->type == 'superadmin') {
            $home = '/superadmin/home';
        } elseif (auth()->user()->type == 'akademik') {
            $home = '/akademik/home';
        } elseif (auth()->user()->type == 'superadmin') {
            $home = '/superadmin/home';
        } elseif (auth()->user()->type == 'superadmin') {
            $home = '/superadmin/home';
        } elseif (auth()->user()->type == 'superadmin') {
            $home = '/superadmin/home';
        } elseif (auth()->user()->type == 'superadmin') {
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
Route::middleware(['auth', 'user-access:adminuser'])->group(function () {
    Route::get('/adminuser/home', [
        HomeController::class,
        'adminHome'
    ])->name('adminuser.home');
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

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', function(){
        return view('admin.home');
    });
});

Route::middleware(['auth', 'user-access:akademik'])->group(function () {
    Route::get('/akademik/home', function(){
        return view('akademik.home');
    }); 
});

Route::middleware(['auth', 'user-access:direktur'])->group(function () {
    Route::get('/direktur/home', function(){
        return view('direktur.home.blade.php');
    });
});

Route::middleware(['auth', 'user-access:dosen'])->group(function () {
    Route::get('/dosen/home', function(){
        return view('dosen.home.blade.php');
    });
});

Route::middleware(['auth', 'user-access:keuangan'])->group(function () {
    Route::get('/keuangan/home', function(){
        return view('keuangan.home.blade.php');
    });
});

Route::middleware(['auth', 'user-access:lppm'])->group(function () {
    Route::get('/lppm/home', function(){
        return view('lppm.home.blade.php');
    });
});

Route::middleware(['auth', 'user-access:mahasiswa'])->group(function () {
    Route::get('/mahasiswa/home', function(){
        return view('mahasiswa.home.blade.php');
    });
});

Route::middleware(['auth', 'user-access:sdm'])->group(function () {
    Route::get('/sdm/home', function(){
        return view('sdm.home.blade.php');
    });
});

Route::middleware(['auth', 'user-access:tendik'])->group(function () {
    Route::get('/tendik/home', function(){
        return view('tendik.home.blade.php');
    });
});

Route::middleware(['auth', 'user-access:wd1'])->group(function () {
    Route::get('/wd1/home', function(){
        return view('wd1.home.blade.php');
    });
});

Route::middleware(['auth', 'user-access:wd2'])->group(function () {
    Route::get('/wd2/home', function(){
        return view('wd2.home.blade.php');
    });
});

Route::middleware(['auth', 'user-access:wd3'])->group(function () {
    Route::get('/wd3/home', function(){
        return view('wd3.home.blade.php');
    });
});

