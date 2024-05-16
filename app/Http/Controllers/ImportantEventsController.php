<?php

namespace App\Http\Controllers;

use App\Models\ImportantEvents;
use Illuminate\Http\Request;

class ImportantEventsController extends Controller
{
    function eventsPage()
    {
        $user = auth()->user();

        $events = ImportantEvents::where('user_id', $user->id)->where('child_id', $user->selected_children_id)->get();

        return view('pages.important_events.events', [
            'user' => $user,
            'children' => $user->children,
            'children_name' => $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $user->children->where('id', $user->selected_children_id)->first()->pluck('birthday')->map(function ($item) {
                    $month_diference = $item->diffInMonths(now());

                    $text_difference = round($month_diference) . "m";
                    return $text_difference;
                })->first() ?? null,
            'events' => $events,
        ]);
    }

    function addEventPage()
    {
        $user = auth()->user();

        return view('pages.important_events.add_event', [
            'user' => $user,
            'children' => $user->children,
            'children_name' => $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $user->children->where('id', $user->selected_children_id)->first()->pluck('birthday')->map(function ($item) {
                    $month_diference = $item->diffInMonths(now());

                    $text_difference = round($month_diference) . "m";
                    return $text_difference;
                })->first() ?? null,
        ]);
    }

    function addEventRequest(Request $request)
    {
        $event_name = $request->event_name ?? null;
        $event_description = $request->event_description ?? null;
        $event_text = $request->event_text ?? null;

        $request->validate([
            'event_name' => 'required',
            'event_description' => 'required',
            'event_text' => 'required',
        ]);

        $path = $request->file('image') ? $request->file('image')->store('images', 'public') : null;

        $user = auth()->user();

        $event = new ImportantEvents([
            'user_id' => $user->id,
            'child_id' => $user->selected_children_id,
            'event_name' => $event_name,
            'event_description' => $event_description,
            'event_text' => $event_text,
            'image' => $path,
        ]);

        $event->save();

        return redirect()->route('important_events.index');
    }
}
