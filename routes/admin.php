<?php

use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\CertificationsController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CourseStudentsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\NotificationsController;
use App\Http\Controllers\Admin\PhotoAlbumsController;
use App\Http\Controllers\Admin\RevenuesController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SlidersController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SupportCenterController;
use App\Http\Controllers\Admin\TestimonialsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
////////////////////////////////////////////////////////////////////////
/// auth  => that mean : must be admin and login
///

Route::group(
    [
        'namespace' => 'Admin',
        'middleware' => ['auth:admin', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /// not found page

        Route::get('/notFound', [DashboardController::class, 'notFound'])->name('admin.not.found');
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /// dashboard
        // Route::get('/', [DashboardController::class, 'index'])
        //     ->name('admin.dashboard')
        //     ->middleware('can:dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('admin.dashboard')
            ->middleware('can:dashboard');

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /// settings
        Route::group(['middleware' => 'can:settings'], function () {
            Route::get('settings', [SettingsController::class, 'index'])
                ->name('get.admin.settings')
                ->middleware('can:settings');
            Route::post('settings', [SettingsController::class, 'storeSettings'])
                ->name('store.admin.settings')
                ->middleware('can:settings');
            Route::post('switch-en-lang', [SettingsController::class, 'switchEnglishLang'])->name('switch.english.lang');
            Route::post('switch-frontend-lang', [SettingsController::class, 'switchFrontendLang'])->name('switch.frontend.lang');
            Route::post('switch-disabled-forms', [SettingsController::class, 'switchDisabledForms'])->name('switch.disabled.forms');
        });

        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // Notifications Routes
        Route::group(['prefix' => 'notifications', 'middleware' => 'can:notifications'], function () {
            Route::get('/', [NotificationsController::class, 'index'])->name('admin.notifications');
            Route::get('/get/admin/notifications', [NotificationsController::class, 'getNotifications'])->name('admin.get.notifications');
            Route::get('/get/one/admin/notification', [NotificationsController::class, 'getOneNotification'])->name('admin.get.one.notification');
            Route::post('/admin/notification/make/read', [NotificationsController::class, 'makeRead'])->name('admin.notification.make.read');
        });

        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // Revenues Routes
        Route::group(['prefix' => 'revenues', 'middleware' => 'can:revenues'], function () {
            Route::get('/', [RevenuesController::class, 'index'])->name('admin.revenues');
        });

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /// admin routes

        Route::group(['middleware' => 'can:admins'], function () {
            Route::get('/admin', [AdminsController::class, 'index'])->name('get.admin');
            Route::get('/get-admin-by-id', [AdminsController::class, 'getAdminById'])->name('get.admin.by.id');
            Route::post('/admin-update', [AdminsController::class, 'adminUpdate'])->name('admin.update');
        });
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /// users routes
        Route::group(['prefix' => 'users', 'middleware' => 'can:users'], function () {
            Route::get('/', [UserController::class, 'index'])->name('users');
            Route::post('/destroy', [UserController::class, 'destroy'])->name('user.destroy');
            Route::post('/change-status', [UserController::class, 'changeStatus'])->name('user.change.status');
            Route::get('/create', [UserController::class, 'create'])->name('user.create');
            Route::post('store', [UserController::class, 'store'])->name('user.store');
            Route::get('/edit/{id?}', [UserController::class, 'edit'])->name('user.edit');
            Route::post('update', [UserController::class, 'update'])->name('user.update');
            Route::get('/trashed', [UserController::class, 'trashed'])->name('users.trashed');
            Route::post('/force-delete', [UserController::class, 'forceDelete'])->name('user.force.delete');
            Route::post('/restore', [UserController::class, 'restore'])->name('user.restore');
        });

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // home
        Route::group(['prefix' => 'landing-page', 'middleware' => 'can:landing-page'], function () {
            // sliders routes
            Route::group(['prefix' => 'sliders'], function () {
                Route::get('/', [SlidersController::class, 'index'])->name('admin.sliders');
                Route::get('/create', [SlidersController::class, 'create'])->name('admin.sliders.create');
                Route::post('/store', [SlidersController::class, 'store'])->name('admin.sliders.store');
                Route::post('/destroy', [SlidersController::class, 'destroy'])->name('admin.sliders.destroy');
                Route::get('/trashed', [SlidersController::class, 'trashed'])->name('admin.sliders.trashed');
                Route::post('/restore', [SlidersController::class, 'restore'])->name('admin.sliders.restore');
                Route::post('/force-delete', [SlidersController::class, 'forceDelete'])->name('admin.sliders.force.delete');
                Route::get('/edit/{id}', [SlidersController::class, 'edit'])->name('admin.sliders.edit');
                Route::post('/update', [SlidersController::class, 'update'])->name('admin.sliders.update');
                Route::post('/change-status', [SlidersController::class, 'changeStatus'])->name('admin.sliders.change.status');
            });
        });

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /// roles routes

        Route::group(['prefix' => 'roles', 'middleware' => 'can:roles'], function () {
            Route::get('/', 'RolesController@index')->name('admin.roles');
            Route::get('/get-roles', 'RolesController@getRoles')->name('get.admin.roles');
            Route::get('/create', 'RolesController@create')->name('admin.role.create');
            Route::post('/store', 'RolesController@store')->name('admin.role.store');
            Route::post('/destroy', 'RolesController@destroy')->name('admin.role.destroy');
            Route::get('/edit/{id?}', 'RolesController@edit')->name('admin.role.edit');
            Route::post('/update', 'RolesController@update')->name('admin.role.update');
        });

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /// students routes
        Route::group(['prefix' => 'students', 'middleware' => 'can:students'], function () {
            Route::get('/', [StudentController::class, 'index'])->name('admin.students');
            Route::post('/destroy', [StudentController::class, 'destroy'])->name('admin.students.destroy');
            Route::get('/create', [StudentController::class, 'create'])->name('admin.students.create');
            Route::post('store', [StudentController::class, 'store'])->name('admin.students.store');
            Route::get('/edit/{id?}', [StudentController::class, 'edit'])->name('admin.students.edit');
            Route::post('update', [StudentController::class, 'update'])->name('admin.students.update');
            Route::get('/trashed', [StudentController::class, 'trashed'])->name('admin.students.trashed');
            Route::post('/force-delete', [StudentController::class, 'forceDelete'])->name('admin.students.force.delete');
            Route::post('/restore', [StudentController::class, 'restore'])->name('admin.students.restore');
            Route::post('/change-freeze', [StudentController::class, 'changeFreeze'])->name('admin.students.change.freeze');
            Route::get('/profile/{id?}', [StudentController::class, 'profile'])->name('admin.students.profile');
        });

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /// courses routes
        Route::group(['prefix' => 'courses', 'middleware' => 'can:courses'], function () {
            Route::get('/', [CourseController::class, 'index'])->name('admin.courses');
            Route::post('/destroy', [CourseController::class, 'destroy'])->name('admin.courses.destroy');
            Route::get('/create', [CourseController::class, 'create'])->name('admin.courses.create');
            Route::post('store', [CourseController::class, 'store'])->name('admin.courses.store');
            Route::get('/edit/{id?}', [CourseController::class, 'edit'])->name('admin.courses.edit');
            Route::post('update', [CourseController::class, 'update'])->name('admin.courses.update');
            Route::get('/trashed', [CourseController::class, 'trashed'])->name('admin.courses.trashed');
            Route::post('/force-delete', [CourseController::class, 'forceDelete'])->name('admin.courses.force.delete');
            Route::post('/restore', [CourseController::class, 'restore'])->name('admin.courses.restore');
            Route::post('/change-status', [CourseController::class, 'changeStatus'])->name('admin.courses.change.status');
            Route::post('/change-show-cost', [CourseController::class, 'changeShowCost'])->name('admin.courses.change.show.cost');

            // enroll
            Route::get('/{id?}/students/', [CourseStudentsController::class, 'index'])->name('admin.course.enroll.student');
            Route::post('/enroll-student', [CourseStudentsController::class, 'store'])->name('admin.course.enroll.student.store');
            Route::post('/delete-enroll-student', [CourseStudentsController::class, 'destroy'])->name('admin.course.enroll.student.delete');
            Route::get('/get-all-students-name', [CourseStudentsController::class, 'getAllStudentsName'])->name('admin.get.all.students.name');
            Route::post('/enroll-greement-status' , [CourseStudentsController::class, 'enrollAgreementStatus'])->name('admin.course.enroll.agreement.status');

            // certifications
            Route::get('/student-certifications' , [CertificationsController::class,'index'])->name('admin.student.certifications');
            Route::post('/student-certifications/store' , [CertificationsController::class,'store'])->name('admin.student.certifications.store');
            Route::post('/student-certifications/update' , [CertificationsController::class,'update'])->name('admin.student.certifications.update');

        });

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /// videos routes
        Route::group(['prefix' => 'videos', 'middleware' => 'can:videos'], function () {
            Route::get('/', [VideosController::class, 'index'])->name('admin.videos');
            Route::get('/create', [VideosController::class, 'create'])->name('admin.videos.create');
            Route::post('/store', [VideosController::class, 'store'])->name('admin.videos.store');
            Route::post('/destroy', [VideosController::class, 'destroy'])->name('admin.videos.destroy');
            Route::get('/trashed', [VideosController::class, 'trashed'])->name('admin.videos.trashed');
            Route::post('/restore', [VideosController::class, 'restore'])->name('admin.videos.restore');
            Route::post('/force-delete', [VideosController::class, 'forceDelete'])->name('admin.videos.force.delete');
            Route::get('/edit/{id}', [VideosController::class, 'edit'])->name('admin.videos.edit');
            Route::post('/update', [VideosController::class, 'update'])->name('admin.videos.update');
            Route::post('/change-status', [VideosController::class, 'changeStatus'])->name('admin.videos.change.status');
            Route::get('/view.video', [VideosController::class, 'viewVideo'])->name('admin.videos.view');
        });

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /// photo albums routes
        Route::group(['prefix' => 'photo-albums', 'middleware' => 'can:photos'], function () {
            Route::get('/', [PhotoAlbumsController::class, 'index'])->name('admin.photo.albums');
            Route::get('/create', [PhotoAlbumsController::class, 'create'])->name('admin.photo.albums.create');
            Route::post('/store', [PhotoAlbumsController::class, 'store'])->name('admin.photo.albums.store');
            Route::post('/destroy', [PhotoAlbumsController::class, 'destroy'])->name('admin.photo.albums.destroy');
            Route::get('/trashed', [PhotoAlbumsController::class, 'trashed'])->name('admin.photo.albums.trashed');
            Route::post('/restore', [PhotoAlbumsController::class, 'restore'])->name('admin.photo.albums.restore');
            Route::post('/force-delete', [PhotoAlbumsController::class, 'forceDelete'])->name('admin.photo.albums.force.delete');
            Route::get('/edit/{id}', [PhotoAlbumsController::class, 'edit'])->name('admin.photo.albums.edit');
            Route::post('/update', [PhotoAlbumsController::class, 'update'])->name('admin.photo.albums.update');
            Route::get('/add-other-album-photos/{id}', [PhotoAlbumsController::class, 'addOtherAlbumPhotos'])->name('admin.add.other.album.photos');
            Route::post('/upload-other-album-photo/{paid}', [PhotoAlbumsController::class, 'uploadOtherAlbumPhotos'])->name('admin.upload.other.album.photos');
            Route::post('/delete-other-album-photo', [PhotoAlbumsController::class, 'deleteOtherAlbumPhoto'])->name('admin.delete.other.album.photo');
            Route::post('/change-status', [PhotoAlbumsController::class, 'changeStatus'])->name('admin.photo.albums.change.status');
        });

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /// faq routes
        Route::group(['prefix' => 'faqs', 'middleware' => 'can:faqs'], function () {
            Route::get('/', [FAQController::class, 'index'])->name('admin.faqs');
            Route::get('/create', [FAQController::class, 'create'])->name('admin.faqs.create');
            Route::post('/store', [FAQController::class, 'store'])->name('admin.faqs.store');
            Route::get('/edit/{id}', [FAQController::class, 'edit'])->name('admin.faqs.edit');
            Route::post('/update', [FAQController::class, 'update'])->name('admin.faqs.update');
            Route::get('/trashed', [FAQController::class, 'trashed'])->name('admin.faqs.trashed');
            Route::post('/destroy', [FAQController::class, 'destroy'])->name('admin.faqs.destroy');
            Route::post('/force-delete', [FAQController::class, 'forceDelete'])->name('admin.faqs.force.delete');
            Route::post('/restore', [FAQController::class, 'restore'])->name('admin.faqs.restore');
            Route::post('/change-status', [FAQController::class, 'changeStatus'])->name('admin.faqs.change.status');
        });

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // services routes
        Route::group(['prefix' => 'services', 'middllware' => 'can:services'], function () {
            Route::get('/', [ServicesController::class, 'index'])->name('admin.services');
            Route::post('/destroy', [ServicesController::class, 'destroy'])->name('admin.services.destroy');
            Route::post('/change-status', [ServicesController::class, 'changeStatus'])->name('admin.services.change.status');
            Route::get('/trashed', [ServicesController::class, 'getTrashed'])->name('admin.services.trashed');
            Route::post('/restore', [ServicesController::class, 'restore'])->name('admin.services.restore');
            Route::post('/force-delete', [ServicesController::class, 'forceDelete'])->name('admin.services.force.delete');
            Route::get('/create', [ServicesController::class, 'create'])->name('admin.services.create');
            Route::post('/store', [ServicesController::class, 'store'])->name('admin.services.store');
            Route::get('/edit/{id}', [ServicesController::class, 'edit'])->name('admin.services.edit');
            Route::post('/update', [ServicesController::class, 'update'])->name('admin.services.update');
        });

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // testimonials routes
        Route::group(['prefix' => 'testimonials', 'middleware' => 'can:testimonials'], function () {
            Route::get('/', [TestimonialsController::class, 'index'])->name('admin.testimonials');
            Route::get('/create', [TestimonialsController::class, 'create'])->name('admin.testimonial.create');
            Route::post('/store', [TestimonialsController::class, 'store'])->name('admin.testimonial.store');
            Route::get('/edit/{id?}', [TestimonialsController::class, 'edit'])->name('admin.testimonial.edit');
            Route::post('/update', [TestimonialsController::class, 'update'])->name('admin.testimonial.update');
            Route::post('/destroy', [TestimonialsController::class, 'destroy'])->name('admin.testimonial.destroy');
            Route::get('/trashed', [TestimonialsController::class, 'trashed'])->name('admin.testimonial.trashed');
            Route::post('/force-delete', [TestimonialsController::class, 'forceDelete'])->name('admin.testimonial.force.delete');
            Route::post('/restore', [TestimonialsController::class, 'restore'])->name('admin.testimonial.restore');
            Route::post('/change-status', [TestimonialsController::class, 'changeStatus'])->name('admin.testimonial.change-status');
        });

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /// articles  routes
        Route::group(['prefix' => 'articles', 'middleware' => 'can:articles'], function () {
            Route::get('/', [ArticlesController::class, 'index'])->name('admin.articles');
            Route::get('/create', [ArticlesController::class, 'create'])->name('admin.articles.create');
            Route::post('/store', [ArticlesController::class, 'store'])->name('admin.articles.store');
            Route::get('/edit/{id?}', [ArticlesController::class, 'edit'])->name('admin.articles.edit');
            Route::post('/update', [ArticlesController::class, 'update'])->name('admin.articles.update');
            Route::post('/destroy', [ArticlesController::class, 'destroy'])->name('admin.articles.destroy');
            Route::get('/trashed', [ArticlesController::class, 'trashed'])->name('admin.articles.trashed');
            Route::post('/force-delete', [ArticlesController::class, 'forceDelete'])->name('admin.articles.force.delete');
            Route::post('/restore', [ArticlesController::class, 'restore'])->name('admin.articles.restore');
            Route::post('/change-status', [ArticlesController::class, 'changeStatus'])->name('admin.articles.change.status');
        });

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // news routes
        Route::group(['prefix' => 'news', 'middleware' => 'can:news'], function () {
            Route::get('/', [NewsController::class, 'index'])->name('admin.news');
            Route::get('/create', [NewsController::class, 'create'])->name('admin.news.create');
            Route::post('/store', [NewsController::class, 'store'])->name('admin.news.store');
            Route::get('/edit/{id?}', [NewsController::class, 'edit'])->name('admin.news.edit');
            Route::post('/update', [NewsController::class, 'update'])->name('admin.news.update');
            Route::post('/destroy', [NewsController::class, 'destroy'])->name('admin.news.destroy');
            Route::get('/trashed', [NewsController::class, 'trashed'])->name('admin.news.trashed');
            Route::post('/force-delete', [NewsController::class, 'forceDelete'])->name('admin.news.force.delete');
            Route::post('/restore', [NewsController::class, 'restore'])->name('admin.news.restore');
            Route::post('/change-status', [NewsController::class, 'changeStatus'])->name('admin.news.change.status');
        });

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /// support center routes
        Route::group(['prefix' => 'support-center', 'middleware' => 'can:support-center'], function () {
            Route::get('/', [SupportCenterController::class, 'index'])->name('admin.support.center');
            Route::get('/get-support-center', [SupportCenterController::class, 'getSupportCenter'])->name('get.admin.support.center');
            Route::get('/create', [SupportCenterController::class, 'create'])->name('admin.support.center.create');
            Route::post('/send', [SupportCenterController::class, 'send'])->name('admin.support.center.send');
            Route::post('/destroy', [SupportCenterController::class, 'destroy'])->name('admin.support.center.message.destroy');
            Route::post('/change-status', [SupportCenterController::class, 'changeStatus'])->name('admin.support.center.change.status');
            Route::get('/get-one-message', [SupportCenterController::class, 'getOneMessage'])->name('admin.support.center.get.one.message');
        });
    },
);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/// Guest => that mean:must not be admin => because any one must be able to access login page
Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin'], function () {
    Route::get('/', [LoginController::class, 'getLogin'])->name('get.admin.login');
    Route::post('/', [LoginController::class, 'doLogin'])->name('admin.login');
});
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/// Logout
Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');
