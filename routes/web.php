<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

//for customer or user
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashbaord');
});

//for admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashbaord');

});
