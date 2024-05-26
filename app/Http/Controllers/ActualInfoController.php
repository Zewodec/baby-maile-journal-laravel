<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Http\Request;

class ActualInfoController extends Controller
{
    public function actualInfoPage()
    {

        $user = \auth()->user();

        $children_age_string = Child::find($user->selected_children_id);

        if ($children_age_string !== null) {
            $children_age_string = Child::find($user->selected_children_id)->getBirthday();
        }

        return view('pages.actual_information.ai_menu',[
            'user' => $user,
            'children' => $user->children,
            'children_name' => $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $children_age_string,
        ]);
    }
}
