<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SonTrackerController extends Controller
{
    function sonTrackerPage()
    {
        return view('trackers.nemovlya.son');
    }
}
