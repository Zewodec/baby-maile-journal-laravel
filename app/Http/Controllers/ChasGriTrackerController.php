<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChasGriTrackerController extends Controller
{
    function chasGriTrackerPage()
    {
        return view('trackers.nemovlya.chasgri');
    }
}
