<?php

namespace App\Http\Controllers;

use App\Models\ChasGri;
use Illuminate\Http\Request;

class ChasGriTrackerController extends Controller
{
    function chasGriTrackerPage()
    {
        $user = auth()->user();

        return view('trackers.nemovlya.chasgri', [
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

    function trackChasGri(Request $request)
    {
        $date = $request->datetime ?? now();
        $activity = $request['child-activity-radio-group'];
        $tracked_time = $request->tracked_time ?? "00:00:00";

        if ($activity == null){
            return redirect()->back()->with('error', 'Виберіть активність');
        }

        $user = auth()->user();

        $chasGri = new ChasGri([
            'datetime' => $date,
            'activity' => $activity,
            'tracked_time' => $tracked_time,
            'user_id' => $user->id,
            'child_id' => $user->selected_children_id,
        ]);

        $chasGri->save();

        return redirect()->back()->with('success', 'Дані успішно збережені');
    }
}
