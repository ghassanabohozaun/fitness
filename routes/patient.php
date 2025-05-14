<?php

use App\Http\Controllers\Patient\PatientLoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Patient Routes
|--------------------------------------------------------------------------
*/

Route::group(
    [
        'namespace' => 'Patient',
        'middleware' => ['auth:patient', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {


        Route::get('/dashboard', function(){
            return view('patient.index');
        })->name('patient.dashboard');


    },
);

/////////////////////////////////////////////////////////////////////////////////////////////
/// Guest => that mean:must not be patient => because any one must be able to access login page
Route::group(['namespace' => 'Patient', 'middleware' => 'guest:patient'], function () {
    Route::get('/', [PatientLoginController::class, 'getLogin'])->name('get.patient.login');
    Route::post('/', [PatientLoginController::class, 'doLogin'])->name('patient.login');

    // Route::group(['prefix' => 'signup'], function () {
    //     Route::get('/', [StudentSignUpController::class, 'getSignup'])->name('student.signup');
    //     Route::post('/store', [StudentSignUpController::class, 'doSignup'])->name('student.signup.store');
    // });
});
// /////////////////////////////////////////////////////////////////////////////////////////////
 /// Logout
Route::get('/patient/logout', [PatientLoginController::class, 'logout'])->name('patient.logout');


