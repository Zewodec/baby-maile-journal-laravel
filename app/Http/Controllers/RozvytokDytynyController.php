<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RozvytokDytynyController extends Controller
{
    public function rozvytokDytynyPage()
    {
        return view('pages.rozvytok-dytyny');
    }

    public function vagitnistPage()
    {
        return view('pages.rozvytok-dytyny.vagitnist');
    }

    public function nemovlyaPage()
    {
        return view('pages.rozvytok-dytyny.nemovlya');
    }
}
