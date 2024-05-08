@extends('master')

@section('title','Сім\'я')

@section('head')
    <link rel="stylesheet" href="{{URL::asset('css/change-password-dialog.css')}}">
@endsection

@section('content')
    <h1 class="h1_anastasia text-center">Сім'я</h1>
    <section class="user-section">
        <div class="user-section__form">
            <input class="input-text" type="text" placeholder="Ім'я користувача">
            <input class="input-text" type="email" placeholder="Електронна скринька">
        </div>

        <button id="change-password-button" class="action-button2">Змінити пароль</button>
    </section>

    <section class="children-section">
        <button class="action-button2">+ додати дитину</button>

        <div class="child__item">
            <img src="{{URL::asset('images/child-avatar.png')}}"/>
            <div class="child__item__fields">
                <input class="input-text" type="text" placeholder="Ім'я дитини">
                <input class="input-text" type="text" placeholder="Прізвище дитини">
                <input class="input-text" type="date" placeholder="Дата народження">
                <select class="input-text">
                    <option>Чоловіча</option>
                    <option>Жіноча</option>
                </select>
            </div>
        </div>

        <div class="child__item">
            <img src="{{URL::asset('images/child-avatar.png')}}"/>
            <div class="child__item__fields">
                <input class="input-text" type="text" placeholder="Ім'я дитини">
                <input class="input-text" type="text" placeholder="Прізвище дитини">
                <input class="input-text" type="date" placeholder="Дата народження">
                <select class="input-text">
                    <option>Чоловіча</option>
                    <option>Жіноча</option>
                </select>
            </div>
        </div>
    </section>

    <section class="parents-section">
        <div class="parents-section__item">
            <img src="{{URL::asset('images/parent-avatar.png')}}" alt="parent avatar"/>
            <div class="parents-section__item__fields">
                <input class="input-text" type="text" placeholder="Ім'я одного з батьків">
                <input class="input-text" type="text" placeholder="Прізвище одного з батьків">
            </div>
        </div>

        <div class="parents-section__item">
            <img src="{{URL::asset('images/parent-avatar.png')}}" alt="parent avatar"/>
            <div class="parents-section__item__fields">
                <input class="input-text" type="text" placeholder="Ім'я одного з батьків">
                <input class="input-text" type="text" placeholder="Прізвище одного з батьків">
            </div>
        </div>
    </section>

    <div class="save-button-section">
        <button class="action-button2">Зберегти дані</button>
    </div>

@endsection

@section('scripts')
    <script src="{{URL::asset('js/change-password-dialog.js')}}"></script>
@endsection
