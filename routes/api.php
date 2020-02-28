<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


//Authentication
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
Route::get('details', 'API\UserController@details');
});

//USER CRUD
Route::get('users','API\UserController@getAllUsers');
Route::get('show/{id}','API\UserController@show');
Route::put('update/{id}','API\UserController@updateById');
Route::delete('destroy/{id}','API\UserController@destroy');

//HOSPITAL CRUD
Route::get('hospitals','HospitalController@getAllHospitals');
Route::post('createHospital','HospitalController@createHospital');
Route::get('showHospital/{id}','HospitalController@show');
Route::put('updateHospital/{id}','HospitalController@updateById');
Route::delete('destroyHospital/{id}','HospitalController@destroy');

//Patient CRUD
Route::get('patients','PatientController@getAllPatients');
Route::post('createPatient','PatientController@createPatient');
Route::get('showPatient/{id}','PatientController@show');
Route::put('updatePatient/{id}','PatientController@updateById');
Route::delete('destroyPatient/{id}','PatientController@destroy');

//Hospital_User Relation
Route::get('usersHosp/{id}','HomeController@hospitalsByUserId');
Route::get('hospUsers/{id}','HomeController@usersByHospitalId');

//Hospital_Patient Relation
Route::get('hospPatient/{id}','HomeController@patientsByHospitalId');
Route::get('patientHosp/{id}','HomeController@hospitalsByPatientId');

//Hospital_User Relation
Route::get('usersPatient/{id}','HomeController@patientsByUserId');
Route::get('patientUsers/{id}','HomeController@usersByPatientId');

