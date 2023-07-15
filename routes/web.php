<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\admin\ResultController;

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

// Route::get('/', function () {
//     return view('frontend.home');
// });

// home page starts
Route::get('/', [HomeController::class, 'HomePage'])->name('frontend.home');
// home page ends

// admin login starts
Route::get('admin', [LoginController::class, 'AdminLoginView'])->name('admin.login_view');
Route::post('admin-login', [LoginController::class, 'AdminLogin'])->name('admin.login');
// admin login ends

// Admin Dashboard starts
Route::get('admin/dashboard', [AdminDashboardController::class, 'DashboardView'])->middleware(['auth', 'verified'])->name('admin.dashboard_view');
// Admin Dashboard ends


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Result add starts
    Route::get('admin/result', [ResultController::class, 'index'])->name('admin.result');
    Route::post('admin/result/store', [ResultController::class, 'store'])->name('admin.result.store');
    // Result add ends
});



require __DIR__.'/auth.php';
