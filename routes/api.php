<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('city',[ApiController::class,'city']);
Route::get('cities',[ApiController::class,'cities']);

Route::post('login',[ApiController::class,'login']);
Route::post('survey',[ApiController::class,'survey']);
Route::post('get_survey',[ApiController::class,'get_survey']);
Route::get('get_user',[ApiController::class,'get_user']);
Route::get('get_survey',[ApiController::class,'get_survey']);
Route::get('get_count',[ApiController::class,'get_count']);
Route::get('get_zone',[ApiController::class,'get_zone']);
Route::post('grid',[ApiController::class,'grid']);
Route::get('get_grid',[ApiController::class,'get_grid']);
Route::get('get_grid_count',[ApiController::class,'get_grid_count']);

Route::get('get_nature_of_busi',[ApiController::class,'get_nature_of_busi']);
Route::get('get_license',[ApiController::class,'get_license']);
Route::get('get_business_type',[ApiController::class,'get_business_type']);
Route::get('document_type',[ApiController::class,'document_type']);
Route::post('create',[ApiController::class,'create']);
