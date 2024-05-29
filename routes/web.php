<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShiftController;
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



Route::group(['prefix'=>'karyawan'], function() {

    Route::get('/', [KaryawanController::class, 'list']);
    Route::get('/export/excel', [KaryawanController::class, 'excel'])->name('tch.excel');
    Route::get('/add', [KaryawanController::class, 'add']);
    Route::get('/edit/{id}', [KaryawanController::class, 'edit']);
    Route::post('/insert', [KaryawanController::class, 'insert']);
    Route::post('/update', [KaryawanController::class, 'update']);
//    Route::get('/karyawan/add', [KaryawanController::class, 'add'])->name('karyawan.add');
    Route::post('/delete', [KaryawanController::class, 'delete']);
});

Route::group(['prefix' => 'shift'], function () {
    Route::get('/shift', [ShiftController::class, 'list'])->name('shift.index');
    Route::get('/', [ShiftController::class, 'list'])->name('shift.list');
    Route::get('/add', [ShiftController::class, 'add'])->name('shift.add');
    Route::post('/insert', [ShiftController::class, 'insert'])->name('shift.insert');

    Route::post('/update', [ShiftController::class, 'update']);
    Route::get('/edit/{id}', [ShiftController::class, 'edit'])->name('shift.edit');
    Route::post('/delete', [ShiftController::class, 'delete'])->name('shift.delete');
    Route::delete('/shift/delete/{id}', 'ShiftController@delete')->name('shift.delete');
    Route::post('/shift/update/{id}', [ShiftController::class, 'update'])->name('shift.update');
});


Route::group(['prefix'=>'product'], function(){



    Route::get('/product', [ProductController::class, 'list'])->name('product.list');
    Route::get('/product/add', [ProductController::class, 'add'])->name('product.add');
    Route::post('/product/insert', [ProductController::class, 'insert'])->name('product.insert');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

});

Route::group([ 'prefix' => 'user'], function () {
    Route::get('/change-password', [TestingController::class, 'changePassword']);

    Route::post('/change-password', [TestingController::class, 'updatePassword']);
});
