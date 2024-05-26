<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Zrostanya;
use Illuminate\Http\Request;

class ZrostanyaTrackerController extends Controller
{
    function zrostanyaTrackerPage()
    {
        $user = auth()->user();

        $children_age_string = Child::find($user->selected_children_id);

        if ($children_age_string !== null) {
            $children_age_string = $children_age_string->getBirthday();
        }

        return view('trackers.nemovlya.zrostanya', [
            'user' => $user,
            'children' => $user->children,
            'children_name' => $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $children_age_string,
            'error' => null,
            'success' => null,
        ]);
    }

    function trackZrostanya(Request $request)
    {
        $zrostanya_dateime = $request->datetime ?? now();
        $zrostanya_length = $request->length ?? null;
        $zrostanya_weight = $request->weight ?? null;

        if ($zrostanya_length == null || $zrostanya_weight == null) {
            return redirect()->back()->with('error', 'Заповніть всі поля');
        }

        $user = auth()->user();

        $zrostanya = new Zrostanya([
            'datetime' => $zrostanya_dateime,
            'length' => $zrostanya_length,
            'weight' => $zrostanya_weight,
            'child_id' => $user->selected_children_id,
            'user_id' => $user->id,
        ]);

        $zrostanya->save();

        return redirect()->back()->with('success', 'Дані успішно збережені');
    }
}
