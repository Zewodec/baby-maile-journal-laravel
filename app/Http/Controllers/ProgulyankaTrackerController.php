<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Progulyanka;
use App\Models\Son;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProgulyankaTrackerController extends Controller
{
    function progulyankaTrackerPage()
    {
        $user = auth()->user();

        $today = Carbon::today()->toDateString();

        $today_total_time = Progulyanka::where('user_id', $user->id)
            ->where('child_id', $user->selected_children_id)
            ->whereDate('date', $today);

        $today_minutes = 0;

        foreach ($today_total_time->get() as $record) {
            $today_minutes += $record->time->hour * 60 + $record->time->minute;
        }

        $children_age_string = Child::find($user->selected_children_id);

        if ($children_age_string !== null) {
            $children_age_string = Child::find($user->selected_children_id)->getBirthday();
        }

        return view('trackers.nemovlya.progulyanka', [
            'user' => $user,
            'children' => $user->children,
            'children_name' => $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $children_age_string,
            'today_minutes' => $today_minutes,
        ]);
    }

    function traclProgulyanka(Request $request)
    {
        $progulyanka_time = $request->progulyanka_time;
        $progulyanka_date = $request->progulyanka_date;

        $progulyanka_time = Carbon::createFromTimestamp($progulyanka_time);

        $user = auth()->user();

        $progulyanka = new Progulyanka([
            'time' => $progulyanka_time->format('H:i:s') ?? 0,
            'date' => $progulyanka_date ?? now(),
            'user_id' => $user->id,
            'child_id' => $user->selected_children_id,
        ]);

        $progulyanka->save();

        return redirect()->route('trackers.nemovlya.progulyanka');
    }
}
