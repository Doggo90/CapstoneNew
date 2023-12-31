<?php

use App\Models\Listing;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Middleware\Auth;
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
Route::middleware(['auth', 'role:user'])->group(function(){

    Route::get('/profile/{user}', [UserController::class, 'profileIndex'])->name('user.profile');
    Route::get('/new-login', [UserController::class, 'firstTimeLog'])->name('user.first');
    Route::post('/profile/store', [UserController::class, 'storePhone'])->name('user.update.phone');

});// END USER MIDDLEWARE

require __DIR__.'/auth.php';
// ADMIN MIDDLEWARE
// Route::middleware(['auth', 'role:admin'])->group(function(){

//     // Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
//     // Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
//     // Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
//     // Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
//     // Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
//     // Route::get('/admin/roles/manage', [AdminController::class, 'ManageRoles'])->name('admin.roles.manage');
//     // Route::get('/admin/roles/manage/{id}', [AdminController::class, 'EditRoles'])->name('admin.roles.edit_roles');
//     // Route::post('/admin/roles/manage/update', [AdminController::class, 'UpdateRoles'])->name('admin.roles.update');
//     // Route::get('/admin/posts/allposts', [AdminController::class, 'AllPosts'])->name('admin.posts.allposts');
//     // Route::delete('/admin/posts/allposts/{listing}', [AdminController::class, 'deletePost'])->name('admin.posts.delete');
// });// END ADMIN MIDDLEWARE

//AGENT MIDDLEWARE
Route::middleware(['auth', 'role:agent'])->group(function(){
    Route::get('/profile/{user}', [AgentController::class, 'profileIndex'])->name('user.profile');
    Route::post('/profile/store', [AgentController::class, 'storePhone'])->name('user.update.phone');
    // Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');

});// END AGENT MIDDLEWARE

// GOOGLE LOG IN API
Route::get('/auth/google/redirect', [ProviderController::class,'redirect']);
Route::get('/auth/google/callback', [ProviderController::class,'callback']);
// END GOOGLE LOG IN API

// Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

Route::get('/index',[ListingController::class, 'index'])->name('listings.index');
Route::get('/listings/create',[ListingController::class, 'create'])->name('listings.create');
Route::post('/listings',[ListingController::class, 'store'])->name('listings.store');

Route::get('/listings/{listing}/edit',[ListingController::class, 'edit'])->name('listings.edit');
Route::put('/listings/{listing}', [ListingController::class, 'update']);

Route::delete('/listings/{listing}', [ListingController::class, 'delete'])->name('listings.delete');
Route::get('/listings/archived', [ListingController::class, 'ArchivedPosts'])->name('listings.archived');

Route::get('/listings/{listing}', [ListingController::class, 'show'])->name('listings.show');
Route::get('/announcements/{announcement}', [AnnouncementController::class, 'show'])->name('listings.announcement');
Route::post('/listings1', [CommentsController::class, 'store'])->name('comments.store');

Route::get('/logout', [UserController::class, 'Logout'])->name('user.logout');
Route::get('/users/suggestions', [UserController::class, 'suggestUsers']);
Route::POST('/listings/{listing}', [ListingController::class, 'isArchived']);
