@extends('master')

@section('title', 'Важливі події')

@section('content')
    <h1 class="h1_anastasia text-center">Важливі події</h1>

    <form method="post" action="{{route("important_events.add")}}" class="add-event-form" enctype="multipart/form-data">
        @csrf
        <label class="add-event-form__label">
            Назва події:
            <input class="input-text" type="text" name="event_name" placeholder="Назва події">
        </label>

        <label class="add-event-form__label">
            Опис події:
            <input class="input-text" type="text" name="event_description" placeholder="Опис події">
        </label>

        <label class="add-event-form__label">
            Текст до події:
            <textarea class="form-text-area" name="event_text" placeholder="Текст до події"></textarea>
        </label>

        <label class="add-event-form__label">
            Додати фото
        <input type="file" class="action-button3" name="image">
        </label>

        <button type="submit" class="action-button3">Зберегти дані</button>
    </form>
@endsection
