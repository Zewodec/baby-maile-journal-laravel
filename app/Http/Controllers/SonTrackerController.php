<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Son;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SonTrackerController extends Controller
{
    function sonTrackerPage()
    {
        $user = auth()->user();

        $today = Carbon::today()->toDateString();

        $today_total_time = Son::where('user_id', $user->id)
            ->where('child_id', $user->selected_children_id)
            ->whereDate('date', $today);

        $today_minutes = 0;

        foreach ($today_total_time->get() as $record) {
            $today_minutes += $record->time->hour * 60 + $record->time->minute;
        }


        $children_age_string = Child::find($user->selected_children_id);

        if ($children_age_string !== null) {
            $children_age_string = $children_age_string->getBirthday();
        }

        return view('trackers.nemovlya.son', [
            'user' => $user,
            'children' => $user->children,
            'children_name' => $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $children_age_string,
            'today_minutes' => $today_minutes,
        ]);
    }

    function trackSon(Request $request)
    {
        $son_time = $request->son_time;
        $son_date = $request->son_date;

        $son_time = Carbon::createFromTimestamp($son_time);

        $user = auth()->user();

        $son = new Son([
            'time' => $son_time->format('H:i:s') ?? 0,
            'date' => $son_date ?? now(),
            'user_id' => $user->id,
            'child_id' => $user->selected_children_id,
        ]);

        $son->save();

        return redirect()->route('trackers.nemovlya.son');
    }
}
