@extends('master')

@section('title', 'Важливі події')

@section('content')

    <h1 class="h1_anastasia text-center">Важливі події</h1>

    <h3 class="text-center ingredients-selection__text"><a href="{{route("important_events.add")}}"
                                                           style="color: #BDABA2">Додайте подію!</a></h3>

    <div class="important-events-group">
        @foreach($events as $event)
            <div class="important-events-group__item">
                <img class="important-events-group__item__image" src="{{url('storage/' . $event->image)}}"/>
                <h2 class="important-events-group__item__title">{{$event->event_name}}</h2>
                <p class="important-events-group__item__description">{{$event->event_description}}</p>
                <p class="important-events-group__item__text">{{$event->event_text}}</p>
                <a href="{{ route('important_events.delete', ['eventID' => $event->id]) }}" class="action-button3">Видалити подію</a>
            </div>
        @endforeach
    </div>
@endsection
