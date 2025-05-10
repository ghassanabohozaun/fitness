<?php

use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\Student\StudentLoginController;
use App\Http\Controllers\Student\StudentNotiticationsController;
use App\Http\Controllers\Student\StudentSignUpController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
*/

Route::group(
    [
        'namespace' => 'Student',
        'middleware' => ['auth:student', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        //courses
        Route::get('/courses', [StudentDashboardController::class, 'courses'])->name('student.courses');
        Route::get('/courses-paging', [StudentDashboardController::class, 'coursesPaging'])->name('student.courses.paging');
        Route::get('/get-course/{id?}' , [StudentDashboardController::class, 'getCourse'])->name('student.get.course');
        // update account
        Route::get('/update-account', [StudentDashboardController::class, 'getUpdateAccount'])->name('student.update.account');
        Route::post('/update-account', [StudentDashboardController::class, 'updateAccount'])->name('student.update.account');
        //checkout and enroll
        Route::get('/checkout/{id?}', [StudentDashboardController::class, 'checkout'])->name('student.checkout');
        Route::post('/enroll/course', [StudentDashboardController::class, 'enrollCourse'])->name('student.enroll.course');


        // notifications
        Route::get('/notifications' , [StudentDashboardController::class,'notifications'])->name('student.notifications');
        Route::get('/notifications-paging' , [StudentDashboardController::class,'notificationsPaging'])->name('student.notifications.paging');
        Route::post('/notification-read' , [StudentDashboardController::class,'notificationRead'])->name('student.notifications.read');


       // header notifications
       Route::get('/header/notifications' , [StudentNotiticationsController::class,'index'])->name('student.get.header.notificatoins');
    },
);

/////////////////////////////////////////////////////////////////////////////////////////////
/// Guest => that mean:must not be admin => because any one must be able to access login page
Route::group(['namespace' => 'Student', 'middleware' => 'guest:student'], function () {
    Route::get('/', [StudentLoginController::class, 'getLogin'])->name('get.student.login');
    Route::post('/', [StudentLoginController::class, 'doLogin'])->name('student.login');

    Route::group(['prefix' => 'signup'], function () {
        Route::get('/', [StudentSignUpController::class, 'getSignup'])->name('student.signup');
        Route::post('/store', [StudentSignUpController::class, 'doSignup'])->name('student.signup.store');
    });
});
// /////////////////////////////////////////////////////////////////////////////////////////////
// /// Logout
Route::get('/student/logout', [StudentLoginController::class, 'logout'])->name('student.logout');
