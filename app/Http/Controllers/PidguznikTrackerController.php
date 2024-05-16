<?php

namespace App\Http\Controllers;

use App\Models\Pidguznik;
use Illuminate\Http\Request;

class PidguznikTrackerController extends Controller
{
    function pidguznikTrackerPage()
    {
        $user = auth()->user();

        return view('trackers.nemovlya.pidguznik', [
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

    function trackPidguznik(Request $request)
    {
//        dd(request()->all());

        $type = $request->type ?? "dry";
        $vologist = $request->vologist ?? null;
        $kaka_color = $request->kaka_color ?? null;
        $datetime = $request->datetime ?? now();

        $user = auth()->user();

        $pigduznik = new Pidguznik(
            [
                'user_id' => $user->id,
                'child_id' => $user->selected_children_id,
                'datetime' => $datetime,
                'type' => $type,
                'vologist' => $vologist,
                'kaka_color' => $kaka_color
            ]
        );

        $pigduznik->save();

        return redirect()->back()->with('success', 'Дані успішно збережені!');
    }
}
