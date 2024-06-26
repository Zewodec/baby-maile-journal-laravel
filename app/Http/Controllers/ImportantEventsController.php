<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\ImportantEvents;
use Illuminate\Http\Request;

class ImportantEventsController extends Controller
{
    function eventsPage()
    {
        $user = auth()->user();

        $events = ImportantEvents::where('user_id', $user->id)->where('child_id', $user->selected_children_id)->get();

        $children_age_string = Child::find($user->selected_children_id);

        if ($children_age_string !== null) {
            $children_age_string = Child::find($user->selected_children_id)->getBirthday();
        }

        return view('pages.important_events.events', [
            'user' => $user,
            'children' => $user->children,
            'children_name' => $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $children_age_string,
            'events' => $events,
        ]);
    }

    function addEventPage()
    {
        $user = auth()->user();

        $children_age_string = Child::find($user->selected_children_id);

        if ($children_age_string !== null) {
            $children_age_string = $children_age_string->getBirthday();
        }

        return view('pages.important_events.add_event', [
            'user' => $user,
            'children' => $user->children,
            'children_name' => $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' =>  $children_age_string,
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

    function deleteEvent($eventID)
    {
        $event = ImportantEvents::find($eventID);
        $event->delete();

        return redirect()->route('important_events.index');
    }
}
