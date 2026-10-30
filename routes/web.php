<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('quienes-somos', 'quienes_somos.index')->name('about');
Route::view('login', 'auth.login')->name('login');
Route::view('dashboard/aprendiz', 'dashboards.aprendiz')->name('dashboard.aprendiz');

Route::get('areas', [AreaController::class, 'index'])->name('areas.index');
Route::get('area/create',[AreaController::class,'create'])->name('areas.create');
Route::post('area', [AreaController::class, 'store'])->name('areas.store');
Route::get('area/{area}', [AreaController::class, 'show'])->name('areas.show');
Route::get('area/{area}/editar',[AreaController::class,'edit'])->name('areas.edit');
Route::put('area/{area}', [AreaController::class, 'update'])->name('areas.update');
Route::delete('area/{area}', [AreaController::class, 'destroy'])->name('areas.destroy');


Route::get('trainingcenters', [TrainingCenterController::class, 'index'])->name('trainingcenters.index');
Route::get('trainingcenter/create',[TrainingCenterController::class,'create'])->name('trainingcenters.create');
Route::post('trainingcenter', [TrainingCenterController::class, 'store'])->name('trainingcenters.store');
Route::get('trainingcenter/{trainingcenter}', [TrainingCenterController::class, 'show'])->name('trainingcenters.show');
Route::get('trainingcenter/{trainingcenter}/editar',[TrainingCenterController::class,'edit'])->name('trainingcenters.edit');
Route::put('trainingcenter/{trainingcenter}', [TrainingCenterController::class, 'update'])->name('trainingcenters.update');
Route::delete('trainingcenter/{trainingcenter}', [TrainingCenterController::class, 'destroy'])->name('trainingcenters.destroy');


Route::get('computers', [ComputerController::class, 'index'])->name('computers.index');
Route::get('computer/create',[ComputerController::class,'create'])->name('computers.create');
Route::post('computer', [ComputerController::class, 'store'])->name('computers.store');
Route::get('computer/{computer}', [ComputerController::class, 'show'])->name('computers.show');
Route::get('computer/{computer}/editar',[ComputerController::class,'edit'])->name('computers.edit');
Route::put('computer/{computer}', [ComputerController::class, 'update'])->name('computers.update');
Route::delete('computer/{computer}', [ComputerController::class, 'destroy'])->name('computers.destroy');

Route::get('apprentices', [ApprenticeController::class, 'index'])->name('apprentices.index');
Route::get('apprentice/create',[ApprenticeController::class,'create'])->name('apprentices.create');
Route::post('apprentice', [ApprenticeController::class, 'store'])->name('apprentices.store');
Route::get('apprentice/{apprentice}', [ApprenticeController::class, 'show'])->name('apprentices.show');
Route::get('apprentice/{apprentice}/editar',[ApprenticeController::class,'edit'])->name('apprentices.edit');
Route::put('apprentice/{apprentice}', [ApprenticeController::class, 'update'])->name('apprentices.update');
Route::delete('apprentice/{apprentice}', [ApprenticeController::class, 'destroy'])->name('apprentices.destroy');

Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('course/create',[CourseController::class,'create'])->name('courses.create');
Route::post('course', [CourseController::class, 'store'])->name('courses.store');
Route::get('course/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::get('course/{course}/editar',[CourseController::class,'edit'])->name('courses.edit');
Route::put('course/{course}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('course/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');

Route::get('teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('teacher/create',[TeacherController::class,'create'])->name('teachers.create');
Route::post('teacher', [TeacherController::class, 'store'])->name('teachers.store');
Route::get('teacher/{teacher}', [TeacherController::class, 'show'])->name('teachers.show');
Route::get('teacher/{teacher}/editar',[TeacherController::class,'edit'])->name('teachers.edit');
Route::put('teacher/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
Route::delete('teacher/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');