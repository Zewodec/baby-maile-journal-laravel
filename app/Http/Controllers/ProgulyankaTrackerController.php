<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgulyankaTrackerController extends Controller
{
    function progulyankaTrackerPage()
    {
        return view('trackers.nemovlya.progulyanka');
    }
}
