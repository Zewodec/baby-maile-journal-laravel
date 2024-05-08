<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZcidjuvanyaTrackerController extends Controller
{
    function zcidjuvanyaTrackerPage()
    {
        return view('trackers.nemovlya.zcidjuvanya');
    }
}
