<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\GoduvanyaGrudy;
use App\Models\GoduvanyaPlashechka;
use App\Models\GoduvanyaTverda;
use Illuminate\Http\Request;

class GoduvanyaTrackerController extends Controller
{
    function goduvanyaTrackerPage()
    {
        $user = auth()->user();

        $children_age_string = Child::find($user->selected_children_id);

        if ($children_age_string !== null) {
            $children_age_string = Child::find($user->selected_children_id)->getBirthday();
        }

        return view('trackers.nemovlya.goduvanya', [
            'user' => $user,
            'children' => $user->children,
            'children_name' => $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $children_age_string,
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
//        dd($request->all());

        $datetime = $request->datetime ?? now();
        $group1 = $request->group1 ?? null;
        $group2 = $request->group2 ?? null;
        $group3 = $request->group3 ?? null;
        $tverda_time = $request->tverda_time ?? 0;
        $goduvanya_type = $request->goduvanya_type ?? "tverda";

        if ($tverda_time == 0) {
            return redirect()->back()->with('error', 'Ви не зафіксували час годування');
        }

        if ($group1 == null || $group2 == null || $group3 == null) {
            return redirect()->back()->with('error', 'Ви не вибрали тип їжі');
        }

        $user = auth()->user();

        $god_tverda = new GoduvanyaTverda([
            'datetime' => $datetime,
            'group1' => $group1,
            'group2' => $group2,
            'group3' => $group3,
            'tverda_time' => $tverda_time,
            'goduvanya_type' => $goduvanya_type,
            'user_id' => $user->id,
            'child_id' => $user->selected_children_id,
        ]);

        $god_tverda->save();

        return redirect()->back()->with('success', 'Дані успішно збережені');

    }

}
