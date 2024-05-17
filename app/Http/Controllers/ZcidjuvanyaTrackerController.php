<?php

namespace App\Http\Controllers;

use App\Models\Zcidjuvanya;
use Illuminate\Http\Request;

class ZcidjuvanyaTrackerController extends Controller
{
    function zcidjuvanyaTrackerPage()
    {

        $user = auth()->user();

        return view('trackers.nemovlya.zcidjuvanya', [
            'user' => $user,
            'children' => $user->children,
            'children_name' => $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $user->children->where('id', $user->selected_children_id)->first()->pluck('birthday')->map(function ($item) {
                    if ($item !== null) {
                        $month_diference = $item->diffInMonths(now());

                        $text_difference = round($month_diference). "m";
                        return $text_difference;
                    }
                    return null;
                })->first() ?? null,
        ]);
    }

    function trackZcidjuvanya(Request $request)
    {
        $user = auth()->user();
        $date = $request->date ?? now();
        $child_id = $user->selected_children_id;
        $left_amount = $request->left_amount;
        $right_amount = $request->right_amount;
        $left_time = $request->left_time;
        $right_time = $request->right_time;


        $zcodjuvanya = new Zcidjuvanya([
            'date' => $date,
            'left_amount' => $left_amount,
            'right_amount' => $right_amount,
            'left_time' => $left_time,
            'right_time' => $right_time,
            'child_id' => $child_id,
            'user_id' => $user->id,
        ]);

        $zcodjuvanya->save();

        return redirect()->route('trackers.nemovlya.zcidjuvanya');
    }
}
