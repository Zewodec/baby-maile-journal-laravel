@extends('master')

@section('title', 'Трекери зростання немовля')

@section('body-classes', 'decorations')

@section('head')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #FFF9F4;
        }
    </style>
@endsection

@section('content')

    <h1 class="h1_anastasia text-center">Зростання</h1>
    @if(session('error'))
        <div class="alert alert-danger w-25 text-center ml-5">{{session('error')}}</div>
    @endif
    @if(session('success'))
        <div class="alert alert-success w-25 text-center ml-5">{{session('success')}}</div>
    @endif
    <form action="{{route('trackers.nemovlya.zrostanya.save')}}" method="post">
        @csrf
        <section class="setup-time-section">
            <input id="date_time_input" class="input-text" type="datetime-local" placeholder="Дата та час"
                   name="datetime">
            <button id="setup-time" class="action-button3" type="button">Встановити час</button>
        </section>

        <script src="{{URL::asset('js/set-now-field.js')}}"></script>

        <section class="section-base padding-bottom-140">

            <div class="flex-row-base">
                <div class="">
                    <label class="radio-btn-style_label">
                        Маса:
                        <input class="input-text" type="text" placeholder="Маса" name="weight">
                        г
                    </label>
                </div>
                <div class="radio-btn-style_label">
                    <label>
                        Довжина:
                        <input class="input-text" type="text" placeholder="Довжина" name="length">
                        см
                    </label>
                </div>
            </div>

            <button class="action-button3">Зберегти</button>
        </section>
    </form>
@endsection
