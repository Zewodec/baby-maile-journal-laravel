@extends('master')

@section('title', 'Трекери сна немовля')

@section('body-classes', 'decorations')

@section('content')

    <h1 class="h1_anastasia text-center">Сон</h1>

    <section class="setup-time-section">
        <input id="date_time_input" class="input-text" type="datetime-local" placeholder="Дата та час">
        <button id="setup-time" class="action-button3">Встановити час</button>
    </section>

    <script src="{{URL::asset('js/set-now-field.js')}}"></script>

    <section class="goduvanya-grudy-section">
        <div class="total-time">
            <h5>Тривалість:</h5>
            <h5 id="trivalist-time-text">0 с</h5>
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

            let totalTime = 0;

            let startTime;
            let timerInterval;

            function startTimer() {
                startTime = Date.now();
                timerInterval = setInterval(updateTimer, 1000);
            }

            function stopTimer() {
                totalTime += Date.now() - startTime;
                trivalistTimeText.textContent = Math.floor(totalTime / (1000 * 60)) % 60 + " хв";
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
