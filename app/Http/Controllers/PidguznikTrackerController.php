<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PidguznikTrackerController extends Controller
{
    function pidguznikTrackerPage()
    {
        return view('trackers.nemovlya.pidguznik');
    }
}
