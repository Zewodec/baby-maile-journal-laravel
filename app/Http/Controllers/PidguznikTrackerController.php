<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Pidguznik;
use Illuminate\Http\Request;

class PidguznikTrackerController extends Controller
{
    function pidguznikTrackerPage()
    {
        $user = auth()->user();

        $children_age_string = Child::find($user->selected_children_id);

        if ($children_age_string !== null) {
            $children_age_string = Child::find($user->selected_children_id)->getBirthday();
        }

        return view('trackers.nemovlya.pidguznik', [
            'user' => $user,
            'children' => $user->children,
            'children_name' => $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $children_age_string,
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
