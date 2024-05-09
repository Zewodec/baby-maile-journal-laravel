<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VagaTrackerController extends Controller
{
    function vagaVagitnistTrackerPage()
    {
        $user = auth()->user();
        $vaga_data = $user->vagitnistVagas()->orderBy('date', 'desc')->get();

        return view('trackers.vagitnist.vaga', ['vaga_data' => $vaga_data]);
    }
}
