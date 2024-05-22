<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login/verify', [AuthController::class, 'verify']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerProceed']);
Route::get('/register/activation/{token}', [AuthController::class, 'registerVerify']);


Route::get('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/login');
});

//Route::group([
//    'middleware' => ['auth', 'role.admin'],
//    'prefix' => 'teacher'
//], function () {
//    Route::get('/', [TeacherController::class, 'list']);
////    Route::get('/{id}',[TeacherController::class,'detail']);
//    Route::get('/add', [TeacherController::class, 'add']);
//    Route::get('/export/excel', [TeacherController::class, 'excel'])->name('tch.excel');
//    Route::get('/edit/{id}', [TeacherController::class, 'edit'])->middleware('role.superadmin');
//
//    Route::post('/insert', [TeacherController::class, 'insert']);
//    Route::post('/update', [TeacherController::class, 'update'])->middleware('role.superadmin');
//    Route::post('/delete', [TeacherController::class, 'delete'])->middleware('role.superadmin');
//});

    Route::group(['middleware' => ['auth', 'role.admin'], 'prefix' => 'user'], function () {
        Route::get('/change-password', [TestingController::class, 'changePassword']);

        Route::post('/change-password', [TestingController::class, 'updatePassword']);
    });

    Route::get('mail/test', function () {
        \Illuminate\Support\Facades\Mail::to('jokowi@gmail.com')
            ->queue(new \App\Mail\TestMail());
    });


    Route::group(['prefix' => 'app', 'middleware' => 'auth'], function () {
        Route::get('/', [KasirController::class, 'index']);

        Route::post('/search-barcode', [KasirController::class, 'searchProduct']);
        Route::post('/insert', [KasirController::class, 'insert']);
    });

    Route::group(['prefix' => 'transaksi', 'middleware' => 'auth'], function () {
        Route::get('/', [TransaksiController::class, 'index']);
        Route::get('/{id}/pdf', [TransaksiController::class, 'printPDF']);
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('auth');
