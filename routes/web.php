<?php

use App\Http\Controllers\ActualInfoController;
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
    Route::get('/delete-child/{child_id}', 'deleteChild')->name('delete_child')->middleware('auth');

    Route::post('/save-parents', 'saveParents')->name('save_parents')->middleware('auth');
    Route::post('/save-child', 'saveChildInfo')->name('save_child')->middleware('auth');
});

Route::prefix('/rozvytok-dytyny')->name('rozvytok-dytyny.')->controller(RozvytokDytynyController::class)->group(function () {
    Route::get('/', 'rozvytokDytynyPage')->name('index')->middleware('auth');

    Route::get('/vagitnist', 'vagitnistPage')->name('vagitnist')->middleware('auth');
    Route::get('/nemovlya', 'nemovlyaPage')->name('nemovlya')->middleware('auth');
})->middleware('auth');


Route::prefix('/trackers')->name('trackers.')->controller(TrackersController::class)->group(function () {
    Route::get('/', 'trackersPage')->name('index')->middleware('auth');


    Route::prefix('/vagitnist')->name('vagitnist.')->group(function () {
        Route::get('/', 'trackerMenuVagitnistPage')->name('index')->middleware('auth');

        Route::get('/vaga', [VagaTrackerController::class, 'vagaVagitnistTrackerPage'])->name('vaga')->middleware('auth');
        Route::post('/add-vaga', [VagaTrackerController::class, 'addVaga'])->name('add-vaga')->middleware('auth');
        Route::get('/delete-vaga/{vaga_id}', [VagaTrackerController::class, 'deleteVaga'])->name('delete-vaga')->middleware('auth');
        Route::get('/poshtovhs', [PoshtovhsTrackerController::class,'poshtovhsVagitnistTrackerPage'])->name('poshtovhs')->middleware('auth');
        Route::get('/poshtovhs/{session_id}/', [PoshtovhsTrackerController::class,'poshtovhsVagitnistDetailsTrackerPage'])->name('poshtovhs_details')->middleware('auth');
        Route::get('/poshtovhs/{session_id}/{poshtovhs_id}/delete', [PoshtovhsTrackerController::class,'poshtovhsVagitnistDetailsDeleteItemTrackerPage'])->name('poshtovhs_details_delete')->middleware('auth');
        Route::post('/add-poshtovhs', [PoshtovhsTrackerController::class,'addPoshtovhs'])->name('add_poshtovhs')->middleware('auth');
        Route::get('/delete-poshtovhs/{session_id}', [PoshtovhsTrackerController::class,'deletePoshtovhs'])->name('delete_poshtovhs')->middleware('auth');
    });

    Route::prefix('/nemovlya')->name('nemovlya.')->group(function () {
        Route::get('/', 'trackerMenuNemovlyaPage')->name('index')->middleware('auth');

        Route::get('/goduvanya', [GoduvanyaTrackerController::class,'goduvanyaTrackerPage'])->name('goduvanya')->middleware('auth');
        Route::post('/goduvanya/save/grudy', [GoduvanyaTrackerController::class,'trackGoduvanyaGrudy'])->name('goduvanya.save.grudy')->middleware('auth');
        Route::post('/goduvanya/save/plashechka', [GoduvanyaTrackerController::class,'trackGoduvanyaPlashechka'])->name('goduvanya.save.plashechka')->middleware('auth');
        Route::post('/goduvanya/save/tverda', [GoduvanyaTrackerController::class,'trackGoduvanyaTverda'])->name('goduvanya.save.tverda')->middleware('auth');

        Route::get('/zcidjuvanya', [ZcidjuvanyaTrackerController::class,'zcidjuvanyaTrackerPage'])->name('zcidjuvanya')->middleware('auth');
        Route::post('/zcidjuvanya/save', [ZcidjuvanyaTrackerController::class,'trackZcidjuvanya'])->name('zcidjuvanya.save')->middleware('auth');

        Route::get('/pidguznik', [PidguznikTrackerController::class,'pidguznikTrackerPage'])->name('pidguznik')->middleware('auth');
        Route::post('/pidguznik/save', [PidguznikTrackerController::class,'trackPidguznik'])->name('pidguznik.save')->middleware('auth');

        Route::get('/son', [SonTrackerController::class,'sonTrackerPage'])->name('son')->middleware('auth');
        Route::post('/son/save', [SonTrackerController::class,'trackSon'])->name('son.save')->middleware('auth');

        Route::get('/chas-gri', [ChasGriTrackerController::class,'chasGriTrackerPage'])->name('chas-gri')->middleware('auth');
        Route::post('/chas-gri/save', [ChasGriTrackerController::class,'trackChasGri'])->name('chas-gri.save')->middleware('auth');

        Route::get('/zdorovya', [ZdorovyaTrackerController::class,'zdorovyaTrackerPage'])->name('zdorovya')->middleware('auth');
        Route::post('/zdorovya/save/temp', [ZdorovyaTrackerController::class,'trackTemp'])->name('zdorovya.save.temp')->middleware('auth');
        Route::post('/zdorovya/save/liky', [ZdorovyaTrackerController::class,'trackliky'])->name('zdorovya.save.liky')->middleware('auth');
        Route::post('/zdorovya/save/symptomes', [ZdorovyaTrackerController::class,'trackSymptomes'])->name('zdorovya.save.symptomes')->middleware('auth');


        Route::get('/zrostanya', [ZrostanyaTrackerController::class,'zrostanyaTrackerPage'])->name('zrostanya')->middleware('auth');
        Route::post('/zrostanya/save', [ZrostanyaTrackerController::class,'trackZrostanya'])->name('zrostanya.save')->middleware('auth');

        Route::get('/progulyanka', [ProgulyankaTrackerController::class,'progulyankaTrackerPage'])->name('progulyanka')->middleware('auth');
        Route::post('/progulyanka/save', [ProgulyankaTrackerController::class,'traclProgulyanka'])->name('progulyanka.save')->middleware('auth');

        Route::prefix('/history')->name('history')->group(function () {
            Route::get('/', [HistoryTrackerController::class,'historyTrackerPage'])->name('')->middleware('auth');
            Route::get('/goduvanya', [HistoryTrackerController::class,'historyGoduvanyaTrackerPage'])->name('.goduvanya')->middleware('auth');
            Route::get('/zcidjuvanya', [HistoryTrackerController::class,'historyZcidjuvanyaTrackerPage'])->name('.zcidjuvanya')->middleware('auth');
            Route::get('/pidguznik', [HistoryTrackerController::class,'historyPidguznikTrackerPage'])->name('.pidguznik')->middleware('auth');
            Route::get('/son', [HistoryTrackerController::class,'historySonTrackerPage'])->name('.son')->middleware('auth');
            Route::get('/chasGri', [HistoryTrackerController::class,'historyChasGriTrackerPage'])->name('.chasGri')->middleware('auth');
            Route::get('/zdorovya', [HistoryTrackerController::class,'historyZdorovyaTrackerPage'])->name('.zdorovya')->middleware('auth');
            Route::get('/zrostanya', [HistoryTrackerController::class,'historyZrostanyaTrackerPage'])->name('.zrostanya')->middleware('auth');
            Route::get('/progulyanka', [HistoryTrackerController::class,'historyProgulyankaTrackerPage'])->name('.progulyanka')->middleware('auth');
        });

    });
});

