<?php

use App\Http\Controllers\InstanceController as Instance;
use App\Http\Controllers\ProgramController as Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\UsersController as Users;
use App\Http\Controllers\UsersProfileController as UsersProfile;

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

Route::prefix('mobile')->group(function () {
    Route::post('/authenticate_token', [Users::class, "authenticate_token"])->name("api_authenticate_token");
    // Route::post('/enroll', [Users::class, "enroll"])->name("api_enroll_user");
});

Route::prefix('administrator')->group(function () {
    Route::middleware(["encrypt.cookies", "session"])->group(function () {
        Route::delete("/instance/{id}", [Instance::class, "delete"])->name("api_admin_instance_delete");
        Route::delete("/program/{id}", [Program::class, "delete"])->name("api_admin_program_delete");
    });
});
