<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackersController extends Controller
{
    function trackersPage()
    {
        return view('trackers');
    }

    function trackerMenuVagitnistPage()
    {
        return view('trackers.vagitnist.vagitnist');
    }

    function trackerMenuNemovlyaPage()
    {
        return view('trackers.nemovlya.nemovlya');
    }
}
