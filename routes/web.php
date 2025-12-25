<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\HelloController;

Route::get('/', function () {
    return redirect('/todos');
});
//To do 機能
Route::get('todos', [TodoController::class, 'index'])->name('todos.index');
Route::post('todos', [TodoController::class, 'store'])->name('todos.store');
Route::patch('todos/{todo}', [TodoController::class, 'update'])->name('todos.update');
Route::delete('todos/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');

//学習用
Route::get('/hello', [HelloController::class, 'index']);