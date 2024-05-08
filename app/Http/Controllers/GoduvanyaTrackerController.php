<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoduvanyaTrackerController extends Controller
{
    function goduvanyaTrackerPage()
    {
        return view('trackers.nemovlya.goduvanya');
    }
}
