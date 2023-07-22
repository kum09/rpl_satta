<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\admin\ResultController;
use App\Http\Controllers\admin\AdvertisementController; 
use App\Http\Controllers\admin\AdminProfileController; 
use App\Http\Controllers\frontend\ForgetPasswordController; 

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
Route::get('rpl_satta_a', [HomeController::class, 'HomePage'])->name('frontend.rpl_satta_a');
Route::get('rpl_satta_b', [HomeController::class, 'HomePage'])->name('frontend.rpl_satta_b');
Route::get('rpl_satta_c', [HomeController::class, 'HomePage'])->name('frontend.rpl_satta_c');
Route::get('rpl_satta_d', [HomeController::class, 'HomePage'])->name('frontend.rpl_satta_d');
// home page ends
// Route::get('/monthly-result/{date}', [HomeController::class, 'MonthlyResult'])->name('frontend.monthly_result');
Route::get('/monthly-result-a', [HomeController::class, 'MonthlyResult'])->name('frontend.monthly_result_a');
Route::get('/monthly-result-b', [HomeController::class, 'MonthlyResult'])->name('frontend.monthly_result_b');
Route::get('/monthly-result-c', [HomeController::class, 'MonthlyResult'])->name('frontend.monthly_result_c');
Route::get('/monthly-result-d', [HomeController::class, 'MonthlyResult'])->name('frontend.monthly_result_d');

//forget password start
Route::get('/forget-password', [ForgetPasswordController::class, 'index'])->name('frontend.forget_password.index');
//forget password ends


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
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Result add starts
    Route::get('admin/result', [ResultController::class, 'index'])->name('admin.result');
    Route::post('admin/result/store', [ResultController::class, 'store'])->name('admin.result.store');
    // Result add ends
    

    // Advertisement starts
    Route::get('admin/advertisement', [AdvertisementController::class, 'index'])->name('admin.advertisement.index');
    Route::POST('admin/advertisement', [AdvertisementController::class, 'update'])->name('admin.advertisement.update');
    // Advertisement ends

    // admin profile page start
    Route::get('admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile.index');
    // admin profile page ends

    // dashboard filter with date using ajax request starts 
    Route::get('admin/dashboard-filter-request', [AdminDashboardController::class, 'DashboardFilterRequest'])->name('admin.dashboard_filter_request');
    // dashboard filter with date using ajax request ends
});





require __DIR__.'/auth.php';
