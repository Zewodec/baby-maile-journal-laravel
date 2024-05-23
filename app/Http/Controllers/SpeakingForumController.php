<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Http\Request;

class SpeakingForumController extends Controller
{
    function speakingForumPage()
    {
        $user = auth()->user();

        $username = $user->username;

        $children_age_string = Child::find($user->selected_children_id);

        if ($children_age_string !== null) {
            $children_age_string = $children_age_string->getBirthday();
        }

        return view('pages.speaking_forum', [
            'user' => $user,
            'children' => $user->children,
            'children_name' => $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $children_age_string,
            'username' => $username,
            ]);
    }
}
