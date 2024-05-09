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
                'children_name'=> $user->children->pluck('name'),
                'children_age_string' => $user->children->pluck('birthday')->map(function ($item) {
                    $year_diference = $item->diffInYears(now());
                    $month_diference = $item->diffInMonths(now());

                    $text_difference = $year_diference . ' років та ' . $month_diference . ' місяців';
                    return $text_difference;
                }),
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
