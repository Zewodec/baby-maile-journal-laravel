<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ChasGriTrackerController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\GoduvanyaTrackerController;
use App\Http\Controllers\HistoryTrackerController;
use App\Http\Controllers\ImportantEventsController;
use App\Http\Controllers\PidguznikTrackerController;
use App\Http\Controllers\PoshtovhsTrackerController;
use App\Http\Controllers\ProgulyankaTrackerController;
use App\Http\Controllers\RozvytokDytynyController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SonTrackerController;
use App\Http\Controllers\SpeakingForumController;
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

Route::get('/login', function (){
    return redirect(\route('auth.'));
})->name('login');

Route::prefix('/admin')->name('admin.')->controller(AdminController::class)->group(function () {
    Route::get('/login', 'adminLoginPage')->name('login');
    Route::post('/login', 'adminLogin')->name('login');

    Route::get('/', 'adminPage')->name('index')->middleware(\App\Http\Middleware\AdminMiddleware::class);
    Route::get('/delete-user/{userId}', 'deleteUser')->name('user_remove')->middleware(\App\Http\Middleware\AdminMiddleware::class);
});

Route::prefix('/family')->name('family.')->controller(FamilyController::class)->group(function () {
    Route::get('/', 'familyPage')->name('index')->middleware('auth');

    Route::get('/select-child/{id}', 'selectChild')->name('select_child')->middleware('auth');
    Route::delete('/delete-child/{id}', 'deleteChild')->name('delete_child')->middleware('auth');

    Route::post('/add-child', 'addChild')->name('add_child')->middleware('auth');
    //TODO: Save info about childrens and parents

    Route::post('/save-parents', 'saveParents')->name('save_parents')->middleware('auth');

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
        Route::post('/goduvanya/save/grudy', [GoduvanyaTrackerController::class,'trackGoduvanyaGrudy'])->name('goduvanya.save.grudy');
        Route::post('/goduvanya/save/plashechka', [GoduvanyaTrackerController::class,'trackGoduvanyaPlashechka'])->name('goduvanya.save.plashechka');
        Route::post('/goduvanya/save/tverda', [GoduvanyaTrackerController::class,'trackGoduvanyaTverda'])->name('goduvanya.save.tverda');

        Route::get('/zcidjuvanya', [ZcidjuvanyaTrackerController::class,'zcidjuvanyaTrackerPage'])->name('zcidjuvanya');
        Route::post('/zcidjuvanya/save', [ZcidjuvanyaTrackerController::class,'trackZcidjuvanya'])->name('zcidjuvanya.save');

        Route::get('/pidguznik', [PidguznikTrackerController::class,'pidguznikTrackerPage'])->name('pidguznik');
        Route::post('/pidguznik/save', [PidguznikTrackerController::class,'trackPidguznik'])->name('pidguznik.save');

        Route::get('/son', [SonTrackerController::class,'sonTrackerPage'])->name('son');
        Route::post('/son/save', [SonTrackerController::class,'trackSon'])->name('son.save');

        Route::get('/chas-gri', [ChasGriTrackerController::class,'chasGriTrackerPage'])->name('chas-gri');
        Route::post('/chas-gri/save', [ChasGriTrackerController::class,'trackChasGri'])->name('chas-gri.save');

        Route::get('/zdorovya', [ZdorovyaTrackerController::class,'zdorovyaTrackerPage'])->name('zdorovya');
        Route::post('/zdorovya/save/temp', [ZdorovyaTrackerController::class,'trackTemp'])->name('zdorovya.save.temp');
        Route::post('/zdorovya/save/liky', [ZdorovyaTrackerController::class,'trackliky'])->name('zdorovya.save.liky');
        Route::post('/zdorovya/save/symptomes', [ZdorovyaTrackerController::class,'trackSymptomes'])->name('zdorovya.save.symptomes');


        Route::get('/zrostanya', [ZrostanyaTrackerController::class,'zrostanyaTrackerPage'])->name('zrostanya');
        Route::post('/zrostanya/save', [ZrostanyaTrackerController::class,'trackZrostanya'])->name('zrostanya.save');

        Route::get('/progulyanka', [ProgulyankaTrackerController::class,'progulyankaTrackerPage'])->name('progulyanka')->middleware('auth');
        Route::post('/progulyanka/save', [ProgulyankaTrackerController::class,'traclProgulyanka'])->name('progulyanka.save')->middleware('auth');

        Route::get('/history', [HistoryTrackerController::class,'historyTrackerPage'])->name('history');

    });
});

Route::prefix('/important_events')->name('important_events.')->controller(ImportantEventsController::class)->group(function () {
    Route::get('/', 'eventsPage')->name('index');

    Route::get('/add', 'addEventPage')->name('add');
    Route::post('/add', 'addEventRequest')->name('add');

    Route::get('/delete/{eventID}', 'deleteEvent')->name('delete')->middleware('auth');
})->middleware('auth');

Route::prefix('/calendar')->name('calendar.')->controller(CalendarController::class)->group(function () {
    Route::get('/', 'calendarPage')->name('index');

    Route::get('/remove-image/{image_id?}', 'removeImageFromEvent')->name('remove_image');
    Route::post('/add-event', 'addEvent')->name('add_event');
})->middleware('auth');

Route::get('/settings', [SettingsController::class, 'settingsPage'])->name('settings')->middleware('auth');
Route::post('/settings/save', [SettingsController::class, 'settingsSaveInfo'])->name('settings.save')->middleware('auth');

Route::get('/speaking-forum', [SpeakingForumController::class, 'speakingForumPage'])->name('speaking_forum');
//Route::prefix('/auth')->name('auth.')->controller(AuthController::class)->group(function () {
//    Route::post('/register', 'register')->name('register');
//    Route::post('/login', 'login')->name('login');
//    Route::get('/me', 'me')->name('me')->middleware('auth:sanctum');
//});
