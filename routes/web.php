<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::middleware('check.for.lang')->group(function () {

    Auth::routes(['verify' => true]);

    Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth:web');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

    Route::group(['prefix' => 'traveling'], function() {

        Route::get('/about/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'about'])->name('traveling.about');
        Route::get('/show/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'show'])->name('traveling.show');
        Route::get('/show-landmarks/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'showLandmarks'])->name('traveling.show.landmarks');

        // Booking
        Route::get('/reservation/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'makeReservations'])->name('traveling.reservation');
        Route::post('/reservation/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'storeReservations'])->name('traveling.reservation.store');

        // Paying
        Route::get('/pay', [App\Http\Controllers\Traveling\TravelingController::class, 'payWithPaypal'])->name('traveling.pay')->middleware('check.for.price');
        Route::get('/success', [App\Http\Controllers\Traveling\TravelingController::class, 'success'])->name('traveling.success')->middleware('check.for.price');

        // Deals
        Route::get('/deals', [App\Http\Controllers\Traveling\TravelingController::class, 'deals'])->name('traveling.deals');
        Route::any('/search-deals', [App\Http\Controllers\Traveling\TravelingController::class, 'searchDeals'])->name('traveling.deals.search');

    });

    // Users Pages
    Route::get('users/my-bookings', [App\Http\Controllers\Users\UsersController::class, 'bookings'])->name('users.bookings')->middleware('auth:web');

});

// Language
Route::get('lang/set/{lang?}', [App\Http\Controllers\Lang\LangController::class, 'set'])->name('lang.set');

// Admins Panel
Route::get('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'viewLogin'])->name('view.login')->middleware('check.for.auth');
Route::post('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'checkLogin'])->name('check.login');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {

    Route::get('/index', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.dashboard');

    // Admins
    Route::get('/all-admins', [App\Http\Controllers\Admins\AdminsController::class, 'allAdmins'])->name('admins.all.admins');
    Route::get('/create-admins', [App\Http\Controllers\Admins\AdminsController::class, 'createAdmins'])->name('admins.create');
    Route::post('/create-admins', [App\Http\Controllers\Admins\AdminsController::class, 'storeAdmins'])->name('admins.store');

    // Countries
    Route::get('/all-countries', [App\Http\Controllers\Admins\AdminsController::class, 'allCountries'])->name('all.countries');
    Route::get('/create-countries', [App\Http\Controllers\Admins\AdminsController::class, 'createCountries'])->name('create.countries');
    Route::post('/create-countries', [App\Http\Controllers\Admins\AdminsController::class, 'storeCountries'])->name('store.countries');
    Route::get('/delete-countries/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteCountries'])->name('delete.countries');

    // Cities
    Route::get('/all-cities', [App\Http\Controllers\Admins\AdminsController::class, 'allCities'])->name('all.cities');
    Route::get('/create-cities', [App\Http\Controllers\Admins\AdminsController::class, 'createCities'])->name('create.cities');
    Route::post('/create-cities', [App\Http\Controllers\Admins\AdminsController::class, 'storeCities'])->name('store.cities');
    Route::get('/delete-cities/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteCities'])->name('delete.cities');

    // Booking
    Route::get('/all-bookings', [App\Http\Controllers\Admins\AdminsController::class, 'allBookings'])->name('all.bookings');
    Route::get('/edit-booking/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'editBookings'])->name('edit.bookings');
    Route::post('/update-booking/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'updateBookings'])->name('update.bookings');
    Route::post('/update-booking/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'updateBookings'])->name('update.bookings');
    Route::get('/delete-booking/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteBookings'])->name('delete.bookings');

});
