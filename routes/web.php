<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');

Route::get('/organizations/create', [App\Http\Controllers\OrganizationsController::class, 'create']);
Route::post('/organizations', [App\Http\Controllers\OrganizationsController::class, 'store']);
Route::get('/organizations/{organization}', [App\Http\Controllers\OrganizationsController::class, 'show']);
Route::get('/organizations/{organization}/edit', [App\Http\Controllers\OrganizationsController::class, 'edit'])->name('organization.edit');
Route::patch('/organizations/{organization}', [App\Http\Controllers\OrganizationsController::class, 'update'])->name('organization.update');

Route::get('/organizations/{organization}/staff', [App\Http\Controllers\StaffController::class, 'index']);

Route::get('/staff/{organization}/workers/create', [App\Http\Controllers\WorkersController::class, 'create']);
Route::post('/staff/{organization}/workers', [App\Http\Controllers\WorkersController::class, 'store']);
Route::get('/staff/{organization}', [App\Http\Controllers\WorkersController::class, 'show']);
Route::get('/staff/{organization}/workers/edit', [App\Http\Controllers\WorkersController::class, 'edit']);
Route::patch('/staff/{organization}', [App\Http\Controllers\WorkersController::class, 'update']);

Route::get('/staff/{organization}/specialists/create', [App\Http\Controllers\SpecialistsController::class, 'create']);
Route::post('/staff/{organization}/specialists', [App\Http\Controllers\SpecialistsController::class, 'store']);
Route::get('/staff/{organization}', [App\Http\Controllers\SpecialistsController::class, 'show']);
Route::get('/staff/{organization}/specialists/edit', [App\Http\Controllers\SpecialistsController::class, 'edit']);
Route::patch('/staff/{organization}', [App\Http\Controllers\SpecialistsController::class, 'update']);
