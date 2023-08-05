<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\ProviderController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// ADMIN MIDDLEWARE
Route::middleware(['auth', 'role:admin'])->group(function(){

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::get('/admin/roles/manage', [AdminController::class, 'ManageRoles'])->name('admin.roles.manage');
});// END ADMIN MIDDLEWARE
Route::middleware(['auth', 'role:user'])->group(function(){

    
});// END USER MIDDLEWARE
Route::get('/profile/{user}', [UserController::class, 'profile'])->name('user.profile');

//AGENT MIDDLEWARE  
Route::middleware(['auth', 'role:agent'])->group(function(){

    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');

});// END AGENT MIDDLEWARE  

// GOOGLE LOG IN API
Route::get('/auth/google/redirect', [ProviderController::class,'redirect']);
Route::get('/auth/google/callback', [ProviderController::class,'callback']);
// END GOOGLE LOG IN API

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

Route::get('/index',[ListingController::class, 'index'])->name('listings.index');
Route::get('/listings/create',[ListingController::class, 'create'])->name('listings.create');
Route::post('/listings',[ListingController::class, 'store'])->name('listings.store');

Route::get('/listings/{listing}/edit',[ListingController::class, 'edit'])->name('listings.edit');
Route::put('/listings/{listing}', [ListingController::class, 'update']);

Route::delete('/listings/{listing}', [ListingController::class, 'delete'])->name('listings.delete');

Route::get('/listings/{listing}', [ListingController::class, 'show'])->name('listings.show');


Route::get('/logout', [UserController::class, 'Logout'])->name('user.logout');