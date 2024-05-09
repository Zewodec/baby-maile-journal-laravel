<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function familyPage()
    {
        $user = \auth()->user();

        return view('pages.family',
            [
                'user' => $user,
                'children' => $user->children,
            ]);
    }

    public function addChild(Request $request)
    {
        $child = new Child();
        $child->name = $request->child_name;
        $child->surname = $request->child_surname;
        $child->sex = $request->sex;
        $child->birthday = $request->birthday;
        $child->vagitnist_date = $request->vagitnist_date;
        $child->user_id = \auth()->id();
        $child->save();

        return redirect()->route('family.index');

    }
}
