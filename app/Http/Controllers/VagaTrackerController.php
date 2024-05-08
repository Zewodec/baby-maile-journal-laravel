<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VagaTrackerController extends Controller
{
    function vagaVagitnistTrackerPage()
    {
        return view('trackers.vagitnist.vaga');
    }
}
