<?php

use App\Http\Controllers\Admin\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;

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
    return view('visitors.index');
})->name('index');
Route::get('/About', function () {return view('visitors.About');})->name('About');
Route::get('/Contact', function () {return view('visitors.contact');})->name('Contact');
Route::get('/Events', function () {return view('visitors.events');})->name('Events');
Route::get('/Pricing', function () {return view('visitors.pricing');})->name('Pricing');
Route::get('/CoursesVisitor', function () {return view('visitors.courses');})->name('Courses');
Route::get('/Course_details', function () {return view('visitors.course-details');})->name('Course_details');
Route::get('/teachers', [TeacherController::class,'index'])->name('teachers');
