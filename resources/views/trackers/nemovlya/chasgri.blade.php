@extends('master')

@section('title', 'Трекери часу гри немовля')

@section('body-classes', 'decorations')

@section('content')

    <h1 class="h1_anastasia text-center">Час гри</h1>

    <section class="setup-time-section">
        <input class="input-text" type="datetime-local" placeholder="Дата та час">
        <button class="action-button3">Встановити час</button>
    </section>

    <section class="chas-gri-section">
        <h2 class="trackers-titles">Активність:</h2>

        <div class="chas-gri-radio-group">
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group">
                Дитяче спілкування
            </label>

            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group">
                Доторкнися і відчуй
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group">
                Гра у воді
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group">
                Дитячий масаж
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group">
                Повзання до іграшок
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group">
                Ку-ку
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group">
                Ходьба до когось
            </label>

            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group">
                Підтягування, щоб сісти
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group">
                Спів дитині
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group">
                Ігри на боці
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group">
                Пісні з грою на пальцях
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group">
                Читання книг
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group">
                Бриання ногами лежачи
            </label>

            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group">
                Пісні з рахунком
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group">
                Танці під музику
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group">
                Хватання іграшки
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group">
                Ходьба біля опори
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group">
                Час на животі
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group">
                Ігри з дзеркалом
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group">
                Сенсорний кошик
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group">
                Дитячі пісеньки
            </label>
        </div>

        <div class="total-time">
            <h5>Тривалість:</h5>
            <h5>0 с</h5>
        </div>

        <div class="button-group">
            <div class="button-group__column">
                <button class="button-group__column__button">Старт</button>
                <p class="button-group__column__timer">00:00:00</p>
            </div>
        </div>

        <button class="action-button3">Зберегти</button>
    </section>
@endsection
