<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [ProjectController::class, 'home']);
Route::get('/', [ProjectController::class, 'index']);
Route::get('/about', [ProjectController::class, 'about']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{project}', [ProjectController::class, 'show']);
// Route::get('/categories/{category}', [ProjectController::class, 'listByCategory']);
Route::get('/categories/{category:slug}', [ProjectController::class, 'listByCategory']);

// Route::get('/projects', function () {
//     return view('projects.index');
// });

// Route::get('/projects/project', function () {
//     return view('projects.project');
// });