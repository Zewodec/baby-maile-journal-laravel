    <?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
})->name('index');

Route::get('/auth', function () {
    return view('pages.auth');
})->name('auth');
