<?php

namespace App\Http\Controllers;

use App\Models\CalendarEvents;
use App\Models\CalendarImages;
use App\Models\Child;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function calendarPage()
    {
        $user = auth()->user();

        $calendarData = CalendarEvents::with('images')->get();;

        $calendarData = $calendarData->where('user_id', $user->id)->where('child_id', $user->selected_children_id)->groupBy(function ($item) {
            return $item->date->format('Y-m-d');
        });

        $children_age_string = Child::find($user->selected_children_id);

        if ($children_age_string !== null) {
            $children_age_string = $children_age_string->getBirthday();
        }

        return view('pages.calendar', [
            'user' => $user,
            'children' => $user->children,
            'children_name' => $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
            'children_age_string' => $children_age_string,
            'calendarData' => $calendarData,
        ]);
    }

    public function removeImageFromEvent($image_id)
    {
        $image = CalendarImages::find($image_id);
        $image->delete();

        return redirect()->back();
    }

    public function addEvent(Request $request)
    {
        $event_text = $request->event_text;
        $selectedDate = $request->selectedDate;

        $user = auth()->user();

        $calendarEventToday = $user->calendarEvents->groupBy(function ($item) {
            return $item->date->format('Y-m-d');
        })->get($selectedDate);

        $calendarEvent = null;

        if($calendarEventToday == null) {

            $calendarEvent = new CalendarEvents([
                'user_id' => auth()->user()->id,
                'child_id' => auth()->user()->selected_children_id,
                'date' => $selectedDate,
                'text' => $event_text,
            ]);

            $calendarEvent->save();

            if($request->hasFile('event_images')) {
                foreach ($request->file('event_images') as $image) {
                    $path = $image->store('calendar_images', 'public');
                    $calendarImage = new CalendarImages([
                        'calendar_events_id' => $calendarEvent->id,
                        'path' => $path,
                    ]);
                    $calendarImage->save();
                }
            }
        } else {
            $calendarEvent = CalendarEvents::find($calendarEventToday->first()->id);

            $calendarEvent->text = $event_text;

            $calendarEvent->save();


            if($request->hasFile('event_images')) {
                foreach ($request->file('event_images') as $image) {
                    if ($image->isValid()) {
                        $path = $image->store('calendar_images', 'public');
                        $calendarImage = new CalendarImages([
                            'calendar_events_id' => $calendarEvent->id,
                            'path' => $path,
                        ]);
                        $calendarImage->save();
                    }
                }
            }
        }

        return redirect()->back();
    }

}
