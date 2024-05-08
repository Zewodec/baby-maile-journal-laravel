@extends('master')

@section('title', 'Трекери зростання немовля')

@section('body-classes', 'decorations')

@section('content')

<h1 class="h1_anastasia text-center">Зростання</h1>

<section class="setup-time-section">
    <input class="input-text" type="datetime-local" placeholder="Дата та час">
    <button class="action-button3">Встановити час</button>
</section>

<section class="section-base padding-bottom-140">

    <div class="flex-row-base">
        <div class="">
            <label class="radio-btn-style_label">
                Маса:
                <input class="input-text" type="text" placeholder="Маса">
                г
            </label>
        </div>
        <div class="radio-btn-style_label">
            <label>
                Довжина:
                <input class="input-text" type="text" placeholder="Довжина">
                см
            </label>
        </div>
    </div>

    <button class="action-button3">Зберегти</button>
</section>
@endsection
