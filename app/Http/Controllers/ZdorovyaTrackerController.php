<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZdorovyaTrackerController extends Controller
{
    function zdorovyaTrackerPage()
    {
        return view('trackers.nemovlya.zdorovya');
    }
}
