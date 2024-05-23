<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Poshtovhs;
use Carbon\Carbon;
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

        $poshtovhs_amount = Poshtovhs::all()->where('child_id', $user->selected_children_id)->where('date', '>=', Carbon::parse(now())->format('Y-m-d'))->count();
        $poshtovhs_group = Poshtovhs::all()->where('child_id', $user->selected_children_id)->where('date', '>=', Carbon::parse(now())->format('Y-m-d'))->groupBy('session_id');

        $poshtovhs_trivalist = [];
        foreach ($poshtovhs_group as $group) {
            $last_index = $group->count() - 1;
            $poshtovhs_trivalist[] = Carbon::parse($group[$last_index]['time'])->diff(Carbon::parse($group[0]['time']));
        }

        $poshtovhs_trivalist_sum = 0;
        foreach ($poshtovhs_trivalist as $trivalist) {
            $poshtovhs_trivalist_sum += abs($trivalist->totalSeconds);
        }

        $seconds = $poshtovhs_trivalist_sum;
        $minutes = floor($seconds / 60);
        $hours = floor($seconds / 3600);


        $poshtovhs_trivalist_sum = sprintf('%02d:%02d:%02d', $hours, $minutes % 60, $seconds % 60);

        return view('trackers.vagitnist.vagitnist', [
            'user' => $user,
            'children' => $user->children,
            'children_name' => $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $children_age_string,
            'vaga' => $vaga,
            'nadbavka' => $nadbavka,
            'poshtovhs_amount' => $poshtovhs_amount,
            'poshtovhs_trivalist' => $poshtovhs_trivalist_sum ?? null,
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
