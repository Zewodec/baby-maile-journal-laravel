@extends('master')

@section('title', 'Трекери немовля')

@section('content')

    <div class="tracker-baby-title-div">
        <a href="{{route('trackers.nemovlya.history')}}">
            <h1 class="tracker-baby-title">Переглянути історію</h1>
        </a>
    </div>

    <div class="trackers-baby-group">
        <div class="trackers-baby-group__item">
            <a href="{{route('trackers.nemovlya.goduvanya')}}">
                <img class="trackers-baby-group__item__image" src="{{URL::asset('images/trackers/goduvanya.svg')}}"/>
                <p class="trackers-baby-group__item__text">Годування</p>
            </a>
        </div>

        <div class="trackers-baby-group__item">
            <a href="{{route('trackers.nemovlya.zcidjuvanya')}}">
                <img class="trackers-baby-group__item__image" src="{{URL::asset('images/trackers/zcidguvanya.svg')}}"/>
                <p class="trackers-baby-group__item__text">Зціджування</p>
            </a>
        </div>

        <div class="trackers-baby-group__item">
            <a href="{{route('trackers.nemovlya.pidguznik')}}">
                <img class="trackers-baby-group__item__image" src="{{URL::asset('images/trackers/piguznik.svg')}}"/>
                <p class="trackers-baby-group__item__text">Підгузник</p>
            </a>
        </div>

        <div class="trackers-baby-group__item">
            <a href="{{route('trackers.nemovlya.son')}}">
                <img class="trackers-baby-group__item__image" src="{{URL::asset('images/trackers/son.svg')}}"/>
                <p class="trackers-baby-group__item__text">Сон</p>
            </a>
        </div>

        <div class="trackers-baby-group__item">
            <a href="{{route('trackers.nemovlya.chas-gri')}}">
                <img class="trackers-baby-group__item__image" src="{{URL::asset('images/trackers/chas-play.svg')}}"/>
                <p class="trackers-baby-group__item__text">Час гри</p>
            </a>
        </div>

        <div class="trackers-baby-group__item">
            <a href="{{route('trackers.nemovlya.zdorovya')}}">
                <img class="trackers-baby-group__item__image" src="{{URL::asset('images/trackers/zdorovya.svg')}}"/>
                <p class="trackers-baby-group__item__text">Здоров’я</p>
            </a>
        </div>

        <div class="trackers-baby-group__item">
            <a href="{{route('trackers.nemovlya.zrostanya')}}">
                <img class="trackers-baby-group__item__image" src="{{URL::asset('images/trackers/zrostanya.svg')}}"/>
                <p class="trackers-baby-group__item__text">Зростання</p>
            </a>
        </div>

        <div class="trackers-baby-group__item">
            <a href="{{route('trackers.nemovlya.progulyanka')}}">
                <img class="trackers-baby-group__item__image" src="{{URL::asset('images/trackers/progulyanka.svg')}}"/>
                <p class="trackers-baby-group__item__text">Прогулянка</p>
            </a>
        </div>
    </div>

@endsection
