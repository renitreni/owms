<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CandidateController;

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
    return redirect()->route('dashboard');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/users/table', [UsersController::class, 'table'])->name('users.table');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UsersController::class, 'store'])->name('users.store');
    Route::get('/users/show/{id}', [UsersController::class, 'show'])->name('users.show');
    Route::get('/users/rp/{id}', [UsersController::class, 'resetPassword'])->name('users.resetpass');
    Route::get('/users/d/{id}', [UsersController::class, 'destroy'])->name('users.delete');
    Route::post('/users/update/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::get('/users', [UsersController::class, 'index'])->name('users')->middleware('can:admin');

    Route::post('/employers/table', [EmployerController::class, 'table'])->name('employers.table');
    Route::get('/employers/create', [EmployerController::class, 'create'])->name('employers.create');
    Route::post('/employers/store', [EmployerController::class, 'store'])->name('employers.store');
    Route::get('/employers/show/{id}', [EmployerController::class, 'show'])->name('employers.show');
    Route::post('/employers/update/{id}', [EmployerController::class, 'update'])->name('employers.update');
    Route::get('/employers/rp/{id}', [EmployerController::class, 'resetPassword'])->name('employers.resetpass');
    Route::get('/employers/d/{id}', [EmployerController::class, 'destroy'])->name('employers.delete');
    Route::get('/employers', [EmployerController::class, 'index'])->name('employers')->middleware('can:agency');

    Route::get('/candidates/{id}/show', [CandidateController::class, 'show'])->name('candidate.edit');
    Route::post('/candidates/applicant/table', [CandidateController::class, 'tableApplicants'])
         ->name('candidate.applicant.table');
    Route::post('/candidates/store', [CandidateController::class, 'store'])->name('candidate.store');
    Route::get('/candidates/applicant', [CandidateController::class, 'index'])->name('candidate.applicant');
});

Route::get('/candidate/new/{id}', [CandidateController::class, 'create'])->name('candidate.new');

require __DIR__ . '/auth.php';
