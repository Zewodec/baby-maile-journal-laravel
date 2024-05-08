<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryTrackerController extends Controller
{
    function historyTrackerPage()
    {
        return view('trackers.nemovlya.history');
    }
}
