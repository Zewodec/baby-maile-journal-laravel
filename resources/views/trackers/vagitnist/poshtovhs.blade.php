@extends('master')

@section('title', 'Трекер поштовхів')

@section('content')
<h1 class="h1_anastasia text-center">Лічильник поштовхів</h1>

<section class="buttons-section">
    <button class="round-lapa-button">Старт</button>
    <button class="round-lapa-button ds-none">Поштовх</button>
    <button class="round-simple-button ds-none">Стоп</button>
</section>

<section class="journal-section">
    <h3 class="journal-section__title">Журнал</h3>
    <table class="journal-section__table">
        <tr>
            <th>Дата і час</th>
            <th>Тривалість</th>
            <th>Поштовхи</th>
            <th>Дії</th>
        </tr>
        <tr>
            <td>12 квітня, 12:00</td>
            <td>00:02:33</td>
            <td>4</td>
            <td class="journal-section__table__action-column">
                <button class="selected-child__select-btn"><img src="{{URL::asset('images/f-arrow-r2.svg')}}"/></button>
                <button class="action-button3">Видалити</button>
            </td>
        </tr>
        <tr>
            <td>12 квітня, 12:00</td>
            <td>00:02:33</td>
            <td>4</td>
            <td class="journal-section__table__action-column">
                <button class="selected-child__select-btn"><img src="{{URL::asset('images/f-arrow-r2.svg')}}"/></button>
                <button class="action-button3">Видалити</button>
            </td>
        </tr>
        <tr>
            <td>12 квітня, 12:00</td>
            <td>00:02:33</td>
            <td>4</td>
            <td class="journal-section__table__action-column">
                <button class="selected-child__select-btn"><img src="{{URL::asset('images/f-arrow-r2.svg')}}"/></button>
                <button class="action-button3">Видалити</button>
            </td>
        </tr>
    </table>
</section>
@endsection
