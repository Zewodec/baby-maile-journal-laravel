<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    function settingsPage()
    {
        $user = auth()->user();

        $settings = $user->settings->where('child_id', $user->selected_children_id)->first();

        $children_age_string = $user->children->where('id', $user->selected_children_id)->first();

        if ($children_age_string !== null) {
            $children_age_string = $children_age_string->pluck('birthday')->map(function ($item) {
                if ($item !== null) {
                    $month_diference = $item->diffInMonths(now());

                    $text_difference = round($month_diference) . "m";
                    return $text_difference;
                }
                return null;
            })->first();
        }

        return view('pages.settings', [
            'user' => $user,
            'children' => $user->children,
            'children_name' => $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $children_age_string,
            'settings' => $settings]);
    }

    function settingsSaveInfo(Request $request)
    {
        $start_last_menstruation = $request->start_last_menstruation;
        $pology_date = $request->pology_date;
        $alusherskiy_termin = $request->alusherskiy_termin;
        $data_zachatya = $request->data_zachatya;

        $user = auth()->user();

        $settings = $user->settings->where('child_id', $user->selected_children_id)->first();

        if ($settings === null) {
            $settings = new Settings();
            $settings->user_id = $user->id;
            $settings->child_id = $user->selected_children_id;
        }

        $settings->start_last_menstruation = $start_last_menstruation;
        $settings->pology_date = $pology_date;
        $settings->alusherskiy_termin = $alusherskiy_termin;
        $settings->data_zachatya = $data_zachatya;

        $settings->save();

        return redirect()->route('settings');
    }
}
