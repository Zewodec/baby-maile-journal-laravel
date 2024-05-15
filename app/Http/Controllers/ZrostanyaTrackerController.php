<?php

namespace App\Http\Controllers;

use App\Models\Zrostanya;
use Illuminate\Http\Request;

class ZrostanyaTrackerController extends Controller
{
    function zrostanyaTrackerPage()
    {
        $user = auth()->user();

        return view('trackers.nemovlya.zrostanya', [
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
