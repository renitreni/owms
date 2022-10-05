<?php

use Illuminate\Http\Request as RequestAlias;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ComplainsController;
use App\Http\Controllers\MyEmployeeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OtherDetailsController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\AgencyController;
use \App\Http\Controllers\ContractsController;
use App\Http\Livewire\ListOfAgencies;

Route::get('/', function (RequestAlias $request) {
     return redirect()->route('dashboard');
})->name('home');

Route::get('/details', [ReportController::class, 'index'])->name('details');
Route::get('/candidate/new/{agency_id}', [CandidateController::class, 'create'])->name('candidate.new');
Route::post('/candidates/store', [CandidateController::class, 'store'])->name('candidate.store');
Route::get('/reporting', [ReportController::class, 'formEmployee'])->name('report.from.employee');
Route::post('/secretcode/validate', [ReportController::class, 'validateSecretCode'])->name('report.validate');
Route::get('/form/{agency_id}', [ComplainsController::class, 'form'])->name('complains.form');
Route::post('/form/submit', [ComplainsController::class, 'submit'])->name('complains.submit');
Route::get('/blocked', [DashboardController::class, 'blocked'])->middleware('auth')->name('blocked');
Route::get('/list-of-agencies', ListOfAgencies::class)->name('list-of-agencies');

Route::group(['middleware' => ['auth', 'agency.isblocked']], function () {
     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
     Route::post('/store/hsw', [DashboardController::class, 'storeHSW'])->name('store.hsw');
     Route::post('/store/sw', [DashboardController::class, 'storeSW'])->name('store.sw');
     Route::post('/table/hsw', [DashboardController::class, 'tableHSW'])->name('table.hsw');
     Route::post('/table/sw', [DashboardController::class, 'tableSW'])->name('table.sw');
     Route::post('/table/contract', [DashboardController::class, 'tableContract'])->name('table.contract');
     Route::get('/print/contract/{id}', [DashboardController::class, 'printContract'])->name('contract.layout');

     Route::get('/change/pass', [UsersController::class, 'indexChangePass'])->name('change.pass');
     Route::post('/change/password/update', [UsersController::class, 'changePass'])->name('change.pass.update');

     Route::group(['middleware' => ['can:admin_gov']], function () {
          Route::resource('agencies', AgencyController::class);
          Route::post('agencies/table', [AgencyController::class, 'table'])->name('agencies.table');
          Route::post('agencies/store/alert', [AgencyController::class, 'storeAlert'])->name('agencies.alert.store');
          Route::post('agencies/alert/list', [AgencyController::class, 'alertList'])->name('agencies.alert.list');
          Route::post('agencies/delete/alert', [AgencyController::class, 'deleteAlert'])->name('agencies.alert.delete');
          Route::post('agencies/check/contract', [AgencyController::class, 'contractStatus'])->name('agencies.check.contract');

          Route::post('agencie/requisition/store', [AgencyController::class, 'storeRequisition'])
               ->name('agencies.requisition.store');
          Route::post('requisition/get', [AgencyController::class, 'getRequisition'])
               ->name('agencies.requisition.get');

          Route::get('contracts/{id}', [ContractsController::class, 'index'])->name('contracts');
          Route::post('contracts/table/{id}', [ContractsController::class, 'table'])->name('contracts.table');
          Route::post('contracts/update/status', [ContractsController::class, 'updateStatus'])
               ->name('status.contract.update');

          Route::get('/candidates', [CandidateController::class, 'index'])->name('candidates');
          Route::post('/candidates/c/c', [CandidateController::class, 'tableCandidates'])->name('candidate.table');
     });

     Route::group(['middleware' => ['can:admin']], function () {
          Route::get('/settings', [UsersController::class, 'indexSettings'])->name('settings');
          Route::post('/settings/submit', [UsersController::class, 'settingsSave'])->name('settings.submit');
          Route::post('/users/table', [UsersController::class, 'table'])->name('users.table');
          Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
          Route::post('/users/store', [UsersController::class, 'store'])->name('users.store');
          Route::get('/users/show/{id}', [UsersController::class, 'show'])->name('users.show');
          Route::get('/users/rp/{id}', [UsersController::class, 'resetPassword'])->name('users.resetpass');
          Route::get('/users/d/{id}', [UsersController::class, 'destroy'])->name('users.delete');
          Route::post('/users/update', [UsersController::class, 'update'])->name('users.update');
          Route::get('/users', [UsersController::class, 'index'])->name('users')->middleware('can:admin');
     });

     Route::group(['middleware' => ['can:admin_agency_gov']], function () {
          Route::get('/reports', [ReportController::class, 'index'])->name('reports');

          Route::get('get/complains', [ComplainsController::class, 'index'])->name('complains');

          Route::resource('complains', ComplainsController::class)
               ->parameters(['complains' => 'id']);
          Route::post('complains/update/{id}', [ComplainsController::class, 'update'])->name('complains.updater');
          Route::post('complains/table', [ComplainsController::class, 'table'])->name('complains.table');
          Route::post('complains/heinous', [ComplainsController::class, 'getHeinousList'])->name('complains.heinous');
          Route::post('store/heinous', [ComplainsController::class, 'storeHeinous'])->name('store.heinous');
          Route::post('delete/heinous', [ComplainsController::class, 'deleteHeinous'])->name('delete.heinous');

          Route::post('get/ptn/email', [ComplainsController::class, 'getComplaintEmailList'])->name('get.ptn.email');
          Route::post('store/ptn/email', [ComplainsController::class, 'storeComplaintEmail'])->name('store.ptn.email');
          Route::post('delete/ptn/email', [ComplainsController::class, 'deleteComplaint'])->name('delete.ptn.emails');

          Route::post('/reports/table', [ReportController::class, 'table'])->name('reports.table');
          Route::post('/reports/candidate/table', [ReportController::class, 'tableByCandidateId'])
               ->name('reports.candidate');
          Route::get('/report/employer/view/{id}', [ReportController::class, 'employerReportView'])
               ->name('report.employer.view');
          Route::post('/report/submit', [ReportController::class, 'submit'])->name('report.submit');
          Route::post('/report/employee/table', [ReportController::class, 'employeeTable'])
               ->name('report.employee.table');
          Route::get('/report/view/{id}/employee', [ReportController::class, 'formEmployerView'])
               ->name('report.employee.view');
     });

     Route::group(['middleware' => ['can:agency']], function () {
          Route::post('/employers/table', [EmployerController::class, 'table'])->name('employers.table');
          Route::get('/employers/create', [EmployerController::class, 'create'])->name('employers.create');
          Route::post('/employers/store', [EmployerController::class, 'store'])->name('employers.store');
          Route::get('/employers/show/{id}', [EmployerController::class, 'show'])->name('employers.show');
          Route::post('/employers/update/{id}', [EmployerController::class, 'update'])->name('employers.update');
          Route::get('/employers/rp/{id}', [EmployerController::class, 'resetPassword'])->name('employers.resetpass');
          Route::get('/employers/d/{id}', [EmployerController::class, 'destroy'])->name('employers.delete');
          Route::get('/employers', [EmployerController::class, 'index'])->name('employers');

          Route::get('/candidates/create/{agency_id}', [CandidateController::class, 'new'])->name('candidate.create');
          Route::post('/candidates/insert', [CandidateController::class, 'insert'])->name('candidate.insert');
          Route::post('/candidates/a/t', [CandidateController::class, 'tableApplicants'])
               ->name('candidate.applicant.table');
          Route::post('/candidates/update', [CandidateController::class, 'update'])->name('candidate.update');
          Route::post('/candidates/deploy', [CandidateController::class, 'deploy'])->name('candidate.assign.deploy');
          Route::post('/candidates/a/e', [CandidateController::class, 'employ'])->name('candidate.assign.employer');
          Route::post('/candidates/e/t', [CandidateController::class, 'tableEmployed'])->name('candidate.employed.table');
          Route::get('/applicant', [CandidateController::class, 'applicants'])->name('candidate.applicant');
          Route::get('/employed', [CandidateController::class, 'employed'])->name('candidate.employed');
          Route::post('/send/code', [CandidateController::class, 'sendCode'])->name('send.code');
          Route::get('/candidates/pdf/', [CandidateController::class, 'toPDF'])->name('candidate.pdf');
          Route::get('/candidates/word/', [CandidateController::class, 'toWord'])->name('candidate.word');
          Route::get('/candidates/{id}/show', [CandidateController::class, 'show'])->name('candidate.edit');
          Route::post('/candidates/update/created_at', [CandidateController::class, 'updateCreatedAt'])
               ->name('candidate.update.created_at');

          Route::post('/candidates/del/skill', [CandidateController::class, 'deleteSkill'])->name('candidate.del.skill');
          Route::post('/candidates/save/skill', [CandidateController::class, 'saveSkill'])->name('candidate.save.skill');
          Route::post('/candidates/get/skill', [CandidateController::class, 'getSkill'])->name('candidate.get.skill');

          Route::get('/affiliates', [AffiliateController::class, 'index'])->name('affiliates')->middleware('can:agency');
          Route::post('/affiliates/table', [AffiliateController::class, 'table'])->name('affiliates.table');
          Route::get('/affiliates/create', [AffiliateController::class, 'create'])
               ->name('affiliates.create')
               ->middleware('can:agency');
          Route::post('/affiliates/store', [AffiliateController::class, 'store'])->name('affiliates.store');
          Route::get('/affiliate/show/{id}', [AffiliateController::class, 'show'])->name('affiliates.show');
          Route::post('/affiliate/update/{id}', [AffiliateController::class, 'update'])->name('affiliates.update');
          Route::get('/affiliate/rp/{id}', [AffiliateController::class, 'resetPassword'])->name('affiliates.resetpass');
          Route::get('/affiliate/d/{id}', [AffiliateController::class, 'destroy'])->name('affiliates.delete');

          Route::get('/details/{id}', [OtherDetailsController::class, 'show'])->name('details')
               ->middleware('can:admin_agency_gov');
          Route::post('/details/document/store', [OtherDetailsController::class, 'storeDocument'])
               ->name('details.document.store');
          Route::post('/details/document/table', [OtherDetailsController::class, 'tableDocuments'])
               ->name('details.document.table');
          Route::post('/details/document/delete', [OtherDetailsController::class, 'deleteDocuments'])
               ->name('details.document.delete');
          Route::post('/details/flight/delete', [OtherDetailsController::class, 'deleteFlight'])
               ->name('details.flight.delete');

          Route::post('/details/flight/store', [OtherDetailsController::class, 'storeFlight'])
               ->name('details.flight.store');
          Route::post('/details/add/checklist', [OtherDetailsController::class, 'insertCheckList'])
               ->name('details.insert.checklist');
          Route::get('/details/approve/item/{id}', [OtherDetailsController::class, 'approveItem'])
               ->name('details.approve.item');
          Route::get('/details/pending/item/{id}', [OtherDetailsController::class, 'pendingItem'])
               ->name('details.pending.item');
          Route::get('/details/delete/item/{id}', [OtherDetailsController::class, 'deleteItem'])
               ->name('details.delete.item');

          Route::post('voucher/table', [VoucherController::class, 'table'])->name('voucher.table');
          Route::post('voucher/invalid', [VoucherController::class, 'invalid'])->name('voucher.invalid');
          Route::get('voucher/cash/voucher/{id}', [VoucherController::class, 'cashVoucher'])->name('cash.voucher');
          Route::get('voucher/export', [VoucherController::class, 'export'])->name('voucher.export');
          Route::resource('voucher', VoucherController::class)->middleware('can:agency');
     });

     Route::post('/details/flight/table', [OtherDetailsController::class, 'tableFlights'])
          ->name('details.flight.table');

     Route::get('/candidates/overview/{id}', [CandidateController::class, 'overview'])->name('candidate.overview');

     Route::get('/employee', [MyEmployeeController::class, 'index'])->name('candidate.employees');
     Route::post('/employee/table', [MyEmployeeController::class, 'table'])->name('candidate.employees.table');
     Route::get('/employee/{id}/show', [MyEmployeeController::class, 'show'])->name('candidate.employees.edit');

     Route::resource('chat', ChatController::class);
});

Route::get('/set/{locale}', function ($locale) {
     if (!in_array($locale, ['en', 'arb'])) {
          abort(400);
     }

     session()->put('locale', $locale);

     return redirect()->back();
})->name('set.locale');

require __DIR__ . '/auth.php';
