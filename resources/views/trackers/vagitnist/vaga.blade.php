@extends('master')

@section('title', 'Трекер Ваги')

@section('body-classes', 'tracker-vaga-body')

@section('content')
<h1 class="h1_anastasia text-center">Трекер ваги</h1>
<h3 class="current-vaga">Поточна вага: {{$vaga_data[0]['vaga'] ?? 0}}кг</h3>
<section class="add-vaga-section">
    <form class="add-vaga-form" method="post" action="{{route('trackers.vagitnist.add-vaga')}}">
        @csrf
        <input class="input-text w100percent" type="text" name="vaga" placeholder="Введіть нову вагу, кг">
        <button class="action-button2 w25percent">Додати</button>
        <img src="{{URL::asset('images/woman.png')}}">
    </form>
</section>

<section class="journal-section">
    <h3 class="journal-section__title">Журнал</h3>
    <table class="journal-section__table">
        <tr>
            <th>Дата</th>
            <th>Вага</th>
            <th>Надбавка</th>
            <th>Тиждень</th>
            <th>Дії</th>
        </tr>
        @for($i = 0; $i < count($vaga_data); $i++)
        <tr>
            <td>{{$vaga_data[$i]['date']}}</td>
            <td>{{$vaga_data[$i]['vaga']}}кг</td>
            @if($i == count($vaga_data)-1)
                <td></td>
            @else
            <td>{{$vaga_data[$i]['vaga'] - $vaga_data[$i+1]['vaga']}}кг</td>
            @endif
            <td>{{$vaga_data[$i]['week']}}</td>
            <td class="journal-section__table__action-column">
{{--                <a  class="action-button2">Редагувати</a>--}}
                <a href="{{route('trackers.vagitnist.delete-vaga', ['vaga_id' => $vaga_data[$i]['id']])}}" class="action-button2">Видалити</a>
            </td>
        </tr>
        @endfor
    </table>
</section>

{{--<section class="vaga-graph-section">--}}
{{--    <h3 class="journal-section__title">Графік</h3>--}}
{{--    <img class="vaga-graph-section__graph" src="{{URL::asset('images/graph.png')}}" alt="graph">--}}
{{--</section>--}}

@endsection
