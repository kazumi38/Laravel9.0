<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FolderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* show folders and tasks */
Route::get('/folders/{id}/tasks', [TaskController::class, 'index'])->name('tasks.index');

Route::get('/folders/{id}/tasks/test', function () {
    return "hello world";
})->name('test.index');

/* create a new folder */
Route::get('/folders/create', [FolderController::class, 'showCreateForm'])->name('folders.create');

Route::post('/folders/create', [FolderController::class,'create']);

/* create a new task */
Route::get('/folders/{id}/tasks/create', [TaskController::class,'showCreateForm'])->name('tasks.create');

Route::post('/folders/{id}/tasks/create', [TaskController::class,'create']);
