@extends('master')

@section('title','Сім\'я')

@section('head')
    <link rel="stylesheet" href="{{URL::asset('css/change-password-dialog.css')}}">
@endsection

@section('content')

    <h1 class="h1_anastasia text-center">Сім'я</h1>
    <section class="user-section">
        <div class="user-section__form">
            <input class="input-text" type="text" placeholder="Ім'я користувача" value="{{ isset($user) ? $user['username'] : ''}}">
            <input class="input-text" type="email" placeholder="Електронна скринька" value="{{ isset($user) ? $user['email'] : ''}}">
        </div>

        <button id="change-password-button" class="action-button2">Змінити пароль</button>
    </section>

    <section id="children-section" class="children-section">
        <button id="add-child-button" class="action-button2">+ додати дитину</button>

        @foreach($children as $child)
            <div class="child__item">
                <img src="{{URL::asset('images/child-avatar.png')}}"/>
                <div class="child__item__fields">
                    <input name="child_name" class="input-text" type="text" placeholder="Ім'я дитини" value="{{$child['name']}}">
                    <input name="child_surname" class="input-text" type="text" placeholder="Прізвище дитини" value="{{$child['surname']}}">
                    <input name="child_birthday" class="input-text" type="date" placeholder="Дата народження" value="{{$child['birthday']->format('Y-m-d')}}">
                    <select name="child_sex" class="input-text">
                        <option value="male" @if($child['sex']=='male') selected @endif>Чоловіча</option>
                        <option value="female" @if($child['sex']=='female') selected @endif>Жіноча</option>
                    </select>
                </div>
            </div>
        @endforeach
    </section>

    <script>
        const addChildButton = document.getElementById('add-child-button');

        //show dialog
        addChildButton.addEventListener('click', function() {
            const dialog = document.getElementById('add-child-dialog');
            dialog.showModal();
        });
    </script>

    <section class="parents-section">
        <div class="parents-section__item">
            <img src="{{URL::asset('images/parent-avatar.png')}}" alt="parent avatar"/>
            <div class="parents-section__item__fields">
                <input name="parent1_name" class="input-text" type="text" placeholder="Ім'я одного з батьків">
                <input name="parent1_surname" class="input-text" type="text" placeholder="Прізвище одного з батьків">
            </div>
        </div>

        <div class="parents-section__item">
            <img src="{{URL::asset('images/parent-avatar.png')}}" alt="parent avatar"/>
            <div class="parents-section__item__fields">
                <input name="parent2_name" class="input-text" type="text" placeholder="Ім'я одного з батьків">
                <input name="parent2_surname" class="input-text" type="text" placeholder="Прізвище одного з батьків">
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
