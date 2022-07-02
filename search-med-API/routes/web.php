<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\HopitalController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\BloodbagController;


Route::name('setting')->get('/setting', function () {
    return view('pages/setting');
});

Route::name('dash-medicine')->get('/dashboard-medicine', function () {
    return view('pages/medicine');
});

Route::name('home')->get('/', function () {
    return view('pages/home');
});
//login to account
Route::get('/admin-login', [AdminController::class, 'login'])->name('admin-login');

Route::post('/login-admin',[AdminController::class,'adminLogin'])->name('login-admin');

Route::get('/pharmacy-login', [PharmacyController::class, 'pharmacyLogin'])->name('pharmacy-login');

Route::post('/pharmacy-login', [PharmacyController::class, 'login'])->name('login-pharmacy');

Route::get('/hospital-login', [HopitalController::class, 'hospitalLogin'])->name('hospital-login');

Route::post('/hospital-login', [HopitalController::class, 'login'])->name('login-hospital');

//dashboard routes

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('isAdminLoggedIn');


//logout routes

Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

//app routes

Route::get('/pharmacy', [PharmacyController::class,'addPharmacy'])->name('add.pharmacy');

Route::post('/pharmacy', [PharmacyController::class, 'savePharmacy'])->name('save.pharmacy');

Route::get('/pharmacy-list',[PharmacyController::class,'displayPharmacy'])->name('display.pharmacy');

Route::get('/edit-pharmacy/{id}',[PharmacyController::class,'editPharmacy'])->name('edit.pharmacy');

Route::post('/update-pharmacy',[PharmacyController::class,'updatePharmacy'])->name('update.pharmacy');

Route::get('/delete-pharmacy/{id}',[PharmacyController::class,'deletePharmacy'])->name('delete.pharmacy');


Route::get('/add-hospital',[HopitalController::class,'addHospital'])->name('add.hospital');

Route::post('/add-hospital', [HopitalController::class,'saveHospital'])->name('save.hospital');

Route::get('/list-hospital', [HopitalController::class,'listHospital'])->name('list.hospital');

Route::get('/edit-hospital/{id}', [HopitalController::class,'editHospital'])->name('edit.hospital');

Route::post('/update-hospital', [HopitalController::class,'updateHospital'])->name('update.hospital');

Route::get('/delete-hospital/{id}', [HopitalController::class,'deleteHospital'])->name('delete.hospital');

//pharmacy and medicine routes

Route::name('dashboard-pharmacy')->get('/dashboard-pharmacy', [PharmacyController::class, 'dashPharmacy']);

Route::get('/medicine',[MedicineController::class,'listMedicine'])->name('list.medicine');

Route::post('/import-medicine',[MedicineController::class, 'importMedicine'])->name('import.medicine');

//Route::post('/update-medicine',[MedicineController::class, 'updateMedicine'])->name('update.medicine');

Route::delete('/delete-medicine/{id}',[MedicineController::class, 'deleteMedicine'])->name('delete.medicine');


//hospital dash and blood routes

Route::name('dashboard-hospital')->get('/dashboard-hospital', [HopitalController::class, 'dashHospital']);

Route::get('/blood-bag',[BloodbagController::class,'listBloodbag'])->name('list.bloodbag');

Route::post('/import-bloodbag',[BloodbagController::class, 'importBloodbag'])->name('import.bloodbag');

Route::delete('/delete-bloodbag/{id}',[BloodbagController::class, 'deletebloodbag'])->name('delete.bloodbag');