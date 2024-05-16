@extends('master')

@section('title', 'Історія трекерів немовля')

@section('content')

<h1 class="h1_anastasia text-center">Історія</h1>

<div class="trackers-baby-group_history">
    <button class="trackers-baby-group__item_history">
        <p class="trackers-baby-group__item__text_history">Все</p>
    </button>
    <button class="trackers-baby-group__item_history">

        <img class="trackers-baby-group__item__image_history" src="{{URL::asset('images/trackers/goduvanya.svg')}}"/>
        <p class="trackers-baby-group__item__text_history">Годування</p>

    </button>

    <button class="trackers-baby-group__item_history">

        <img class="trackers-baby-group__item__image_history" src="{{URL::asset('images/trackers/zcidguvanya.svg')}}"/>
        <p class="trackers-baby-group__item__text_history">Зціджування</p>

    </button>

    <button class="trackers-baby-group__item_history">

        <img class="trackers-baby-group__item__image_history" src="{{URL::asset('images/trackers/piguznik.svg')}}"/>
        <p class="trackers-baby-group__item__text_history">Підгузник</p>

    </button>

    <button class="trackers-baby-group__item_history">

        <img class="trackers-baby-group__item__image_history" src="{{URL::asset('images/trackers/son.svg')}}"/>
        <p class="trackers-baby-group__item__text_history">Сон</p>

    </button>

    <button class="trackers-baby-group__item_history">

        <img class="trackers-baby-group__item__image_history" src="{{URL::asset('images/trackers/chas-play.svg')}}"/>
        <p class="trackers-baby-group__item__text_history">Час гри</p>

    </button>

    <button class="trackers-baby-group__item_history">

        <img class="trackers-baby-group__item__image_history" src="{{URL::asset('images/trackers/zdorovya.svg')}}"/>
        <p class="trackers-baby-group__item__text_history">Здоров’я</p>

    </button>

    <button class="trackers-baby-group__item_history">

        <img class="trackers-baby-group__item__image_history" src="{{URL::asset('images/trackers/zrostanya.svg')}}"/>
        <p class="trackers-baby-group__item__text_history">Зростання</p>

    </button>

    <button class="trackers-baby-group__item_history">

        <img class="trackers-baby-group__item__image_history" src="{{URL::asset('images/trackers/progulyanka.svg')}}"/>
        <p class="trackers-baby-group__item__text_history">Прогулянка</p>

    </button>

</div>

<section class="history-tracker-table-section">
    <table class="base-table">
        <tr>
            <th>16 квітня</th>
            <th>Година</th>
            <th>Дії</th>
        </tr>
        <tr>
            <td class="history-tracker-table-section__row">
                <span class="trackers-baby-group__item_history">
                <img class="trackers-baby-group__item__image_history" src="{{URL::asset('images/trackers/progulyanka.svg')}}"/>
                </span>
                <p>Прогулянка:  00:30:10</p>
            </td>
            <td>12:00</td>
            <td class="text-center">
                <button class="action-button3">Редагувати</button>
                <button class="action-button3">Видалити</button>
            </td>
        </tr>
    </table>
</section>
@endsection
