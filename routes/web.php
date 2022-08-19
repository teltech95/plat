<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NormalController;
use App\Http\Controllers\CorporateController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('tfa', function () {
//     return view('tfa');
// })->name('tfa');

Route::middleware(['middleware'=>'preventBackHistory'])->group(function () {
    Auth::routes();
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'normal', 'middleware'=>['isNormal','auth','preventBackHistory']], function(){
        Route::get('dashboard',[NormalController::class,'index'])->name('normal.dashboard');
        Route::get('my-account',[NormalController::class,'my_account'])->name('normal.my_account');


 });

Route::group(['prefix'=>'corporate', 'middleware'=>['isCorporate','auth','preventBackHistory']], function(){
    Route::get('dashboard',[CorporateController::class,'index'])->name('corporate.dashboard');
    Route::get('deductions',[CorporateController::class,'list_deduction'])->name('corporate.deduction');
    Route::get('deduction/add',[CorporateController::class,'add_deduction'])->name('corporate.add_deduction');
    Route::post('save_deduction',[CorporateController::class,'save_deduction'])->name('corporate.save_deduction');
    Route::get('deduction/import',[CorporateController::class,'import_deduction'])->name('corporate.import_deduction');
    Route::get('deduction/rejected',[CorporateController::class,'rejected_deduction'])->name('corporate.rejected_deduction');
    Route::get('deduction/approved',[CorporateController::class,'approved_deduction'])->name('corporate.approved_deduction');
    Route::get('deduction/{record_ID}',[CorporateController::class,'deduction_detail'])->name('corporate.deduction_detail');
    Route::get('re_deduction-detail/{record_ID}',[CorporateController::class,'rejected_deduction_detail'])->name('corporate.rejected_deduction_detail');
    Route::get('ap_deduction-detail/{record_ID}',[CorporateController::class,'approved_deduction_detail'])->name('corporate.approved_deduction_detail');
    Route::post('save_import_deduction',[CorporateController::class,'save_import_deduction'])->name('corporate.save_import_deduction');
    Route::get('pending',[CorporateController::class,'pending_deduction'])->name('corporate.pending_deduction');
    Route::get('pe_deduction-detail/{record_ID}',[CorporateController::class,'pending_deduction_detail'])->name('corporate.pending_deduction_detail');
    Route::get('deduction/delete/{record_ID}',[CorporateController::class,'destroy_deduction'])->name('corporate.destroy_deduction');
    Route::match(['GET', 'POST'], 'deduction/update/{record_ID}',[CorporateController::class, 'update_deduction'])->name('corporate.update_deduction');
    Route::get('feedback',[CorporateController::class,'feedback'])->name('corporate.feedback');
    Route::get('search_records',[CorporateController::class,'search_records'])->name('corporate.search_records');

});

Route::group(['prefix'=>'company', 'middleware'=>['isCompany','auth','preventBackHistory']], function(){
    Route::get('dashboard',[CompanyController::class,'index'])->name('company.dashboard');
    Route::get('get',[CompanyController::class,'getCompany'])->name('company.getCompany');
    Route::post('save',[CompanyController::class,'saveCompany'])->name('company.saveCompany');
    Route::get('companies',[CompanyController::class,'viewCompany'])->name('company.viewcompany');
    Route::get('deductions',[CompanyController::class,'list_deduction'])->name('company.deduction');
    Route::get('deduction/{record_ID}',[CompanyController::class,'deduction_detail'])->name('company.deduction_detail');
    Route::match(['GET', 'POST'], 'update_status/{record_ID}',[CompanyController::class, 'update_status'])->name('company.update_status');
    Route::get('list',[CompanyController::class,'list'])->name('company.list');
    //Route::get('pe_deduction-detail/{record_ID}',[CompanyController::class,'pending_deduction_detail'])->name('company.pending_deduction_detail');
    Route::get('pending',[CompanyController::class,'pending_deduction'])->name('company.pending_deduction');
    Route::get('approved',[CompanyController::class,'approved_deduction'])->name('company.approved_deduction');
    Route::get('rejected',[CompanyController::class,'rejected_deduction'])->name('company.rejected_deduction');
    Route::get('search',[CompanyController::class,'search'])->name('company.search');
    Route::get('search_records',[CompanyController::class,'search_records'])->name('company.search_records');
    Route::get('deduction/delete/{id}',[CompanyController::class,'destroy_deduction'])->name('company.destroy_deduction');


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
