<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Master\CityController;
use App\Http\Controllers\Master\DocumentController;
use App\Http\Controllers\Master\BussinessRegController;
use App\Http\Controllers\Master\CorporationController;
use App\Http\Controllers\Master\EmployeeController;
use App\Http\Controllers\Master\TypeOfBussinessController;
use App\Http\Controllers\Master\TypeOfLicenceController;
use App\Http\Controllers\Serve\NewServecontroller;
use App\Http\Controllers\Serve\ExistingServeController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Master\ZoneController;
use App\Http\Controllers\Master\OperatorController;
use App\Http\Controllers\Master\Business_TypeController;
use App\Http\Controllers\Master\Admin_MasterController;
use App\Http\Controllers\Master\NoticeController;
use App\Http\Controllers\ProfileController;


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

// Route::view('admin_login','admin_panel.login')->name('login1');

//Route::view('certificate','print.new_certificate')->name('dashboard11');
Route::view('demo','demo')->name('demo');

Route::get('login',[LoginController::class,'login_page'])->name('login_page');
Route::get('log_out',[LoginController::class,'log_out'])->name('log_out');
Route::post('login_submit',[LoginController::class,'login_submit'])->name('login_submit');
Route::get('admin1',[LoginController::class,'admin_panel'])->name('admin_panel');


Route::get('profile',[ProfileController::class,'profile'])->name('profile');
Route::post('edit_profile',[ProfileController::class,'edit_profile'])->name('edit_profile');

