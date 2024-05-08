<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoshtovhsTrackerController extends Controller
{
    function poshtovhsVagitnistTrackerPage()
    {
        return view('trackers.vagitnist.poshtovhs');
    }
}
