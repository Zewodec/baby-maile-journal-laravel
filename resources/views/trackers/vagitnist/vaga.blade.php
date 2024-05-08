@extends('master')

@section('title', 'Трекер Ваги')

@section('body-classes', 'tracker-vaga-body')

@section('content')
<h1 class="h1_anastasia text-center">Трекер ваги</h1>
<h3 class="current-vaga">Поточна вага: 60кг</h3>
<section class="add-vaga-section">
    <form class="add-vaga-form">
        <input class="input-text w100percent" type="text" placeholder="Введіть нову вагу, кг">
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
        <tr>
            <td>12 квітня</td>
            <td>60кг</td>
            <td>+1кг</td>
            <td>12</td>
            <td class="journal-section__table__action-column">
                <button class="action-button2">Редагувати</button>
                <button class="action-button2">Видалити</button>
            </td>
        </tr>
        <tr>
            <td>10 квітня</td>
            <td>59кг</td>
            <td>+1кг</td>
            <td>12</td>
            <td class="journal-section__table__action-column">
                <button class="action-button2">Редагувати</button>
                <button class="action-button2">Видалити</button>
            </td>
        </tr>
        <tr>
            <td>8 квітня</td>
            <td>58кг</td>
            <td>+1кг</td>
            <td>12</td>
            <td class="journal-section__table__action-column">
                <button class="action-button2">Редагувати</button>
                <button class="action-button2">Видалити</button>
            </td>
        </tr>
    </table>
</section>

<section class="vaga-graph-section">
    <h3 class="journal-section__title">Графік</h3>
    <img class="vaga-graph-section__graph" src="{{URL::asset('images/graph.png')}}" alt="graph">
</section>

@endsection
