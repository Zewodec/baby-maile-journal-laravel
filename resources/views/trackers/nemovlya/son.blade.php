@extends('master')

@section('title', 'Трекери сна немовля')

@section('body-classes', 'decorations')

@section('content')

    <h1 class="h1_anastasia text-center">Сон</h1>

    <section class="setup-time-section">
        <input class="input-text" type="datetime-local" placeholder="Дата та час">
        <button class="action-button3">Встановити час</button>
    </section>

    <section class="goduvanya-grudy-section">
        <div class="total-time">
            <h5>Тривалість:</h5>
            <h5>0 с</h5>
        </div>

        <div class="button-group">
            <div class="button-group__column">
                <button class="button-group__column__button">Старт</button>
                <p class="button-group__column__timer">00:00:00</p>
            </div>
        </div>

        <button class="action-button3">Зберегти</button>
    </section>
@endsection
