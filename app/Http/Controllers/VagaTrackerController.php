<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\VagitnistVaga;
use Illuminate\Http\Request;

class VagaTrackerController extends Controller
{
    function vagaVagitnistTrackerPage()
    {
        $user = auth()->user();
        $vaga_data = $user->vagitnistVagas()->where('children_id', $user->selected_children_id)->orderBy('date', 'desc')->get();

        $children_age_string = Child::find($user->selected_children_id);

        if ($children_age_string !== null) {
            $children_age_string = $children_age_string->getBirthday();
        }

        return view('trackers.vagitnist.vaga', [
            'vaga_data' => $vaga_data,
            'user' => $user,
            'children' => $user->children,
            'children_name'=> $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $children_age_string,
            ]);
    }

    function addVaga(Request $request)
    {
        $user = auth()->user();

        $vaga = $request->vaga;
        $children_id = $user->selected_children_id;

        $vaga_data = new VagitnistVaga(
            [
                'user_id' => $user['id'],
                'children_id' => $children_id,
                'vaga' => $vaga,
                'date' => now(),
                'week' => round(now()->diffInDays($user->children->where('id', $children_id)->first()->vagitnist_date) / 7) + 1,
            ]
        );

        $vaga_data->save();

        return redirect()->route('trackers.vagitnist.vaga');
    }

    function deleteVaga($vaga_id)
    {
        $user = auth()->user();
        $vaga = VagitnistVaga::where('id', $vaga_id)->first();
        if ($vaga->user_id == $user->id) {
            $vaga->delete();
        }

        return redirect()->route('trackers.vagitnist.vaga');
    }
}
