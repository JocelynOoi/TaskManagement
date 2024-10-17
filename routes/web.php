<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[TaskController::class, 'fetchAllTasks'])->name('index');

Route::get('/create',[TaskController::class, 'createTask'])->name('create');

Route::post('/addTask',[TaskController::class, 'addTask'])->name('addTask');

Route::get('/doneTask/{id}',[TaskController::class, 'doneTask'])->name('doneTask');

Route::get('/edit/{id}',[TaskController::class, 'editTask'])->name('edit');

Route::put('/updateTask/{id}',[TaskController::class, 'updateTask'])->name('updateTask');

Route::delete('/delete/{id}',[TaskController::class, 'deleteTask'])->name('delete');