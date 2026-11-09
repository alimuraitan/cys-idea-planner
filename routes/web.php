<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/about', function () {
    return view('about_us');
});

Route::get('/lectures', function () {
    return view('lectures_schedule');
});

Route::get('/tasks', function () {
    return view('daily_tasks');
});

Route::get('/exams', function () {
    return view('exam_schedule');
});

use App\Http\Controllers\TaskController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\ExamController;

// مسارات عرض البيانات
Route::get('/lectures', [LectureController::class, 'index']);
Route::get('/tasks', [TaskController::class, 'index']);
Route::get('/exams', [ExamController::class, 'index']);

// مسارات إضافة البيانات
Route::post('/tasks', [TaskController::class, 'store']);
Route::post('/lectures', [LectureController::class, 'store']);
Route::post('/exams', [ExamController::class, 'store']);

