<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobsController;
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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/jobs', [JobsController::class, 'index'])->name('jobs');


Route::group(['prefix' => 'admin', 'middleware' => 'checkRole'], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [DashboardController::class, 'index'])->name('admin.user');
});



//guest
   Route::middleware('guest')->group(function() {
        Route::get('/account/register', [AccountController::class, 'registration'])->name('account.registration');
        Route::get('/account/login', [AccountController::class, 'login'])->name('account.login');
        Route::post('/account/process-register', [AccountController::class, 'processRegistration'])->name('account.processRegistration');  
        Route::post('/account/authenticate', [AccountController::class, 'authenticate'])->name('account.authenticate');
    });
    //auth
    Route::middleware('auth')->group(function() {
        Route::get('/account/profile', [AccountController::class, 'profile'])->name('account.profile');
        Route::put('/account/update-profile', [AccountController::class, 'update'])->name('account.update');
        Route::get('/account/logout', [AccountController::class, 'logout'])->name('account.logout');
        Route::get('/account/create-job', [AccountController::class, 'create'])->name('account.create');
        Route::post('/account/save-job', [AccountController::class, 'saveJob'])->name('account.saveJob');
        Route::get('/account/my-jobs', [AccountController::class, 'myjobs'])->name('account.myjobs');
    });