Route::group(['middleware'=>'Authenticateuser'],function(){

    //Route::get('admin_panel_dashboard','admin_panel.barchart')->name('admin_dashboard');
    Route::get('admin_panel_dashboard',[AdminController::class,'barchart'])->name('admin_dashboard');
    // Route::get('admin_report',[AdminController::class,'business_type_report'])->name('admin_report');


    Route::get('city',[CityController::class,'index'])->name('city');
    Route::post('cityinsert',[CityController::class,'create'])->name('cityinsert');
    Route::get('citydelete/{id}',[CityController::class,'delete'])->name('citydelete');
    Route::get('cityedit/{id}',[CityController::class,'edit'])->name('cityedit');
    Route::post('cityupdate',[CityController::class,'update'])->name('cityupdate');
    
    
    Route::get('document',[DocumentController::class,'index'])->name('document');
    Route::post('documentinsert',[DocumentController::class,'create'])->name('documentinsert');
    Route::get('documentdelete/{id}',[DocumentController::class,'delete'])->name('documentdelete');
    Route::get('documentedit/{id}',[DocumentController::class,'edit'])->name('documentedit');
    Route::post('documentupdate',[DocumentController::class,'update'])->name('documentupdate');


    Route::get('zone',[ZoneController::class,'index'])->name('zone');
    Route::post('zoneinsert',[ZoneController::class,'create'])->name('zoneinsert');
    Route::get('zonedelete/{id}',[ZoneController::class,'delete'])->name('zonedelete');
    Route::get('zoneedit/{id}',[ZoneController::class,'edit'])->name('zoneedit');
    Route::post('zoneupdate',[ZoneController::class,'update'])->name('zoneupdate');
    
    Route::get('bussiness',[BussinessRegController::class,'index'])->name('bussiness');
    Route::post('bussinessinsert',[BussinessRegController::class,'create'])->name('bussinessinsert');
    Route::get('bussinessdelete/{id}',[BussinessRegController::class,'delete'])->name('bussinessdelete');
    Route::get('bussinessedit/{id}',[BussinessRegController::class,'edit'])->name('bussinessedit');
    Route::post('bussinessupdate',[BussinessRegController::class,'update'])->name('bussinessupdate');
    
    
    Route::get('new_bussiness',[Business_TypeController::class,'index'])->name('new_bussiness');
    Route::post('new_bussinessinsert',[Business_TypeController::class,'create'])->name('new_bussinessinsert');
    Route::get('new_bussinessdelete/{id}',[Business_TypeController::class,'delete'])->name('new_bussinessdelete');
    Route::get('new_bussinessedit/{id}',[Business_TypeController::class,'edit'])->name('new_bussinessedit');
    Route::post('new_bussinessupdate',[Business_TypeController::class,'update'])->name('new_bussinessupdate');
    
    
    Route::get('corporation',[CorporationController::class,'index'])->name('corporation');
    Route::post('corporationinsert',[CorporationController::class,'create'])->name('corporationinsert');
    Route::get('corporationdelete/{id}',[CorporationController::class,'delete'])->name('corporationdelete');
    Route::get('corporationedit/{id}',[CorporationController::class,'edit'])->name('corporationedit');
    Route::post('corporationupdate',[CorporationController::class,'update'])->name('corporationupdate');
    
    Route::get('employee',[EmployeeController::class,'index'])->name('employee');
    Route::post('employeeinsert',[EmployeeController::class,'create'])->name('employeeinsert');
    Route::get('employeedelete/{id}',[EmployeeController::class,'delete'])->name('employeedelete');
    Route::get('employeeedit/{id}',[EmployeeController::class,'edit'])->name('employeeedit');
    Route::post('employeeupdate',[EmployeeController::class,'update'])->name('employeeupdate');
    
    Route::get('operator',[OperatorController::class,'index'])->name('operator');
    Route::post('operatorinsert',[OperatorController::class,'create'])->name('operatorinsert');
    Route::get('operatordelete/{id}',[OperatorController::class,'delete'])->name('operatordelete');
    Route::get('operatoredit/{id}',[OperatorController::class,'edit'])->name('operatoredit');
    Route::post('operatorupdate',[OperatorController::class,'update'])->name('operatorupdate');
    
    
    
  
    
    
    Route::get('typeofbussiness',[TypeOfBussinessController::class,'index'])->name('typeofbussiness');
    Route::post('typeofbussinessinsert',[TypeOfBussinessController::class,'create'])->name('typeofbussinessinsert');
    
    Route::get('typeofbussinessdelete/{id}',[TypeOfBussinessController::class,'delete'])->name('typeofbussinessdelete');
    Route::get('typeofbussinessedit/{id}',[TypeOfBussinessController::class,'edit'])->name('typeofbussinessedit');
    Route::post('typeofbussinessupdate',[TypeOfBussinessController::class,'update'])->name('typeofbussinessupdate');
    
    Route::post('hotel_insert',[TypeOfBussinessController::class,'create_hotel'])->name('hotel_insert');
    Route::get('delete_hotel/{id}',[TypeOfBussinessController::class,'delete_hotel'])->name('delete_hotel');
    Route::get('edit_hotel/{id}',[TypeOfBussinessController::class,'edit_hotel'])->name('edit_hotel');
    Route::post('update_hotel',[TypeOfBussinessController::class,'update_hotel'])->name('update_hotel');
    
    Route::get('typeoflicence',[TypeOfLicenceController::class,'index'])->name('typeoflicence');
    Route::post('typeoflicenceinsert',[TypeOfLicenceController::class,'create'])->name('typeoflicenceinsert');
    Route::get('typeoflicencedelete/{id}',[TypeOfLicenceController::class,'delete'])->name('typeoflicencedelete');
    Route::get('typeoflicenceedit/{id}',[TypeOfLicenceController::class,'edit'])->name('typeoflicenceedit');
    Route::post('typeoflicenceupdate',[TypeOfLicenceController::class,'update'])->name('typeoflicenceupdate');  

    Route::get('admin_dashboard',[AdminController::class,'showserve'])->name('dashboard1');
    Route::get('showserve22',[AdminController::class,'showserve'])->name('showserve1');
    Route::get('count_dashboard',[AdminController::class,'dashboard'])->name('count_dashboard');
    Route::get('existingserveform',[AdminController::class,'existingserveform'])->name('existingserveform1');
    Route::get('update_status_existing/{id}',[AdminController::class,'update_status_existing'])->name('update_status_existing');
    Route::get('update_status/{id}',[AdminController::class,'update_status'])->name('update_status');
    Route::get('report1',[AdminController::class,'report1'])->name('report1');
    Route::post('update_new_payment',[AdminController::class,'update_new_payment'])->name('update_new_payment');
    Route::get('edit_new_payment/{id}',[AdminController::class,'edit_new_payment'])->name('edit_new_payment');
    Route::post('update_existing_payment',[AdminController::class,'update_existing_payment'])->name('update_existing_payment');
    Route::get('edit_existing_payment/{id}',[AdminController::class,'edit_existing_payment'])->name('edit_existing_payment');
    Route::get('bar',[AdminController::class,'barchart'])->name('bar');
    Route::get('receipt',[AdminController::class,'receipt'])->name('receipt');
    Route::get('license',[AdminController::class,'license'])->name('license');
    Route::get('fee_collected',[AdminController::class,'fee_collected'])->name('fee_collected');

    Route::get('data_from_app',[ReportController::class,'data_from_app'])->name('data_from_app');


});
    Route::get('admin',[Admin_MasterController::class,'index'])->name('admin');
    Route::post('admininsert',[Admin_MasterController::class,'create'])->name('admininsert');
    Route::get('admindelete/{id}',[Admin_MasterController::class,'delete'])->name('admindelete');
    Route::get('adminedit/{id}',[Admin_MasterController::class,'edit'])->name('adminedit');
    Route::post('adminupdate',[Admin_MasterController::class,'update'])->name('adminupdate');



    Route::get('notice',[NoticeController::class,'notice'])->name('notice');
    Route::post('insert_into_notice2',[NoticeController::class,'insert_into_notice2'])->name('insert_into_notice2');
    Route::get('delete_notice2/{id}',[NoticeController::class,'delete_from_notice2'])->name('delete_notice2');
    Route::post('insert_notice3',[NoticeController::class,'insert_notice3'])->name('insert_notice3');
    Route::get('delete_notice3/{id}',[NoticeController::class,'delete_notice3'])->name('delete_notice3');
    Route::get('edit_notice2/{id}',[NoticeController::class,'edit_notice2'])->name('edit_notice2');
    Route::post('update_notice2',[NoticeController::class,'update_notice2'])->name('update_notice2');
    Route::get('edit_notice3/{id}',[NoticeController::class,'edit_notice3'])->name('edit_notice3');
    Route::post('update_notice3',[NoticeController::class,'update_notice3'])->name('update_notice3');

    // Route::get('operator_admin_login',[LoginController::class,'operator_login_page'])->name('operator_login_page');
    Route::get('operator_log_out',[LoginController::class,'operator_log_out'])->name('operator_log_out');
    // Route::post('operator_login_submit',[LoginController::class,'operator_login_submit'])->name('operator_login_submit');
    Route::get('operator_admin',[LoginController::class,'operator_admin_panel'])->name('operator_admin_panel');

