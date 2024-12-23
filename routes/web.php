<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController as Auth;
use App\Http\Controllers\DesktopController;
use App\Http\Controllers\InstanceController as Instance;
use App\Http\Controllers\ProgramController as Program;
use App\Http\Controllers\UsersController as Users;
use App\Http\Controllers\MobileController as Mobile;
use App\Http\Controllers\kategoriController as kategoriController;
use App\Http\Controllers\BannerController as banner;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\PosLocationController;
use App\Http\Controllers\TempController as Temp;
use App\Http\Controllers\UserEnrollmentController;
use App\Mail\emailSender;
use Illuminate\Support\Facades\Mail;

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

Route::middleware('auth')->group(function () {
    Route::prefix('administrator')->group(function () {
        Route::get('/user-enrollment', [UserEnrollmentController::class, 'view_user_enrollment'])->name("view_user_enrollment");
        // edit enrollment
        Route::get('/temp', [Temp::class, 'list'])->name("view_admin_enrollment_edit");

        Route::get('/temp/{id}', [Temp::class, 'view_admin_enrollment_edit'])->name("view_admin_enrollment_edit");
        Route::post('/temp/{id}', [Temp::class, 'mutate_admin_enrollment_edit'])->name("mutate_admin_enrollment_edit");
        //==============================

        Route::prefix('akun')->group(function () {
            Route::middleware('checkRole')->group(function () {
                Route::post('/', [Auth::class, 'mutate_create'])->name("mutate_admin_registrasi_create");
                Route::get('/new', [Auth::class, 'view_registrasi'])->name("view_admin_registrasi");
            });
            Route::get('/', [Auth::class, 'view_edit'])->name("view_admin_edit");
            Route::put('/{id}', [Auth::class, 'mutate_edit'])->name("mutate_admin_registrasi_edit");
        });

        Route::prefix('program')->group(function () {
            // view
            Route::get('/', [Program::class, 'view_index'])->name("view_admin_program");
            Route::get('/new', [Program::class, 'view_create'])->name("view_admin_program_new");
            Route::get('/{id}', [Program::class, 'view_edit'])->name("view_admin_program_edit");
            // Route::get('/detail/{slug}', [Program::class, 'ProgramDetail']);

            // mutation
            Route::post('/', [Program::class, 'mutate_create'])->name("mutate_admin_program_create");
            Route::delete('/{id}', [Program::class, 'mutate_delete'])->name("mutate_admin_program_delete");
            Route::put('/{id}', [Program::class, 'mutate_edit'])->name("mutate_admin_program_edit");
        });
        Route::redirect('/', '/administrator/instance');
        Route::middleware('checkRole')->group(function () {
            Route::prefix('instance')->group(function () {
                // view
                Route::get('/', [Instance::class, 'view_index'])->name("view_admin_instance");
                Route::get('/new', [Instance::class, 'view_create'])->name("view_admin_instance_new");
                Route::get('/{id}', [Instance::class, 'view_edit'])->name("view_admin_instance_edit");
                // Route::get('/detail/{slug}', [Instance::class, 'InstanceDetail']);

                // mutation
                Route::post('/', [Instance::class, 'mutate_create'])->name("mutate_admin_instance_create");
                Route::delete('/{id}', [Instance::class, 'mutate_delete'])->name("mutate_admin_instance_delete");
                Route::put('/{id}', [Instance::class, 'mutate_edit'])->name("mutate_admin_instance_edit");
            });

            Route::prefix('kategori')->group(function () {
                //mutate
                Route::post('/', [kategoriController::class, 'mutate_create'])->name("mutate_kategori_create");
                Route::delete('/{id}', [kategoriController::class, 'mutate_delete'])->name("mutate_admin_kategori_delete");
                Route::put('/{id}', [kategoriController::class, 'mutate_edit'])->name("mutate_admin_kategori_edit");

                //view
                Route::get('/new', [kategoriController::class, 'view_create'])->name("view_kategori_create");
                Route::get('/', [kategoriController::class, 'view_index'])->name("view_admin_kategori");
                Route::get('/{id}', [kategoriController::class, 'view_edit'])->name("view_admin_kategori_edit");
            });

            Route::prefix('banner')->group(function () {
                //mutate
                Route::post('/', [banner::class, 'mutate_create'])->name("mutate_banner_create");
                Route::delete('/{id}', [banner::class, 'mutate_delete'])->name("mutate_admin_banner_delete");
                Route::put('/{id}', [banner::class, 'mutate_edit'])->name("mutate_admin_banner_edit");

                //view
                Route::get('/new', [banner::class, 'view_create'])->name("view_banner_create");
                Route::get('/', [banner::class, 'view_index'])->name("view_admin_banner");
                Route::get('/{id}', [banner::class, 'view_edit'])->name("view_admin_banner_edit");
            });
        });


        Route::prefix('pos-location')->group(function () {
            //view
            Route::get('/new', [PosLocationController::class, 'view_create_location'])->name('view_create_location');

            Route::get('/', [PosLocationController::class, 'view_location'])->name('view_location');

            Route::get('/{id}', [PosLocationController::class, 'view_location_edit'])->name('view_location_edit');


            //mutate
            Route::post('/', [PosLocationController::class, 'mutate_create_location'])->name('mutate_create_location');

            Route::delete('/{id}', [PosLocationController::class, 'mutate_delete'])->name('mutate_delete_pos_location');

            Route::put(
                '/{id}',
                [PosLocationController::class, 'mutate_edit']
            )->name('mutate_edit_pos_location');
        });

        // ==========================================================================
        Route::post('/logout', [Auth::class, 'mutate_logout'])->name("mutate_admin_logout");
    });
});


