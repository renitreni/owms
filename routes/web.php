<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\ComplainsController;
use App\Http\Controllers\MyEmployeeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OtherDetailsController;
use Illuminate\Support\Facades\App;
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
    Route::get('/settings', [UsersController::class, 'indexSettings'])->name('settings');
    Route::post('/settings/submit', [UsersController::class, 'settingsSave'])->name('settings.submit');
    Route::post('/change/password/update', [UsersController::class, 'changePass'])->name('change.pass.update');
    Route::post('/users/table', [UsersController::class, 'table'])->name('users.table');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UsersController::class, 'store'])->name('users.store');
    Route::get('/users/show/{id}', [UsersController::class, 'show'])->name('users.show');
    Route::get('/users/rp/{id}', [UsersController::class, 'resetPassword'])->name('users.resetpass');
    Route::get('/users/d/{id}', [UsersController::class, 'destroy'])->name('users.delete');
    Route::post('/users/update', [UsersController::class, 'update'])->name('users.update');
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
    Route::get('/candidates/create/{id}', [CandidateController::class, 'new'])->name('candidate.create');
    Route::post('/candidates/insert', [CandidateController::class, 'insert'])->name('candidate.insert');
    Route::post('/candidates/c/c', [CandidateController::class, 'tableCandidates'])->name('candidate.table');
    Route::post('/candidates/a/t', [CandidateController::class, 'tableApplicants'])->name('candidate.applicant.table');
    Route::post('/candidates/update', [CandidateController::class, 'update'])->name('candidate.update');
    Route::post('/candidates/a/ag', [CandidateController::class, 'assignAnAgent'])->name('candidate.assign.agent');
    Route::post('/candidates/deploy', [CandidateController::class, 'deploy'])->name('candidate.assign.deploy');
    Route::post('/candidates/a/e', [CandidateController::class, 'employ'])->name('candidate.assign.employer');
    Route::post('/candidates/e/t', [CandidateController::class, 'tableEmployed'])->name('candidate.employed.table');
    Route::get('/candidates/{id}/show', [CandidateController::class, 'show'])->name('candidate.edit');
    Route::get('/applicant', [CandidateController::class, 'applicants'])->name('candidate.applicant');
    Route::get('/employed', [CandidateController::class, 'employed'])->name('candidate.employed');
    Route::get('/candidates/overview/{id}', [CandidateController::class, 'overview'])->name('candidate.overview');
    Route::post('/send/code', [CandidateController::class, 'sendCode'])->name('send.code');

    Route::get('/employee', [MyEmployeeController::class, 'index'])->name('candidate.employees')->middleware('can:employer');
    Route::post('/employee/table', [MyEmployeeController::class, 'table'])->name('candidate.employees.table');
    Route::get('/employee/{id}/show', [MyEmployeeController::class, 'show'])->name('candidate.employees.edit');

    Route::get('/reports', [ReportController::class, 'index'])->name('reports')->middleware('can:admin_agency_gov');
    Route::post('/reports/table', [ReportController::class, 'table'])->name('reports.table');
    Route::post('/reports/candidate/table', [ReportController::class, 'tableByCandidateId'])->name('reports.candidate');
    Route::get('/report/employer/view/{id}', [ReportController::class, 'employerReportView'])->name('report.employer.view');
    Route::post('/report/submit', [ReportController::class, 'submit'])->name('report.submit');
    Route::post('/report/employee/table', [ReportController::class, 'employeeTable'])->name('report.employee.table');
    Route::get('/report/view/{id}/employee', [ReportController::class, 'formEmployerView'])
         ->name('report.employer.view');

    Route::get('/affiliates', [AffiliateController::class, 'index'])->name('affiliates')->middleware('can:agency');
    Route::post('/affiliates/table', [AffiliateController::class, 'table'])->name('affiliates.table');
    Route::get('/affiliates/create', [AffiliateController::class, 'create'])->name('affiliates.create')->middleware('can:agency');
    Route::post('/affiliates/store', [AffiliateController::class, 'store'])->name('affiliates.store');
    Route::get('/affiliate/show/{id}', [AffiliateController::class, 'show'])->name('affiliates.show');
    Route::post('/affiliate/update/{id}', [AffiliateController::class, 'update'])->name('affiliates.update');
    Route::get('/affiliate/rp/{id}', [AffiliateController::class, 'resetPassword'])->name('affiliates.resetpass');
    Route::get('/affiliate/d/{id}', [AffiliateController::class, 'destroy'])->name('affiliates.delete');

    Route::get('/details/{id}', [OtherDetailsController::class, 'show'])->name('details')->middleware('can:agency');
    Route::post('/details/document/store', [OtherDetailsController::class, 'storeDocument'])->name('details.document.store');
    Route::post('/details/document/table', [OtherDetailsController::class, 'tableDocuments'])->name('details.document.table');
    Route::post('/details/document/delete', [OtherDetailsController::class, 'deleteDocuments'])->name('details.document.delete');
    Route::post('/details/flight/delete', [OtherDetailsController::class, 'deleteFlight'])->name('details.flight.delete');

    Route::post('/details/flight/store', [OtherDetailsController::class, 'storeFlight'])->name('details.flight.store');
    Route::post('/details/flight/table', [OtherDetailsController::class, 'tableFlights'])->name('details.flight.table');

    Route::post('/details/add/checklist', [OtherDetailsController::class, 'insertCheckList'])->name('details.insert.checklist');
    Route::get('/details/approve/item/{id}', [OtherDetailsController::class, 'approveItem'])->name('details.approve.item');
    Route::get('/details/pending/item/{id}', [OtherDetailsController::class, 'pendingItem'])->name('details.pending.item');
    Route::get('/details/delete/item/{id}', [OtherDetailsController::class, 'deleteItem'])->name('details.delete.item');
});

Route::get('/candidate/new/{id}', [CandidateController::class, 'create'])->name('candidate.new');
Route::post('/candidates/store', [CandidateController::class, 'store'])->name('candidate.store');

Route::get('/reporting', [ReportController::class, 'formEmployee'])->name('report.from.employee');

Route::post('/secretcode/validate', [ReportController::class, 'validateSecretCode'])->name('report.validate');

Route::get('/form', [ComplainsController::class, 'form'])->name('complains.form');
Route::post('/form/submit', [ComplainsController::class, 'submit'])->name('complains.submit');

Route::get('/set/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'arb'])) {
        abort(400);
    }

    session()->put('locale', $locale);

    return redirect()->back();
})->name('set.locale');

require __DIR__ . '/auth.php';
