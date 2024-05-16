<?php

namespace App\Http\Controllers;

use App\Models\GoduvanyaGrudy;
use App\Models\GoduvanyaPlashechka;
use Illuminate\Http\Request;

class GoduvanyaTrackerController extends Controller
{
    function goduvanyaTrackerPage()
    {
        $user = auth()->user();

        return view('trackers.nemovlya.goduvanya', [
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

    function trackGoduvanyaGrudy(Request $request)
    {
        $datatime = $request->datetime ?? now();
        $left_time = $request->left_time ?? 0;
        $right_time = $request->right_time ?? 0;
        $goduvanya_type = $request->goduvanya_type;

        if ($left_time == 0 && $right_time == 0) {
            return redirect()->back()->with('error', 'Ви не зафіксували час годування');
        }

        $user = auth()->user();

        $goduvanya_grudy = new GoduvanyaGrudy([
            'datetime' => $datatime,
            'left_time' => $left_time,
            'right_time' => $right_time,
            'goduvanya_type' => $goduvanya_type,
            'user_id' => $user->id,
            'child_id' => $user->selected_children_id,
        ]);

        $goduvanya_grudy->save();

        return redirect()->back()->with('success', 'Дані успішно збережені');
    }

    function trackGoduvanyaPlashechka(Request $request)
    {
//        dd($request->all());

        $datetime = $request->datetime ?? now();
        $plashechka_type = $request->plashechka_type ?? null;
        $plashechka_amount = $request->plashechka_amount ?? 0;
        $plashechka_time = $request->plashechka_time ?? 0;
        $goduvanya_type = $request->goduvanya_type ?? "plashechka";

        if ($plashechka_time == 0) {
            return redirect()->back()->with('error', 'Ви не зафіксували час годування');
        }

        if ($plashechka_type == null) {
            return redirect()->back()->with('error', 'Ви не вибрали тип пляшечки');
        }

        $user = auth()->user();

        $god_plash = new GoduvanyaPlashechka([
            'datetime' => $datetime,
            'plashechka_type' => $plashechka_type,
            'plashechka_amount' => $plashechka_amount,
            'plashechka_time' => $plashechka_time,
            'goduvanya_type' => $goduvanya_type,
            'user_id' => $user->id,
            'child_id' => $user->selected_children_id,
        ]);

        $god_plash->save();

        return redirect()->back()->with('success', 'Дані успішно збережені');
    }

    function trackGoduvanyaTverda(Request $request)
    {
        dd($request->all());
    }

}