Route::middleware('guest')->group(function () {
    Route::redirect('/', '/web');
    Route::prefix('administrator')->group(function () {
        Route::get('/login', [Auth::class, 'view_login'])->name('view_admin_login');
        Route::post('/login', [Auth::class, 'mutate_login'])->name("mutate_admin_login");
    });
});

Route::get("/mobile/info_dump", [Users::class, 'info_dump']);

Route::middleware('MobileAuth')->group(function () {
    Route::prefix('mobile')->group(function () {
        Route::get('/', [Mobile::class, 'view_landing'])->name("view_mobile_home");
        Route::get('/category/filter/{category}', [Mobile::class, 'view_landing_category'])->name("view_mobile_home_category");
        Route::get('/instansi/filter/{instansi}', [Mobile::class, 'view_landing_instansi'])->name("view_mobile_home_instansi");
        Route::get('/programs', [Mobile::class, 'view_landing_all'])->name("view_mobile_home_all");
        Route::get('/profile', [Mobile::class, 'view_profile'])->name("view_mobile_profile");
        Route::get('/enrollment', [Mobile::class, 'view_enrollment'])->name("view_mobile_enrollment");

        Route::post("/enroll", [Mobile::class, 'mutate_enroll'])->name("mutate_mobile_enroll");

        Route::get('/category', [Mobile::class, 'view_category_list'])->name("view_category_list");
        Route::get('/popular-program', [Mobile::class, 'view_program_populer'])->name("view_program_populer");

        // Route::get('/landing-page-search/{search}', [Users::class, 'landing_page_search']); //untuk seacrh
        // Route::get('/landing-page-get/{slug}', [Users::class, 'landing_page_get']);

        //untuk get users program user_program_personalization
        Route::get('/preferences', [Mobile::class, 'user_program_personalization'])->name("user_program_personalization");

        Route::prefix('program')->group(function () {
            Route::get('/{slug}', [Mobile::class, 'view_program_detail'])->name("view_mobile_program_detail");

            Route::get('/category/{category}', [Mobile::class, 'view_program_by_category'])->name("view_program_by_category");
        });

        Route::get('/instansi', [Mobile::class, 'view_instansi'])->name('view_instansi');
        Route::get('instansi/{name}', [Mobile::class, 'view_program_by_instansi'])->name('view_program_by_instansi');
    });
});
// INTEREST CHECK
Route::get('mobile/interest', [Mobile::class, 'view_interest'])->name("view_mobile_interest");
Route::post("mobile/interest", [Mobile::class, 'mutate_interest'])->name("mutate_mobile_interest");

//desktop user register
Route::prefix('web')->group(function () {
    Route::get('/', [DesktopController::class, 'view_home'])->name('view_desktop_home');
    Route::post('/', [DesktopController::class, 'mutate_register'])->name('mutate_register');
    Route::get('/instansi/{instansi}', [DesktopController::class, 'view_instansi'])->name('view_desktop_instansi');

    Route::get('/category/{category}', [DesktopController::class, 'view_category'])->name('view_desktop_category');
    Route::get('program/{slug}', [DesktopController::class, 'view_detail_course'])->name('view_desktop_detail_course');
});

Route::get('send-email-cron-job', [CommandController::class, 'runCronJob']);
