<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZrostanyaTrackerController extends Controller
{
    function zrostanyaTrackerPage()
    {
        return view('trackers.nemovlya.zrostanya');
    }
}
