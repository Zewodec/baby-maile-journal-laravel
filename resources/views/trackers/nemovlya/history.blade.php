@extends('master')

@section('title', 'Історія трекерів немовля')

@section('content')

<h1 class="h1_anastasia text-center">Історія</h1>

<div class="trackers-baby-group_history">
    <a class="trackers-baby-group__item_history" href="{{route("trackers.nemovlya.history")}}">
        <p class="trackers-baby-group__item__text_history">Все</p>
    </a>
    <a class="trackers-baby-group__item_history" href="{{route("trackers.nemovlya.history.goduvanya")}}">

        <img class="trackers-baby-group__item__image_history" src="{{URL::asset('images/trackers/goduvanya.svg')}}"/>
        <p class="trackers-baby-group__item__text_history">Годування</p>

    </a>

    <a class="trackers-baby-group__item_history" href="{{route("trackers.nemovlya.history.zcidjuvanya")}}">

        <img class="trackers-baby-group__item__image_history" src="{{URL::asset('images/trackers/zcidguvanya.svg')}}"/>
        <p class="trackers-baby-group__item__text_history">Зціджування</p>

    </a>

    <a class="trackers-baby-group__item_history" href="{{route("trackers.nemovlya.history.pidguznik")}}">

        <img class="trackers-baby-group__item__image_history" src="{{URL::asset('images/trackers/piguznik.svg')}}"/>
        <p class="trackers-baby-group__item__text_history">Підгузник</p>

    </a>

    <a class="trackers-baby-group__item_history" href="{{route("trackers.nemovlya.history.son")}}">

        <img class="trackers-baby-group__item__image_history" src="{{URL::asset('images/trackers/son.svg')}}"/>
        <p class="trackers-baby-group__item__text_history">Сон</p>

    </a>

    <a class="trackers-baby-group__item_history" href="{{route("trackers.nemovlya.history.chasGri")}}">

        <img class="trackers-baby-group__item__image_history" src="{{URL::asset('images/trackers/chas-play.svg')}}"/>
        <p class="trackers-baby-group__item__text_history">Час гри</p>

    </a>

    <a class="trackers-baby-group__item_history" href="{{route("trackers.nemovlya.history.zdorovya")}}">

        <img class="trackers-baby-group__item__image_history" src="{{URL::asset('images/trackers/zdorovya.svg')}}"/>
        <p class="trackers-baby-group__item__text_history">Здоров’я</p>

    </a>

    <a class="trackers-baby-group__item_history" href="{{route("trackers.nemovlya.history.zrostanya")}}">

        <img class="trackers-baby-group__item__image_history" src="{{URL::asset('images/trackers/zrostanya.svg')}}"/>
        <p class="trackers-baby-group__item__text_history">Зростання</p>

    </a>

    <a class="trackers-baby-group__item_history" href="{{route("trackers.nemovlya.history.progulyanka")}}">

        <img class="trackers-baby-group__item__image_history" src="{{URL::asset('images/trackers/progulyanka.svg')}}"/>
        <p class="trackers-baby-group__item__text_history">Прогулянка</p>

    </a>

</div>

<section class="history-tracker-table-section">
    @foreach($groupedEvents as $date => $events)
    <table class="base-table">
        <tr>
            <th>{{\Carbon\Carbon::parse($date)->format('d.m.Y')}}</th>
            <th>Година</th>
            <th>Дії</th>
        </tr>
        @foreach($events as $event)
{{--            @dd($event)--}}
        <tr>
            <td class="history-tracker-table-section__row">
                <span class="trackers-baby-group__item_history">
                    @if($event['type'] == 'Годування грудьми' || $event['type'] == 'Годування пляшечкою' || $event['type'] == 'Годування твердою їжею')
                        <img class="trackers-baby-group__item__image_history" src="{{URL::asset('images/trackers/goduvanya.svg')}}"/>
                    @elseif($event['type'] == 'Зціджування')
                        <img class="trackers-baby-group__item__image_history" src="{{URL::asset('images/trackers/zcidguvanya.svg')}}"/>
                    @elseif($event['type'] == 'Підгузник')
                        <img class="trackers-baby-group__item__image_history" src="{{URL::asset('images/trackers/piguznik.svg')}}"/>
                    @elseif($event['type'] == 'feeding')
                        <img class="trackers-baby-group__item__image_history" src="{{URL::asset('images/trackers/son.svg')}}"/>
                    @elseif($event['type'] == 'Час гри')
                        <img class="trackers-baby-group__item__image_history" src="{{URL::asset('images/trackers/chas-play.svg')}}"/>
                    @elseif($event['type'] == 'Ліки/Вакцинація' || $event['type'] == 'Симптоми' || $event['type'] == 'Температура')
                        <img class="trackers-baby-group__item__image_history" src="{{URL::asset('images/trackers/zdorovya.svg')}}"/>
                    @elseif($event['type'] == 'Зростання')
                        <img class="trackers-baby-group__item__image_history" src="{{URL::asset('images/trackers/zrostanya.svg')}}"/>
                    @elseif($event['type'] == 'Прогулянка')
                        <img class="trackers-baby-group__item__image_history" src="{{URL::asset('images/trackers/progulyanka.svg')}}"/>
                    @endif
                </span>
                <p>{{$event['type'] . ": " .$event['description']}}</p>
            </td>
            <td>{{$event['time']}}</td>
            <td class="text-center">
                <button class="action-button3">Редагувати</button>
                <button class="action-button3">Видалити</button>
            </td>
        </tr>
        @endforeach
    </table>
    @endforeach
</section>
@endsection
