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

        $children_age_string = Child::find($user->selected_children_id);

        if ($children_age_string !== null) {
            $children_age_string = $children_age_string->getBirthday();
        }

        return view('pages.rozvytok-dytyny', [
            'user' => $user,
            'children' => $user->children,
            'children_name'=> $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $children_age_string,
        ]);
    }

    public function vagitnistPage()
    {
        $user = auth()->user();

        $child_settings = Child::find($user->selected_children_id)->settings;
        $child_zachatya = Carbon::parse($child_settings->data_zachatya);
        $week_difference = round($child_zachatya->diffInWeeks(now()));
        $day_difference = round($child_zachatya->diffInDays(now()));
        $days_without_weeks = ($week_difference * 7) - $day_difference;

//        dd($user->selected_children_id, $child_settings,$child_settings->data_zachatya, $week_difference, $day_difference, $days_without_weeks);

        $current_week = $week_difference . ' тиждень ' . $days_without_weeks . ' дні';

        $children_age_string = Child::find($user->selected_children_id);

        if ($children_age_string !== null) {
            $children_age_string = $children_age_string->getBirthday();
        }

        return view('pages.rozvytok-dytyny.vagitnist', [
            'user' => $user,
            'children' => $user->children,
            'children_name'=> $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $children_age_string,
            'current_week' => $current_week,
        ]);
    }

    public function nemovlyaPage()
    {
        $user = auth()->user();

        $child_settings = Child::find($user->selected_children_id)->settings->first();
        $child_zachatya = Carbon::parse($child_settings->pology_date);
        $week_difference = round($child_zachatya->diffInWeeks(now()));
        $day_difference = round($child_zachatya->diffInDays(now()));
        $days_without_weeks = $day_difference - ($week_difference * 7);

        $current_week = $week_difference . ' тиждень ' . $days_without_weeks . ' дні';

        // if child is not born yet then set current week to null
        if ($week_difference < 0) {
            $current_week = null;
        }

        $children_age_string = Child::find($user->selected_children_id);

        if ($children_age_string !== null) {
            $children_age_string = $children_age_string->getBirthday();
        }

        return view('pages.rozvytok-dytyny.nemovlya', [
            'user' => $user,
            'children' => $user->children,
            'children_name'=> $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $children_age_string,
            'current_week' => $current_week,
        ]);
    }
}