//Route::group(['middleware'=>'AuthenticateOprator'],function(){

    Route::group(['middleware' => 'AuthenticateOperator'], function() {

    Route::view('dashboard','Master.dashboard')->name('dashboard');

    Route::get('newserve',[NewServecontroller::class,'index'])->name('newserve');
    Route::post('newserveinsert',[NewServecontroller::class,'create'])->name('newserveinsert');
    Route::get('newservedelete/{id}',[NewServecontroller::class,'delete'])->name('newservedelete');
    Route::get('newserveedit/{id}',[NewServecontroller::class,'edit'])->name('newserveedit');
    Route::post('newserveupdate',[NewServecontroller::class,'update'])->name('newserveupdate');
    Route::get('edit_existing/{id}',[NewServecontroller::class,'edit_existing'])->name('edit_existing');
    Route::post('update_existing',[NewServecontroller::class,'update_existing'])->name('update_existing');
    Route::get('delete_existing/{id}',[NewServecontroller::class,'delete_existing'])->name('delete_existing');

    Route::get('demand_notice',[NewServecontroller::class,'demand_notice'])->name('demand_notice');
    Route::get('generate_certificate',[NewServecontroller::class,'generate_certificate'])->name('generate_certificate');


    Route::get('edit_payment_mode1/{id}',[NewServecontroller::class,'edit_payment_mode1'])->name('edit_payment_mode1');
    Route::post('update_payment_mode1',[NewServecontroller::class,'update_payment_mode1'])->name('update_payment_mode1');
    Route::get('edit_payment_mode02/{id}',[NewServecontroller::class,'edit_payment_mode02'])->name('edit_payment_mode02');
    Route::post('update_payment_mode02',[NewServecontroller::class,'update_payment_mode02'])->name('update_payment_mode02');
    Route::get('edit_payment_mode03/{id}',[NewServecontroller::class,'edit_payment_mode03'])->name('edit_payment_mode03');
    Route::post('update_payment_mode03',[NewServecontroller::class,'update_payment_mode03'])->name('update_payment_mode03');

    Route::get('get_zone_id',[NewServecontroller::class,'get_zone'])->name('get_zone_id');
    Route::get('get_business_type',[NewServecontroller::class,'get_business_type'])->name('get_business_type');



    Route::get('edit_payment_mode/{id}',[ExistingServeController::class,'edit_payment_mode'])->name('edit_payment_mode');
    Route::post('update_payment_mode',[ExistingServeController::class,'update_payment_mode'])->name('update_payment_mode');
    Route::get('edit_payment_mode02/{id}',[ExistingServeController::class,'edit_payment_mode02'])->name('edit_payment_mode02');
    Route::post('update_payment_mode02',[ExistingServeController::class,'update_payment_mode02'])->name('update_payment_mode02');
    Route::get('edit_payment_mode03/{id}',[ExistingServeController::class,'edit_payment_mode03'])->name('edit_payment_mode03');
    Route::post('update_payment_mode03',[ExistingServeController::class,'update_payment_mode03'])->name('update_payment_mode03');

    Route::get('print_serve_11/{id}',[ExistingServeController::class,'print_serve_11'])->name('print_serve_11');

    Route::get('amount/{id}',[ExistingServeController::class,'amount'])->name('amount');

    Route::get('showserve',[NewServecontroller::class,'showserve'])->name('showserve');

    Route::get('existingserve',[ExistingServeController::class,'existingserveform'])->name('existingserve');
    Route::post('existingserveinsert',[ExistingServeController::class,'create'])->name('existingserveinsert');
    Route::get('get_form_data',[ExistingServeController::class,'get_form_data'])->name('get_form_data');

    Route::get('get_business',[NewServecontroller::class,'get_busnes'])->name('get_busness');

    Route::get('get_licence_id',[NewServecontroller::class,'get_licence'])->name('get_licence_id');
    Route::get('get_estab',[ExistingServeController::class,'get_estab'])->name('get_estab');

    Route::get('send_notice/{id}',[NewServecontroller::class,'send_notice'])->name('send_notice');

    Route::post('generate_new_notice',[NewServecontroller::class,'generate_notice'])->name('generate_new_notice');
    Route::post('generate_new_notice02',[NewServecontroller::class,'generate_notice02'])->name('generate_new_notice02');
    Route::post('generate_new_notice03',[NewServecontroller::class,'generate_notice03'])->name('generate_new_notice03');
    
    Route::get('existing_send_notice/{id}',[ExistingServeController::class,'existing_send_notice'])->name('existing_send_notice');

    Route::post('generate_existing_notice',[ExistingServeController::class,'generate_existing_notice'])->name('generate_existing_notice');
    Route::post('generate_existing_notice02',[ExistingServeController::class,'generate_existing_notice02'])->name('generate_existing_notice02');
    Route::post('generate_existing_notice03',[ExistingServeController::class,'generate_existing_notice03'])->name('generate_existing_notice03');

    //  Route::view('/print1','print.new_survey_print');

    Route::get('print/{id}',[PrintController::class,'print'])->name('print');
    Route::get('print_existing/{id}',[PrintController::class,'print_existing'])->name('print_existing');


    //});
});

    Route::get('new_certificate/{id}',[NewServecontroller::class,'new_certificate'])->name('new_certificate');
    Route::get('existing_certificate/{id}',[ExistingServeController::class,'existing_certificate'])->name('existing_certificate');
    Route::get('existing_notice/{id}',[ExistingServeController::class,'existing_notice'])->name('existing_notice');
    Route::get('existing_notice02/{id}',[ExistingServeController::class,'existing_notice02'])->name('existing_notice02');
    Route::get('existing_notice03/{id}',[ExistingServeController::class,'existing_notice03'])->name('existing_notice03');
    Route::get('new_notice/{id}',[NewServecontroller::class,'new_notice'])->name('new_notice');
    Route::get('new_notice02/{id}',[NewServecontroller::class,'new_notice02'])->name('new_notice02');
    Route::get('new_notice03/{id}',[NewServecontroller::class,'new_notice03'])->name('new_notice03');
    Route::get('print-serve/{id}',[NewServecontroller::class,'print_serve'])->name('print-serve');
    Route::get('print-serve1/{id}',[ExistingServeController::class,'print_serve1'])->name('print-serve1');


    Route::get('notice2',[NewServecontroller::class,'notice2'])->name('notice2');
    Route::get('/clear-cache', function () {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return redirect()->back();
        //return "All cache cleared!";
    });
    