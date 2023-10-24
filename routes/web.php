<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BunbouguController; 
use App\Http\Controllers\JuchuController; 
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


Route::get('/bunbougus',[BunbouguController::class,'index'])->name('bunbougus.index');

Route::get('/bunbougus/create',[BunbouguController::class,'create'])->name('bunbougu.create')->middleware('auth');
Route::post('/bunbougus/store',[BunbouguController::class,'store'])->name('bunbougu.store')->middleware('auth');

Route::get('/bunbougus/edit/{bunbougu}',[BunbouguController::class,'edit'])->name('bunbougu.edit')->middleware('auth');
Route::put('/bunbougus/edit/{bunbougu}',[BunbouguController::class,'update'])->name('bunbougu.update')->middleware('auth');

Route::get('/bunbougus/show/{bunbougu}',[BunbouguController::class,'show'])->name('bunbougu.show');

Route::delete('/bunbougus/{bunbougu}',[BunbouguController::class,'destroy'])->name('bunbougu.destroy')->middleware('auth');


Route::get('/juchus', [JuchuController::class,'index'])->name('juchus.index');

Route::get('/juchus/create', [JuchuController::class,'create'])->name('juchu.create');
Route::post('/juchus/ceate', [JuchuController::class,'store'])->name('juchu.store')->middleware('auth');

Route::get('/juchus/edit/{juchu}', [JuchuController::class,'edit'])->name('juchu.edit')->middleware('auth');
Route::put('/juchus/edit/{juchu}',[JuchuController::class,'update'])->name('juchu.update')->middleware('auth');
Route::delete('/juchus/{juchu}',[JuchuController::class,'destroy'])->name('juchu.destroy')->middleware('auth');