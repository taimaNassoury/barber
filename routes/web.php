<?php

use App\Models\SchedualDate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\HomeImgController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DateYearController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\DateBarberController;
use App\Http\Controllers\SchedualDateController;
use App\Http\Controllers\CustomerDetailsController;

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


Route::get('/', [BookController::class, 'index'])->name('index');


Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AuthAdminController::class, 'login_admin'])->name('admin.login');
    Route::post('/login', [AuthAdminController::class, 'login'])->name('login');
    Route::post('/logout', [AuthAdminController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => 'auth:web'], function () {

        Route::get('/cancelled_bookings', [AuthAdminController::class, 'cancel_book'])->name('cancel_book');
        Route::post('/fetch-data', [AuthAdminController::class, 'fetchData'])->name('contentFetching');
        Route::post('/updateStatus', [AuthAdminController::class, 'updateStatus'])->name('updateStatus');
        Route::post('/updateCheck', [AuthAdminController::class, 'updateCheck'])->name('updateCheck');



        Route::get('/services', [ServiceController::class, 'index'])->name('index');
        Route::get('/services/create', [ServiceController::class, 'create'])->name('admin.service.create');
        Route::post('/services/store', [ServiceController::class, 'store'])->name('admin.service.store');
        Route::get('/services/edit/{id}', [ServiceController::class, 'edit'])->name('admin.service.edit');
        Route::put('/services/update/{id}', [ServiceController::class, 'update'])->name('admin.service.update');
        Route::delete('/services/delete/{id}', [ServiceController::class, 'delete'])->name('admin.service.delete');

        Route::get('/home/image/index', [HomeImgController::class, 'index'])->name('admin.img.index');
        Route::get('/home/image/create', [HomeImgController::class, 'create'])->name('admin.img.create');
        Route::post('/home/image/store', [HomeImgController::class, 'store'])->name('admin.img.store');
        Route::get('/home/image/update/{id}', [HomeImgController::class, 'update'])->name('admin.img.update');
        Route::delete('/home/image/delete/{id}', [HomeImgController::class, 'delete'])->name('admin.img.delete');

        Route::get('/home/schedual/date', [SchedualDateController::class, 'index'])->name('admin.date.index');
        Route::get('/home/schedual/date/create', [SchedualDateController::class, 'create'])->name('admin.date.create');
        Route::post('/home/schedual/date/store', [SchedualDateController::class, 'store'])->name('admin.date.store');
        Route::get('/home/schedual/date/edit/{id}', [SchedualDateController::class, 'edit'])->name('admin.date.edit');
        Route::put('/home/schedual/date/update/{id}', [SchedualDateController::class, 'update'])->name('admin.date.update');
        Route::delete('/home/schedual/date/delete/{id}', [SchedualDateController::class, 'delete'])->name('admin.date.delete');

      
        Route::match(['get', 'post'], '/home/DateBarber', [DateBarberController::class, 'index'])->name('admin.date.barber.index');
        Route::get('/home/DateBarber/create', [DateBarberController::class, 'create'])->name('admin.date.barber.create');
        Route::post('/home/DateBarber/store', [DateBarberController::class, 'store'])->name('admin.date.barber.store');
        Route::delete('/home/DateBarber/delete/', [DateBarberController::class, 'delete'])->name('date_barber_delete');
        Route::post('/filter/date/barber', [DateBarberController::class, 'filterDateBarber'])->name('filter_date_barber');


        Route::get('/booking_schedule', function () {
            return view('Dashboard.admin');
        })->name('schedule');
  
    });
});


Route::resource('/books', BookController::class);
Route::resource('/booking',  CustomerDetailsController::class);
Route::get('/showBooking/{id}', [CustomerDetailsController::class, 'showBooking'])->name('showBooking');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
