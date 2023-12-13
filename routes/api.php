<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Tasks routes
Route::controller(TasksController::class)->group(function () {
    Route::get('tasks', 'index')->name('tasks.index');
    Route::post('tasks', 'create')->name('tasks.create');
    Route::put('tasks/order', 'updateOrder')->name('tasks.updateOrder');
    Route::put('tasks/{taskId}', 'update')->name('tasks.update');
    Route::delete('tasks/{taskId}', 'delete')->name('tasks.delete');
});
