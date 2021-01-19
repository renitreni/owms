<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\MyEmployeeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;
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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/change/pass', [UsersController::class, 'indexChangePass'])->name('change.pass');
    Route::post('/change/password/update', [UsersController::class, 'changePass'])->name('change.pass.update');
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

    Route::get('/candidates', [CandidateController::class, 'index'])->name('candidates');
    Route::post('/candidates/c/c', [CandidateController::class, 'tableCandidates'])->name('candidate.table');
    Route::post('/candidates/a/t', [CandidateController::class, 'tableApplicants'])->name('candidate.applicant.table');
    Route::post('/candidates/update', [CandidateController::class, 'update'])->name('candidate.update');
    Route::post('/candidates/a/ag', [CandidateController::class, 'assignAnAgent'])->name('candidate.assign.agent');
    Route::post('/candidates/deploy', [CandidateController::class, 'deploy'])->name('candidate.assign.deploy');
    Route::post('/candidates/a/e', [CandidateController::class, 'employ'])->name('candidate.assign.employer');
    Route::post('/candidates/e/t', [CandidateController::class, 'tableEmployed'])->name('candidate.employed.table');
    Route::get('/candidates/{id}/show', [CandidateController::class, 'show'])->name('candidate.edit');
    Route::get('/candidates/applicant', [CandidateController::class, 'applicants'])->name('candidate.applicant');
    Route::get('/candidates/employed', [CandidateController::class, 'employed'])->name('candidate.employed');

    Route::get('/employee', [MyEmployeeController::class, 'index'])->name('candidate.employees')->middleware('can:employer');
    Route::post('/employee/table', [MyEmployeeController::class, 'table'])->name('candidate.employees.table');
    Route::get('/employee/{id}/show', [MyEmployeeController::class, 'show'])->name('candidate.employees.edit');

    Route::get('/reports', [ReportController::class, 'index'])->name('reports')->middleware('can:admin_agency_gov');
    Route::post('/reports/table', [ReportController::class, 'table'])->name('reports.table');
    Route::get('/report/employer/view/{id}', [ReportController::class, 'employerReportView'])->name('report.employer.view');
    Route::post('/report/submit', [ReportController::class, 'submit'])->name('report.submit');
    Route::post('/report/employee/table', [ReportController::class, 'employeeTable'])->name('report.employee.table');
    Route::get('/report/view/{id}/employee', [ReportController::class, 'formEmployerView'])
         ->name('report.employer.view');
});

Route::get('/candidate/new/{id}', [CandidateController::class, 'create'])->name('candidate.new');
Route::post('/candidates/store', [CandidateController::class, 'store'])->name('candidate.store');
Route::get('/reporting', [ReportController::class, 'formEmployee'])->name('report.from.employee');
Route::post('/secretcode/validate', [ReportController::class, 'validateSecretCode'])->name('report.validate');

require __DIR__ . '/auth.php';
