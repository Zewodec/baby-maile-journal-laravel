<?php

namespace App\Http\Controllers;

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

        if ($user->children->where('id', $user->selected_children_id) !== null) {
            $children_age_string = $user->children->where('id', $user->selected_children_id)->first()->pluck('birthday')->map(function ($item) {
                if ($item !== null) {
                    $month_diference = $item->diffInMonths(now());

                    $text_difference = round($month_diference). "m";
                    return $text_difference;
                }
            })->first() ?? null;
        } else{
            $children_age_string = '';
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


        return view('trackers.vagitnist.vagitnist', [
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
            'vaga' => $vaga,
            'nadbavka' => $nadbavka,
        ]);
    }

    function trackerMenuNemovlyaPage()
    {
        $user = auth()->user();
        return view('trackers.nemovlya.nemovlya', [
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
        ]);
    }
}
