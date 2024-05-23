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
                    <input name="child_birthday" class="input-text" type="date" placeholder="Дата народження" @if(isset($child->settings->pology_date)) value="{{$child->settings->pology_date}}" @endif>
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

    <form class="parents-section" action="{{route('family.save_parents')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="parents-section__item">
            <img class="family-image" src="{{url('storage/' . $parents['parent_1_image'])}}" alt="parent avatar" id="parent_1_image"/>
            <input name="parent_1_image" type="file" hidden id="parent_1_image_input">
            <div class="parents-section__item__fields">
                <input name="parent_1_first_name" class="input-text" type="text" placeholder="Ім'я одного з батьків" value="{{$parents['parent_1_first_name'] ?? null}}">
                <input name="parent_1_last_name" class="input-text" type="text" placeholder="Прізвище одного з батьків" value="{{$parents['parent_1_last_name'] ?? null}}">
            </div>
        </div>

        <div class="parents-section__item">
            <img class="family-image" src="{{url('storage/' . $parents['parent_2_image'])}}" alt="parent avatar" id="parent_2_image"/>
            <input name="parent_2_image" type="file" hidden id="parent_2_image_input">
            <div class="parents-section__item__fields">
                <input name="parent_2_first_name" class="input-text" type="text" placeholder="Ім'я одного з батьків" value="{{$parents['parent_2_first_name']  ?? null}}">
                <input name="parent_2_last_name" class="input-text" type="text" placeholder="Прізвище одного з батьків" value="{{$parents['parent_2_last_name'] ?? null}}">
            </div>
        </div>
        <div class="save-button-section">
            <button class="action-button2">Зберегти дані Батьків</button>
        </div>
    </form>

    <script>
        const parent1Image = document.getElementById('parent_1_image');
        const parent1ImageInput = document.getElementById('parent_1_image_input');
        const parent2Image = document.getElementById('parent_2_image');
        const parent2ImageInput = document.getElementById('parent_2_image_input');

        parent1Image.addEventListener('click', function() {
            parent1ImageInput.click();
        });

        parent1ImageInput.addEventListener('change', function() {
            const file = parent1ImageInput.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                parent1Image.src = e.target.result;
            };
            reader.readAsDataURL(file);
        });

        parent2Image.addEventListener('click', function() {
            parent2ImageInput.click();
        });

        parent2ImageInput.addEventListener('change', function() {
            const file = parent2ImageInput.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                parent2Image.src = e.target.result;
            };
            reader.readAsDataURL(file);
        });
    </script>

    <div class="save-button-section">
        <button class="action-button2">Зберегти дані</button>
    </div>

@endsection

@section('scripts')
    <script src="{{URL::asset('js/change-password-dialog.js')}}"></script>
@endsection
