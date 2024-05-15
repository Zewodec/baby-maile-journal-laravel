<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgulyankaTrackerController extends Controller
{
    function progulyankaTrackerPage()
    {
        $user = auth()->user();

        return view('trackers.nemovlya.progulyanka', [
            'user' => $user,
            'children' => $user->children,
            'children_name' => $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $user->children->where('id', $user->selected_children_id)->first()->pluck('birthday')->map(function ($item) {
                    $month_diference = $item->diffInMonths(now());

                    $text_difference = round($month_diference) . "m";
                    return $text_difference;
                })->first() ?? null,
        ]);
    }
}
