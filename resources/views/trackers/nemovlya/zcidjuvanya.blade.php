@extends('master')

@section('title', 'Трекери зціджування')

@section('body-classes', 'decorations')


@section('content')

<h1 class="h1_anastasia text-center">Зціджування</h1>

<section class="setup-time-section">
    <input class="input-text" type="datetime-local" placeholder="Дата та час">
    <button class="action-button3">Встановити час</button>
</section>

<section class="zcidjuvanya-section">
    <div class="total-time">
        <h5>Кількість:</h5>
        <h5>200 мл</h5>
    </div>

    <label class="amount-slider">
        Кількість:
        <output for="left-scidjuvanya" id="output-left-scidjuvanya">100 мл</output>
        <input id="left-scidjuvanya" type="range" min="0" max="350" value="100">
    </label>

    <label class="amount-slider">
        Кількість:
        <output for="right-scidjuvanya" id="output-right-scidjuvanya">100 мл</output>
        <input id="right-scidjuvanya" type="range" min="0" max="350" value="100">
    </label>

    <div class="total-time">
        <h5 >Тривалість:</h5>
        <h5 >0 с</h5>
    </div>

    <div class="button-group">
        <div class="button-group__column">
            <button class="button-group__column__button">Старт</button>
            <p class="button-group__column__timer">Ліва: 00:00:00</p>
        </div>
        <div class="button-group__column">
            <button class="button-group__column__button">Старт</button>
            <p class="button-group__column__timer">Права: 00:00:00</p>
        </div>
    </div>

    <button class="action-button3">Зберегти</button>
</section>
@endsection
