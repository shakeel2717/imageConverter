<?php

use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ImageConverterController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::resource('/', LandingPageController::class);
Route::resource('/history', HistoryController::class);
Route::get('image-to-text', [ImageConverterController::class, 'text'])->name('img-to-text');
Route::post('image-to-text', [ImageConverterController::class, 'textConvert'])->name('img-to-text.request');
Route::get('image-to-audio', [ImageConverterController::class, 'audio'])->name('img-to-audio');
Route::post('image-to-audio', [ImageConverterController::class, 'audioConvert'])->name('img-to-audio.request');
Route::get('image-to-video', [ImageConverterController::class, 'video'])->name('img-to-video');
Route::post('image-to-video', [ImageConverterController::class, 'videoConvert'])->name('img-to-video.request');

