<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class TrackersController extends Controller
{
    function trackersPage()
    {
        $user = auth()->user();

        if ($user->selected_children_id === null) {
            $user->selected_children_id = $user->children->first()->id;
            $user->save();
        }

        $children_age_string = Child::find($user->selected_children_id);

        if ($children_age_string !== null) {
            $children_age_string = $children_age_string->getBirthday();
        }

        return view('trackers', [
            'user' => $user,
            'children' => $user->children,
            'children_name' => $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $children_age_string,
        ]);
    }

    function trackerMenuVagitnistPage()
    {
        $user = auth()->user();


        if ($user->vagitnistVagas()->where('children_id', $user->selected_children_id) === null) {
            $vaga = 0;
        } else {
            $vaga = $user->vagitnistVagas()->where('children_id', $user->selected_children_id)->orderBy('date', 'desc')->get()->first()->vaga ?? 0;
        }

        if ($user->vagitnistVagas()->where('children_id', $user->selected_children_id)->first() === null || $user->vagitnistVagas()->where('children_id', $user->selected_children_id) === null) {
            $nadbavka = 0;
        } else {
            $nadbavka = $user->vagitnistVagas()->where('children_id', $user->selected_children_id)->orderBy('date', 'desc')->get()->first()->vaga - $user->vagitnistVagas()->where('children_id', $user->selected_children_id)->orderBy('date', 'desc')->get()[1]->vaga;
            }

        $children_age_string = Child::find($user->selected_children_id);

        if ($children_age_string !== null) {
            $children_age_string = $children_age_string->getBirthday();
        }

        return view('trackers.vagitnist.vagitnist', [
            'user' => $user,
            'children' => $user->children,
            'children_name' => $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $children_age_string,
            'vaga' => $vaga,
            'nadbavka' => $nadbavka,
        ]);
    }

    function trackerMenuNemovlyaPage()
    {
        $user = auth()->user();

        $children_age_string = Child::find($user->selected_children_id);

        if ($children_age_string !== null) {
            $children_age_string = $children_age_string->getBirthday();
        }


        return view('trackers.nemovlya.nemovlya', [
            'user' => $user,
            'children' => $user->children,
            'children_name' => $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $children_age_string,
        ]);
    }
}
