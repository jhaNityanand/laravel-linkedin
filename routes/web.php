<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyNetworkController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\MessagingController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function() {
    if (auth()->check()) {
        return redirect()->route('home');
    } else {
        return view('welcome');
    }
});

Route::group(['prefix' => 'auth'], function() {
    // Login routes
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
    
    // Registration routes
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
    
    // Password reset routes
    Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('auth.forgot-password');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('auth.send-reset-link');
    Route::get('/recover-password/{token}', [AuthController::class, 'recoverPassword'])->name('auth.recover-password');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('auth.reset-password');
    
    // Logout route
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/mynetwork', [MyNetworkController::class, 'index'])->name('mynetwork');
    Route::get('/jobs', [JobsController::class, 'index'])->name('jobs');
    Route::get('/messaging', [MessagingController::class, 'index'])->name('messaging');
    Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    // Profile update routes
    Route::post('/profile/update-intro', [ProfileController::class, 'updateIntro'])->name('profile.updateIntro');
    Route::post('/profile/update-about', [ProfileController::class, 'updateAbout'])->name('profile.updateAbout');
    Route::post('/profile/update-profile-picture', [ProfileController::class, 'updateProfilePicture'])->name('profile.updateProfilePicture');
    Route::post('/profile/update-cover-photo', [ProfileController::class, 'updateCoverPhoto'])->name('profile.updateCoverPhoto');

    // Experience routes
    Route::post('/profile/add-experience', [ProfileController::class, 'addExperience'])->name('profile.addExperience');

    // Add Education
    Route::post('/profile/add-education', [ProfileController::class, 'addEducation'])->name('profile.addEducation');

    // Add License or Certification
    Route::post('/profile/add-license-certification', [ProfileController::class, 'addLicenseOrCertification'])->name('profile.addLicenseOrCertification');

    // Add Skill
    Route::post('/profile/add-skill', [ProfileController::class, 'addSkill'])->name('profile.addSkill');

    // Add Language
    Route::post('/profile/add-language', [ProfileController::class, 'addLanguage'])->name('profile.addLanguage');
});

require __DIR__.'/auth.php';
