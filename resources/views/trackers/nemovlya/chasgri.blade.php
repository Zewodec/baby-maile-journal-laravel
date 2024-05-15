@extends('master')

@section('title', 'Трекери часу гри немовля')

@section('body-classes', 'decorations')

@section('content')

    <h1 class="h1_anastasia text-center">Час гри</h1>

    <section class="setup-time-section">
        <input id="date_time_input" class="input-text" type="datetime-local" placeholder="Дата та час" name="datetime">
        <button id="setup-time" class="action-button3">Встановити час</button>
    </section>

    <script src="{{URL::asset('js/set-now-field.js')}}"></script>

    <section class="chas-gri-section">
        <h2 class="trackers-titles">Активність:</h2>

        <div class="chas-gri-radio-group">
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group" value="Дитяче спілкування">
                Дитяче спілкування
            </label>

            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group" value="Доторкнися і відчуй">
                Доторкнися і відчуй
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group" value="Гра у воді">
                Гра у воді
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group" value="Дитячий масаж">
                Дитячий масаж
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group" value="Повзання до іграшок">
                Повзання до іграшок
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group" value="Ку-ку">
                Ку-ку
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group" value="Ходьба до когось">
                Ходьба до когось
            </label>

            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group" value="Підтягування, щоб сісти">
                Підтягування, щоб сісти
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group" value="Спів дитині">
                Спів дитині
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group" value="Ігри на боці">
                Ігри на боці
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group" value="Пісні з грою на пальцях">
                Пісні з грою на пальцях
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group" value="Читання книг">
                Читання книг
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group" value="Бриання ногами лежачи">
                Бриання ногами лежачи
            </label>

            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group" value="Пісні з рахунком">
                Пісні з рахунком
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group" value="Танці під музику">
                Танці під музику
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group" value="Хватання іграшки">
                Хватання іграшки
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group" value="Ходьба біля опори">
                Ходьба біля опори
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group" value="Час на животі">
                Час на животі
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group" value="Ігри з дзеркалом">
                Ігри з дзеркалом
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group" value="Сенсорний кошик">
                Сенсорний кошик
            </label>
            <label class="radio-btn-style_label">
                <input class="radio-btn-style" type="radio" name="child-activity-radio-group" value="Дитячі пісеньки">
                Дитячі пісеньки
            </label>
        </div>

        <div class="total-time">
            <h5>Тривалість:</h5>
            <h5 id="trivalist-time-text">{{$today_minutes ?? 0}} хв</h5>
        </div>

        <div class="button-group">
            <div class="button-group__column">
                <button id="timer-manager-button" class="button-group__column__button">Старт</button>
                <p id="current-count-timer" class="button-group__column__timer">00:00:00</p>
            </div>
        </div>

        <script>
            const timerManagerButton = document.getElementById('timer-manager-button');
            const currentCountTimer = document.getElementById('current-count-timer');
            const trivalistTimeText = document.getElementById('trivalist-time-text');

            let startTime;
            let timerInterval;
            let totalTime = 0;

            function startTimer() {
                startTime = Date.now();
                timerInterval = setInterval(updateTimer, 1000);
            }

            function stopTimer() {
                totalTime = Date.now() - startTime;
                clearInterval(timerInterval);
            }

            function updateTimer() {
                const elapsedTime = Date.now() - startTime;
                const seconds = Math.floor(elapsedTime / 1000) % 60;
                const minutes = Math.floor(elapsedTime / (1000 * 60)) % 60;
                const hours = Math.floor(elapsedTime / (1000 * 60 * 60));
                currentCountTimer.textContent = `${hours < 10 ? '0' : ''}${hours}:${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            }

            timerManagerButton.addEventListener('click', () => {
                if (timerManagerButton.textContent === 'Старт') {
                    timerManagerButton.textContent = 'Стоп';
                    startTimer();
                } else {
                    timerManagerButton.textContent = 'Старт';
                    stopTimer();
                }
            });

        </script>

        <button class="action-button3">Зберегти</button>
    </section>
@endsection
