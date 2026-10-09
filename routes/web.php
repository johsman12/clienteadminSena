<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComputerController;

Route::get('/', function () {
    return view('welcome');
});

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