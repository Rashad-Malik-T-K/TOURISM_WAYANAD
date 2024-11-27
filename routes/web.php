<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ResortsController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', [ProductController::class, 'showWelcome'])->name('home');
Route::get('/', function() {
    return redirect()->route('login');  // This will redirect to the login page
});

// Routes to register Restaurant and Resort 
Route::get('/register/restaurant', [RegisteredUserController::class, 'createRestaurant'])->name('register.restaurant');
Route::get('/register/resort', [RegisteredUserController::class, 'createResort'])->name('register.resort');




Route::get('about', [DashController::class, 'About'])->name('about');
Route::get('contact', [DashController::class, 'Contact'])->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/bookings/create', [BookingsController::class, 'create'])->name('bookings.create');
Route::post('/bookings/store', [BookingsController::class, 'store'])->name('bookings.store');

Route::get('/restaurant/create', [RestaurantController::class, 'create'])->name('restaurant.create');
Route::post('/restaurant/store', [RestaurantController::class, 'store'])->name('restaurant.store');

Route::get('/resorts/create', [ResortsController::class, 'create'])->name('resorts.create');
Route::post('/resorts/store', [ResortsController::class, 'store'])->name('resorts.store');

Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');


Route::middleware('auth')->group(function () {

    Route::get('/home', [ProductController::class, 'showWelcome'])->name('home');
    
    Route::get('/restaurant/register', [RestaurantController::class, 'register_restaurant'])->name('restaurant.register');
    Route::get('/resort/register', [ResortsController::class, 'register_resort'])->name('resort.register');


    Route::get('/bookings', [BookingsController::class, 'index'])->name('bookings.index');
    Route::get('/resorts', [ResortsController::class, 'index'])->name('resorts.index');
    Route::get('/restaurant', [RestaurantController::class, 'index'])->name('restaurant.index');
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    // Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    // Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/bookings/{bookings}/edit', [BookingsController::class, 'edit'])->name('bookings.edit');

    Route::get('/resorts/{resorts}/edit', [ResortsController::class, 'edit'])->name('resorts.edit');
    Route::get('/restaurant/{restaurant}/edit', [RestaurantController::class, 'edit'])->name('restaurant.edit');

    Route::delete('/bookings/{bookings}/destroy', [BookingsController::class, 'destroy'])->name('bookings.destroy');
    Route::delete('/resorts/{resorts}/destroy', [ResortsController::class, 'destroy'])->name('resorts.destroy');
    Route::delete('/restaurant/{restaurant}/destroy', [RestaurantController::class, 'destroy'])->name('restaurant.destroy');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');

    Route::put('/bookings/{bookings}/update', [BookingsController::class, 'update'])->name('bookings.update');
    Route::put('/resorts/{resorts}/update', [ResortsController::class, 'update'])->name('resorts.update');
    Route::put('/restaurant/{restaurant}/update', [RestaurantController::class, 'update'])->name('restaurant.update');
    
    Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::patch('/product/{product}/update-status', [ProductController::class, 'updateStatus'])->name('product.updateStatus');
    Route::patch('/resorts/{resorts}/update-status', [ResortsController::class, 'updateStatus'])->name('resorts.updateStatus');
    Route::patch('/restaurant/{restaurant}/update-status', [RestaurantController::class, 'updateStatus'])->name('restaurant.updateStatus');

});

require __DIR__.'/auth.php';
