<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\API\ComplainController;
use \App\Http\Controllers\API\AgencyController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/complaint/new', [ComplainController::class, 'newComplaint']);

Route::get('/agencies', [AgencyController::class, 'getAgenciesAPI']);
