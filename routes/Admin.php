<?php
use App\Http\Controllers\Admin\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\TrainerController;
Route::get('admin/charts',[TrainerController::class,'CountFemaleAndMale'])->name('charts');
Route::resource('blogs', BlogController::class);
Route::resource('Courses', CourseController::class);
