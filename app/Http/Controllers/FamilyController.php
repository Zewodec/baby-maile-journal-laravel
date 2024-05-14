<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function familyPage()
    {
        $user = \auth()->user();

        if ($user->selected_children_id === null) {
            $child = new Child([
                'name'=>'test',
                'surname'=>'test',
                'sex'=>'male',
                'birthday'=>'2021-01-01',
                'vagitnist_date'=>'2024-01-01',
                'user_id'=>$user->id,
            ]);
            $child->save();
            $user->selected_children_id = $child->id;
        }

        return view('pages.family',
            [
                'user' => $user,
                'children' => $user->children,
                'children_name'=> $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
                'children_age_string' => $user->children->where('id', $user->selected_children_id)->first()->pluck('birthday')->map(function ($item) {
                    $month_diference = $item->diffInMonths(now());

                    $text_difference = round($month_diference). "m";
                    return $text_difference;
                })->first() ?? null,
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

    public function selectChild($id)
    {
        $user = \auth()->user();
        $user->selected_children_id = $id;
        $user->save();

        return redirect()->route('family.index');
    }

//    public function deleteChild($id)
//    {
//        $child = Child::find($id);
//        $child->delete();
//
//        return redirect()->route('family.index');
//    }
}

