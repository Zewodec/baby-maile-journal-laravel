<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function familyPage()
    {
        return view('pages.family');
    }
}
