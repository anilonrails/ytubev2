<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/test", function (){
    return view('test');
});

Route::middleware('auth')->group(function (){
   Route::get('/channel/{channel}/edit', [\App\Http\Controllers\ChannelController::class, 'edit'])->name('channel.edit');
});

Route::middleware('auth')->group(function (){
    Route::get('/videos/{channel}/create', \App\Livewire\Video\CreateVideo::class)->name('video.create');
    Route::get('/videos/{channel}/{video}/edit', \App\Livewire\Video\EditVideo::class)->name('video.edit');
    Route::get('/videos/{channel}', \App\Livewire\Video\AllVideos::class)->name('videos');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
