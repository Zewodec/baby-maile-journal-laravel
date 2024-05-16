<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class HistoryTrackerController extends Controller
{
    function historyTrackerPage()
    {
        $user = auth()->user();

        // i need to get category, what have been done, time, and group by date
//        $history = $user->children->where('id', $user->selected_children_id)->load([
//            'son',
//            'progulyanka',
//            'zrostanya',
//            'chasGri',
//            'pidguznik',
//            'zcidjuvanya',
//            'godivanyaGrudy',
//            'goduvanyaPlashechka',
//            'goduvanyaTverda',
//            'likyZdorovya',
//            'symptomesZdorovya',
//            'temperatureZdorovya',
//        ]);

//        $sons = $user->children->where('id', $user->selected_children_id)->first()->son;
//
//        $progulyankas = $user->children->where('id', $user->selected_children_id)->first()->progulyanka;
//
//        $zrostanyas = $user->children->where('id', $user->selected_children_id)->first()->zrostanya;
//
//        $chasGris = $user->children->where('id', $user->selected_children_id)->first()->chasGri;
//
//        $pidguzniks = $user->children->where('id', $user->selected_children_id)->first()->pidguznik;
//
//        $zcidjuvanyas = $user->children->where('id', $user->selected_children_id)->first()->zcidjuvanya;
//
//        $godivanyaGrudys = $user->children->where('id', $user->selected_children_id)->first()->godivanyaGrudy;
//
//        $goduvanyaPlashechkas = $user->children->where('id', $user->selected_children_id)->first()->goduvanyaPlashechka;
//
//        $goduvanyaTverdas = $user->children->where('id', $user->selected_children_id)->first()->goduvanyaTverda;
//
//        $likyZdorovyas = $user->children->where('id', $user->selected_children_id)->first()->likyZdorovya;
//
//        $symptomesZdorovyas = $user->children->where('id', $user->selected_children_id)->first()->symptomesZdorovya;
//
//        $temperatureZdorovyas = $user->children->where('id', $user->selected_children_id)->first()->temperatureZdorovya;


        $child = $user->children->where('id', $user->selected_children_id)->first();

        $events = collect();

        $events = $events->merge($child->progulyanka->map(function($item) {
            return [
                'type' => 'Прогулянка',
                'date' => $item->date,
                'time' => Carbon::parse($item->time)->format('H:i:s'),
                'description' => null,
            ];
        }));

        $events = $events->merge($child->zrostanya->map(function($item) {
            return [
                'type' => 'Зростання',
                'date' => $item->datetime,
                'time' => Carbon::parse($item->datetime)->format('H:i:s'),
                'description' => $item->length . ' см ' . $item->weight . ' г',
            ];
        }));

        $events = $events->merge($child->chasGri->map(function($item) {
            return [
                'type' => 'Час гри',
                'date' => $item->datetime,
                'time' => Carbon::parse($item->datetime)->format('H:i:s'),
                'description' => $item->activity . ' ' . $item->tracked_time,
            ];
        }));

        $events = $events->merge($child->pidguznik->map(function($item) {
            return [
                'type' => 'Підгузник',
                'date' => $item->datetime,
                'time' => Carbon::parse($item->datetime)->format('H:i:s'),
                'description' => 'Cтан: ' . $item->type . ' Вологість: ' . $item->vologist . ' Колір Каки: ' . $item->kaka_color,
            ];
        }));

        $events = $events->merge($child->zcidjuvanya->map(function($item) {
            return [
                'type' => 'Зціджування',
                'date' => $item->date,
                'time' => Carbon::parse($item->date)->format('H:i:s'),
                'description' => 'Ліве: ' . $item->left_amount . ' мл ' . Carbon::parse($item->left_time)->format('H:i:s') . ' Праве: ' . $item->right_amount . ' мл ' . Carbon::parse($item->right_time)->format("H:i:s"),
            ];
        }));

        $events = $events->merge($child->godivanyaGrudy->map(function($item) {
            return [
                'type' => 'Годування грудьми',
                'date' => $item->datetime,
                'time' => Carbon::parse($item->datetime)->format('H:i:s'),
                'description' => 'Ліве: ' . $item->left_time . ' Праве: ' . $item->right_time . ' Тип годування: ' . $item->goduvanya_type,
            ];
        }));

        $events = $events->merge($child->goduvanyaPlashechka->map(function($item) {
            return [
                'type' => 'Годування пляшечкою',
                'date' => $item->datetime,
                'time' => Carbon::parse($item->datetime)->format('H:i:s'),
                'description' => 'Тип: ' . $item->plashechka_type . ' Кількість: ' . $item->plashechka_amount . ' мл Час: ' . $item->plashechka_time . ' Тип годування: ' . $item->goduvanya_type,
            ];
        }));

        $events = $events->merge($child->goduvanyaTverda->map(function($item) {
            return [
                'type' => 'Годування твердою їжею',
                'date' => $item->datetime,
                'time' => Carbon::parse($item->datetime)->format('H:i:s'),
                'description' => 'Тип: ' . $item->type . ' Група 1: ' . $item->group1 . ' Група 2: ' . $item->group2 . ' Група 3: ' . $item->group3 . ' Час: ' . $item->tverda_time,
            ];
        }));

        $events = $events->merge($child->likyZdorovya->map(function($item) {
            return [
                'type' => 'Ліки/Вакцинація',
                'date' => $item->date,
                'time' => Carbon::parse($item->date)->format('H:i:s'),
                'description' => $item->liky_vacine,
//                'med_type' => $item->type,
            ];
        }));

        $events = $events->merge($child->symptomesZdorovya->map(function($item) {
            return [
                'type' => 'Симптоми',
                'date' => $item->date,
                'time' => Carbon::parse($item->date)->format('H:i:s'),
                'description' => $item->symptomes,
            ];
        }));

        $events = $events->merge($child->temperatureZdorovya->map(function($item) {
            return [
                'type' => 'Температура',
                'date' => $item->date,
                'time' => Carbon::parse($item->date)->format('H:i:s'),
                'description' => $item->temp . ' C',
            ];
        }));

// Групуємо події за датою
        $groupedEvents = $events->groupBy('date')->sortDesc();

        return view('trackers.nemovlya.history', [
            'user' => $user,
            'children' => $user->children,
            'children_name' => $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $user->children->where('id', $user->selected_children_id)->first()->pluck('birthday')->map(function ($item) {
                    $month_diference = $item->diffInMonths(now());

                    $text_difference = round($month_diference) . "m";
                    return $text_difference;
                })->first() ?? null,
            'groupedEvents' => $groupedEvents,
        ]);
    }
}
