<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\PoshtovhsTrackerController;
use App\Http\Controllers\RozvytokDytynyController;
use App\Http\Controllers\VagaTrackerController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('pages.index');
})->name('index');

Route::prefix('/auth')->name('auth.')->controller(AuthController::class)->group(function () {
    Route::get('/', 'authPage');
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
});

Route::prefix('/admin')->name('admin.')->controller(AdminController::class)->group(function () {
    Route::get('/login', 'adminLoginPage')->name('login');
    Route::post('/login', 'adminLogin')->name('login');

    Route::get('/', 'adminPage')->name('index')->middleware('auth:sanctum')->middleware('auth:admin');
});

Route::prefix('/family')->name('family.')->controller(FamilyController::class)->group(function () {
    Route::get('/', 'familyPage')->name('index');

    //TODO: Save info about childrens and parents
    //TODO: Changing password
});

Route::prefix('/rozvytok-dytyny')->name('rozvytok-dytyny.')->controller(RozvytokDytynyController::class)->group(function () {
    Route::get('/', 'rozvytokDytynyPage')->name('index');

    Route::get('/vagitnist', 'vagitnistPage')->name('vagitnist');
    Route::get('/nemovlya', 'nemovlyaPage')->name('nemovlya');
});


Route::prefix('/trackers')->name('trackers.')->controller(\App\Http\Controllers\TrackersController::class)->group(function () {
    Route::get('/', 'trackersPage')->name('index');


    Route::prefix('/vagitnist')->name('vagitnist.')->group(function () {
        Route::get('/', 'trackerMenuVagitnistPage')->name('index');

        Route::get('/vaga', [VagaTrackerController::class, 'vagaVagitnistTrackerPage'])->name('vaga');
        Route::get('/poshtovhs', [PoshtovhsTrackerController::class,'poshtovhsVagitnistTrackerPage'])->name('poshtovhs');
    });

    Route::prefix('/nemovlya')->name('nemovlya.')->group(function () {
        Route::get('/', 'trackerMenuNemovlyaPage')->name('index');
    });
});

//Route::prefix('/auth')->name('auth.')->controller(AuthController::class)->group(function () {
//    Route::post('/register', 'register')->name('register');
//    Route::post('/login', 'login')->name('login');
//    Route::get('/me', 'me')->name('me')->middleware('auth:sanctum');
//});
