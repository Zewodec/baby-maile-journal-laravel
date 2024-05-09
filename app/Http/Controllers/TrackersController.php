<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackersController extends Controller
{
    function trackersPage()
    {
        $user = auth()->user();
        return view('trackers', [
            'user' => $user,
            'children' => $user->children,
            'children_name'=> $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $user->children->where('id', $user->selected_children_id)->first()->pluck('birthday')->map(function ($item) {
                    $month_diference = $item->diffInMonths(now());

                    $text_difference = round($month_diference). "m";
                    return $text_difference;
                })->first() ?? null,
        ]);
    }

    function trackerMenuVagitnistPage()
    {
        $user = auth()->user();
        return view('trackers.vagitnist.vagitnist',[
            'user' => $user,
            'children' => $user->children,
            'children_name'=> $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $user->children->where('id', $user->selected_children_id)->first()->pluck('birthday')->map(function ($item) {
                    $month_diference = $item->diffInMonths(now());

                    $text_difference = round($month_diference). "m";
                    return $text_difference;
                })->first() ?? null,
            'vaga' => $user->vagitnistVagas()->where('children_id', $user->selected_children_id)->orderBy('date', 'desc')->get()->first()->vaga,
            'nadbavka' => $user->vagitnistVagas()->where('children_id', $user->selected_children_id)->orderBy('date', 'desc')->get()->first()->vaga - $user->vagitnistVagas()->where('children_id', $user->selected_children_id)->orderBy('date', 'desc')->get()[1]->vaga,
        ]);
    }

    function trackerMenuNemovlyaPage()
    {
        $user = auth()->user();
        return view('trackers.nemovlya.nemovlya', [
            'user' => $user,
            'children' => $user->children,
            'children_name'=> $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $user->children->where('id', $user->selected_children_id)->first()->pluck('birthday')->map(function ($item) {
                    $month_diference = $item->diffInMonths(now());

                    $text_difference = round($month_diference). "m";
                    return $text_difference;
                })->first() ?? null,
        ]);
    }
}
