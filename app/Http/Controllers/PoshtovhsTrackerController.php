<?php

namespace App\Http\Controllers;

use App\Models\Poshtovhs;
use DateTime;
use Illuminate\Http\Request;

class PoshtovhsTrackerController extends Controller
{
    function poshtovhsVagitnistTrackerPage()
    {
        $user = auth()->user();

        if ($user->poshtovhs() === null || $user->poshtovhs()->where('child_id', $user->selected_children_id) === null) {
            $poshtovhs = array();
        } else {
            $poshtovhs = $user->poshtovhs()
                ->where('child_id', $user->selected_children_id)
                ->orderBy('date', 'desc')
                ->get()
                ->groupBy('session_id');
        }

        $poshtovhs = json_decode($poshtovhs, true);

        return view('trackers.vagitnist.poshtovhs', [
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
            'poshtovhs' => $poshtovhs,
        ]);
    }

    function addPoshtovhs(Request $request)
    {

        $user = auth()->user();
        $selected_child = $user['selected_children_id'];
        $today = now();
        $time = now();

        $poshtovhs = new Poshtovhs(
            [
                'user_id' => $user['id'],
                'child_id' => $selected_child,
                'date' => $today,
                'time' => $time,
                'session_id' => $request['session_id'],
            ]
        );

        $poshtovhs->save();
    }

    function deletePoshtovhs($poshtovh_id)
    {
        $user = auth()->user();
        $poshtovhs = Poshtovhs::all()->where('id', $poshtovh_id);
        foreach ($poshtovhs as $poshtovh) {
            $poshtovh->delete();
        }

        return redirect()->route('trackers.vagitnist.poshtovhs');
    }


    function poshtovhsVagitnistDetailsTrackerPage($session_id)
    {
        $user = auth()->user();

        if ($user->poshtovhs() === null || $user->poshtovhs()->where('session_id', $session_id) === null) {
            $poshtovhs = array();
        } else {
            $poshtovhs = $user->poshtovhs()
                ->where('session_id', $session_id)
                ->orderBy('date', 'desc')
                ->get()
                ->groupBy('session_id');
        }

        $poshtovhs = json_decode($poshtovhs, true);

        $poshtovhs_date = $poshtovhs[$session_id][0]['date'];

        $poshtovhs_duration = DateTime::createFromFormat('H:i:s', $poshtovhs[$session_id][count($poshtovhs[$session_id]) - 1]['time'])->diff(DateTime::createFromFormat('H:i:s', $poshtovhs[$session_id][0]['time']));
// route trackers.vagitnist.poshtovhs_details
        return view('trackers.vagitnist.poshtovhs-details', [
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
            'poshtovhs_date' => $poshtovhs_date,
            'poshtovhs_duration' => $poshtovhs_duration->format('%H:%I:%S'),
            'session_id' => $session_id,
            'poshtovhs' => $poshtovhs,
        ]);
    }

    function poshtovhsVagitnistDetailsDeleteItemTrackerPage($session_id, $poshtovhs_id)
    {
        $user = auth()->user();
        $poshtovhs = Poshtovhs::all()->where('id', $poshtovhs_id);
        foreach ($poshtovhs as $poshtovh) {
            $poshtovh->delete();
        }

        return redirect()->route('trackers.vagitnist.poshtovhs_details', ['session_id' => $session_id]);
    }
}
