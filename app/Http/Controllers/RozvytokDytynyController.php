<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RozvytokDytynyController extends Controller
{
    public function rozvytokDytynyPage()
    {
        $user = auth()->user();

        return view('pages.rozvytok-dytyny', [
            'user' => $user,
            'children' => $user->children,
            'children_name'=> $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
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

    public function vagitnistPage()
    {
        $user = auth()->user();

        $child_settings = Child::find($user->selected_children_id)->settings->first();
        $child_zachatya = Carbon::parse($child_settings->data_zachatya);
        $week_difference = round($child_zachatya->diffInWeeks(now()));
        $day_difference = round($child_zachatya->diffInDays(now()));
        $days_without_weeks = ($week_difference * 7) - $day_difference;

        $current_week = $week_difference . ' тиждень ' . $days_without_weeks . ' дні';

        return view('pages.rozvytok-dytyny.vagitnist', [
            'user' => $user,
            'children' => $user->children,
            'children_name'=> $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $user->children->where('id', $user->selected_children_id)->first()->pluck('birthday')->map(function ($item) {
                    if ($item !== null) {
                        $month_diference = $item->diffInMonths(now());

                        $text_difference = round($month_diference). "m";
                        return $text_difference;
                    }
                    return null;
                })->first() ?? null,
            'current_week' => $current_week,
        ]);
    }

    public function nemovlyaPage()
    {
        $user = auth()->user();

        return view('pages.rozvytok-dytyny.nemovlya', [
            'user' => $user,
            'children' => $user->children,
            'children_name'=> $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
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
