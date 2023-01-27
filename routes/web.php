<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'index']);
Route::get('/login', [MainController::class, 'login_get']);
Route::get('/register', [MainController::class, 'get_register']);
Route::post('/login-post', [MainController::class, 'login_post']);
Route::post('/register_post', [MainController::class, 'post_register']);
Route::get('/profile-update', [MainController::class, 'get_update_profile']);
Route::post('/profile-update', [MainController::class, 'post_update_profile']);
Route::post('/logout', [MainController::class, 'logout']);
Route::get('/info', [MainController::class, 'index']);
Route::get('/search-history', [MainController::class, 'search_history']);
Route::get('/user-follower-history', [MainController::class, 'search_history']);
Route::get('/update_profiles_history', [MainController::class, 'update_profiles']);
Route::post('/list/create', [MainController::class, 'create_list']);




// ADMIN ROUTES
Route::get('/admin/login', [AdminController::class, 'login_get'])->name('login');
Route::get('lists', [MainController::class, 'lists'])->name('lists');
Route::post('/admin/login', [AdminController::class, 'login_post'])->name('login_post');
Route::get('/admin/logout', [AdminController::class, 'logout']);
Route::middleware('auth')->get('/admin/index', [AdminController::class, 'index']);
Route::middleware('auth')->get('/admin', [AdminController::class, 'index']);
Route::middleware('auth')->get('/admin/home', [AdminController::class, 'index']);
Route::middleware('auth')->group(function () {
    Route::get('/admin/users/create', [AdminController::class, 'createUser']);
    Route::post('/admin/users/create', [AdminController::class, 'addUser']);
    Route::get('/admin/users/edit/{id}', [AdminController::class, 'editUser']);
    Route::post('/admin/users/edit/{id}', [AdminController::class, 'updateUser']);
    Route::get('/admin/users/remove/{id}', [AdminController::class, 'removeUser']);
    Route::get('/admin/users/changePass/{id}', [AdminController::class, 'changePasswordView']);
    Route::post('/admin/users/changePass/{id}', [AdminController::class, 'changePassword']);

    Route::get('/admin/users', [AdminController::class, 'showUser'])->name('users');
});
