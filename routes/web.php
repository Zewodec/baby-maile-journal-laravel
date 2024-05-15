<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChasGriTrackerController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\GoduvanyaTrackerController;
use App\Http\Controllers\HistoryTrackerController;
use App\Http\Controllers\PidguznikTrackerController;
use App\Http\Controllers\PoshtovhsTrackerController;
use App\Http\Controllers\ProgulyankaTrackerController;
use App\Http\Controllers\RozvytokDytynyController;
use App\Http\Controllers\SonTrackerController;
use App\Http\Controllers\TrackersController;
use App\Http\Controllers\VagaTrackerController;
use App\Http\Controllers\ZcidjuvanyaTrackerController;
use App\Http\Controllers\ZdorovyaTrackerController;
use App\Http\Controllers\ZrostanyaTrackerController;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//Auth::routes();


Route::get('/', function () {
    return view('pages.index');
})->name('index');

Route::prefix('/auth')->name('auth.')->controller(AuthController::class)->group(function () {
    Route::get('/', 'authPage');
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');

    Route::post('/change-password', 'changePassword')->name('change-password')->middleware('auth');
});

Route::prefix('/admin')->name('admin.')->controller(AdminController::class)->group(function () {
    Route::get('/login', 'adminLoginPage')->name('login');
    Route::post('/login', 'adminLogin')->name('login');

    Route::get('/', 'adminPage')->name('index')->middleware('auth:sanctum')->middleware('auth:admin');
});

Route::prefix('/family')->name('family.')->controller(FamilyController::class)->group(function () {
    Route::get('/', 'familyPage')->name('index')->middleware('auth');

    Route::get('/select-child/{id}', 'selectChild')->name('select_child')->middleware('auth');
    Route::delete('/delete-child/{id}', 'deleteChild')->name('delete_child')->middleware('auth');

    Route::post('/add-child', 'addChild')->name('add_child')->middleware('auth');
    //TODO: Save info about childrens and parents
    //TODO: Changing password
});

Route::prefix('/rozvytok-dytyny')->name('rozvytok-dytyny.')->controller(RozvytokDytynyController::class)->group(function () {
    Route::get('/', 'rozvytokDytynyPage')->name('index');

    Route::get('/vagitnist', 'vagitnistPage')->name('vagitnist');
    Route::get('/nemovlya', 'nemovlyaPage')->name('nemovlya');
})->middleware('auth');


Route::prefix('/trackers')->name('trackers.')->controller(TrackersController::class)->group(function () {
    Route::get('/', 'trackersPage')->name('index');


    Route::prefix('/vagitnist')->name('vagitnist.')->group(function () {
        Route::get('/', 'trackerMenuVagitnistPage')->name('index');

        Route::get('/vaga', [VagaTrackerController::class, 'vagaVagitnistTrackerPage'])->name('vaga');
        Route::post('/add-vaga', [VagaTrackerController::class, 'addVaga'])->name('add-vaga');
        Route::get('/delete-vaga/{vaga_id}', [VagaTrackerController::class, 'deleteVaga'])->name('delete-vaga');
        Route::get('/poshtovhs', [PoshtovhsTrackerController::class,'poshtovhsVagitnistTrackerPage'])->name('poshtovhs');
        Route::get('/poshtovhs/{session_id}/', [PoshtovhsTrackerController::class,'poshtovhsVagitnistDetailsTrackerPage'])->name('poshtovhs_details');
        Route::get('/poshtovhs/{session_id}/{poshtovhs_id}/delete', [PoshtovhsTrackerController::class,'poshtovhsVagitnistDetailsDeleteItemTrackerPage'])->name('poshtovhs_details_delete');
        Route::post('/add-poshtovhs', [PoshtovhsTrackerController::class,'addPoshtovhs'])->name('add_poshtovhs');
        Route::get('/delete-poshtovhs/{session_id}', [PoshtovhsTrackerController::class,'deletePoshtovhs'])->name('delete_poshtovhs');
    });

    Route::prefix('/nemovlya')->name('nemovlya.')->group(function () {
        Route::get('/', 'trackerMenuNemovlyaPage')->name('index');

        Route::get('/goduvanya', [GoduvanyaTrackerController::class,'goduvanyaTrackerPage'])->name('goduvanya');

        Route::get('/zcidjuvanya', [ZcidjuvanyaTrackerController::class,'zcidjuvanyaTrackerPage'])->name('zcidjuvanya');

        Route::get('/pidguznik', [PidguznikTrackerController::class,'pidguznikTrackerPage'])->name('pidguznik');

        Route::get('/son', [SonTrackerController::class,'sonTrackerPage'])->name('son');
        Route::post('/son/save', [SonTrackerController::class,'trackSon'])->name('son.save');

        Route::get('/chas-gri', [ChasGriTrackerController::class,'chasGriTrackerPage'])->name('chas-gri');

        Route::get('/zdorovya', [ZdorovyaTrackerController::class,'zdorovyaTrackerPage'])->name('zdorovya');

        Route::get('/zrostanya', [ZrostanyaTrackerController::class,'zrostanyaTrackerPage'])->name('zrostanya');

        Route::get('/progulyanka', [ProgulyankaTrackerController::class,'progulyankaTrackerPage'])->name('progulyanka')->middleware('auth');
        Route::post('/progulyanka/save', [ProgulyankaTrackerController::class,'traclProgulyanka'])->name('progulyanka.save')->middleware('auth');

        Route::get('/history', [HistoryTrackerController::class,'historyTrackerPage'])->name('history');

    });
});

//Route::prefix('/auth')->name('auth.')->controller(AuthController::class)->group(function () {
//    Route::post('/register', 'register')->name('register');
//    Route::post('/login', 'login')->name('login');
//    Route::get('/me', 'me')->name('me')->middleware('auth:sanctum');
//});
