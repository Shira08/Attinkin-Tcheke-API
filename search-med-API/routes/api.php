<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnounceController;
use App\Http\Controllers\BugController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\HopitalController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\BloodbagController;

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
Route::resource('announce', AnnounceController::class);
Route::resource('bug', BugController::class);
Route::resource('pharmacy', PharmacyController::class);
Route::resource('hopital', HopitalController::class);
Route::resource('medicines', MedicineController::class);
Route::resource('bloodbags', BloodbagController::class);
Route::get('/searchPharmacy/{name}', [MedicineController::class, 'getPharmacy']); 
Route::get('/searchHopital/{name}', [BloodbagController::class, 'getHospital']); 