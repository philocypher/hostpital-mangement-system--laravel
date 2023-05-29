<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//home resource controller and routes
Route::get('/', [HomeController::class,'index']);

Route::get('/home', [HomeController::class,'redirect']);
Route::post('/appointment', [HomeController::class,'appointment']);
Route::get('/myappointment', [HomeController::class,'myappointment']);
Route::get('/cancel_appoint/{id}', [HomeController::class,'cancel_appoint']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//admin resources and routes
Route::get('/add_doctor_view',[AdminController::class,'create']);
Route::post('/upload_doctor',[AdminController::class,'store']);
Route::get('/show_appoints',[AdminController::class,'show']);
Route::get('/approve/{id}',[AdminController::class,'approve']);
Route::get('canceled/{id}',[AdminController::class,'canceled']);
Route::get('/show_doctors',[AdminController::class,'show_docs']);
Route::get('/update_doc/{id}',[AdminController::class,'update_doc']);
Route::get('/delete_doc/{id}',[AdminController::class,'delete_doc']);
Route::get('/show_users',[AdminController::class,'users']);
Route::post('/update_info/{id}',[AdminController::class,'update_info']);
Route::get('/delete_user/{id}',[AdminController::class,'delete_user']);
Route::get('/edit_user/{id}',[AdminController::class,'edit_user']);
Route::post('/edit_user_info/{id}',[AdminController::class,'edit_user_info']);
//payrolls
// show_payrolls
Route::get('/show_payrolls',[AdminController::class,'show_payrolls']);

Route::get('/add_payroll/{id}',[AdminController::class,'add_payrolls']);



Route::get('/make_payroll/{id}',[AdminController::class,'make_payroll']);

//prescriptions
Route::get('show_prescriptions',[AdminController::class,'show_prescriptions']);






//doctor routes
Route::get('/myappoint',[DoctorController::class,'show']);
Route::get('/accept/{appoint}',[DoctorController::class, 'accept']);
Route::get('/cancel/{id}',[DoctorController::class, 'cancel']);

Route::post('/prescripe/{patient}',[DoctorController::class,'prescripes']);
Route::get('prescriptions',[DoctorController::class,'prescriptions']);

Route::get('edit_profile/{id}',[DoctorController::class,'profile']);
Route::post('store_profile/{id}',[DoctorController::class,'store_profile']);


// Route::get('/add_doctor_view',[AdminController::class,'create']);
// Route::get('/add_doctor_view',[AdminController::class,'create']);