Route::prefix('/actual_information')->name('actual_info.')->controller(ActualInfoController::class)->group(function () {
    Route::get('/', 'actualInfoPage')->name('index')->middleware('auth');

    Route::get('/check-list', 'checkListPage')->name('check_list')->middleware('auth');
    Route::get('/vpravy', 'vpravyPage')->name('vpravy')->middleware('auth');
    Route::get('/poshtovhs', 'poshtovhsPage')->name('poshtovhs')->middleware('auth');
    Route::get('/goduvanya', 'goduvanyaPage')->name('goduvanya')->middleware('auth');
    Route::get('/fiz-psych-rozv-dytyny', 'fizPsychRozvDytynyPage')->name('fiz_psych_rozv_dytyny')->middleware('auth');
    Route::get('/doglyad', 'doglyadPage')->name('doglyad')->middleware('auth');
    Route::get('/vpravy-dity', 'vpravyDityPage')->name('vpravy_dity')->middleware('auth');
    Route::get('/odyag', 'odyagPage')->name('odyag')->middleware('auth');

});

Route::prefix('/important_events')->name('important_events.')->controller(ImportantEventsController::class)->group(function () {
    Route::get('/', 'eventsPage')->name('index')->middleware('auth');

    Route::get('/add', 'addEventPage')->name('add')->middleware('auth');
    Route::post('/add', 'addEventRequest')->name('add')->middleware('auth');

    Route::get('/delete/{eventID}', 'deleteEvent')->name('delete')->middleware('auth');
});

Route::prefix('/calendar')->name('calendar.')->controller(CalendarController::class)->group(function () {
    Route::get('/', 'calendarPage')->name('index')->middleware('auth');

    Route::get('/remove-image/{image_id?}', 'removeImageFromEvent')->name('remove_image')->middleware('auth');
    Route::post('/add-event', 'addEvent')->name('add_event')->middleware('auth');
});

Route::get('/settings', [SettingsController::class, 'settingsPage'])->name('settings')->middleware('auth');
Route::post('/settings/save', [SettingsController::class, 'settingsSaveInfo'])->name('settings.save')->middleware('auth');
Route::get('/settings/deleteMe', [SettingsController::class, 'deleteMe'])->name('settings.deleteMe')->middleware('auth');

Route::get('/speaking-forum', [SpeakingForumController::class, 'speakingForumPage'])->name('speaking_forum')->middleware('auth');

