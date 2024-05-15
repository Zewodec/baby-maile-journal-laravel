<?php

namespace App\Http\Controllers;

use App\Models\LikyZdorovya;
use App\Models\SymptomesZdorovya;
use App\Models\TemperatureZdorovya;
use Illuminate\Http\Request;

class ZdorovyaTrackerController extends Controller
{
    function zdorovyaTrackerPage()
    {
        $user = auth()->user();

        return view('trackers.nemovlya.zdorovya', [
            'user' => $user,
            'children' => $user->children,
            'children_name' => $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $user->children->where('id', $user->selected_children_id)->first()->pluck('birthday')->map(function ($item) {
                    $month_diference = $item->diffInMonths(now());

                    $text_difference = round($month_diference) . "m";
                    return $text_difference;
                })->first() ?? null,
            'error' => null,
            'success' => null,
        ]);
    }

    function trackTemp(Request $request)
    {
        $date = $request->datetime ?? now();
        $temp = $request->temp;

        $user = auth()->user();

        $tempRecord = new TemperatureZdorovya([
            'user_id' => $user->id,
            'child_id' => $user->selected_children_id,
            'temp' => $temp,
            'date' => $date,
        ]);

        $tempRecord->save();

        return redirect()->back()->with('success', 'Дані записані!');
    }

    function trackliky(Request $request)
    {
        $datetime = $request->datetime ?? now();
        $liky_type = $request->liky_type ?? null;
        $name_doza_medicament = $request->name_doza_medicament ?? null;
        $name_doza_vacine = $request->name_doza_vacine ?? null;

        if ($liky_type == null){
            return redirect()->back()->with('error', 'Виберіть тип лікування!');
        }

        if ($liky_type == 'medicament'){
            if ($name_doza_medicament == null){
                return redirect()->back()->with('error', 'Заповніть поле!');
            }
        }

        if ($liky_type == 'vacine'){
            if ($name_doza_vacine == null){
                return redirect()->back()->with('error', 'Заповніть поле!');
            }
        }

        $liky = new LikyZdorovya([
            'user_id' => auth()->user()->id,
            'child_id' => auth()->user()->selected_children_id,
            'type' => $liky_type,
            'liky_vacine' => $liky_type == 'medicaments' ? $name_doza_medicament : $name_doza_vacine,
            'date' => $datetime,
        ]);

        $liky->save();

        return redirect()->back()->with('success', 'Дані записані!');
    }

    function trackSymptomes(Request $request)
    {
        $date = $request->datetime ?? now();
        $symptomes = $request->symptomes_stypin;

        if ($symptomes == null){
            return redirect()->back()->with('error', 'Заповніть поле!');
        }

        $user = auth()->user();

        $symptomesRecord = new SymptomesZdorovya([
            'user_id' => $user->id,
            'child_id' => $user->selected_children_id,
            'symptomes' => $symptomes,
            'date' => $date,
        ]);

        $symptomesRecord->save();

        return redirect()->back()->with('success', 'Дані записані!');
    }


}
