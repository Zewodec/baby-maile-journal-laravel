@extends('master')

@section('title', 'Трекери зціджування')

@section('body-classes', 'decorations')

@section('head')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body{
            background-color: #f5f5f5;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Intercept form submission
            $('#zcidjuvanya-form').submit(function (event) {
                // Prevent default form submission
                event.preventDefault();

                // Serialize form data
                // var formData = $(this).serialize();
                var formData = {
                    _token: '{{ csrf_token() }}',
                    left_time: totalTimeL / 1000,
                    right_time: totalTimeR / 1000,
                    left_amount: leftScidjuvanya.value,
                    right_amount: rightScidjuvanya.value,
                    datetime: $('#date_time_input').val()
                }

                // Send AJAX request
                $.ajax({
                    url: '{{route("trackers.nemovlya.zcidjuvanya.save")}}', // URL to submit the form data
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        // Handle success response
                        console.log('Form submitted successfully');
                        const infoAlert = document.getElementById('info-alert');
                        infoAlert.classList.add('alert-success');
                        infoAlert.textContent = 'Дані успішно збережено';
                        // You can display a success message or perform other actions here
                    },
                    error: function (xhr, status, error) {
                        // Handle errors
                        console.error('Form submission failed:', error);
                        const infoAlert = document.getElementById('info-alert');
                        infoAlert.classList.add('alert-danger');
                        infoAlert.textContent = 'Помилка при збереженні даних';
                    }
                });

                // reboot page
                setTimeout(function(){
                    location.reload();
                }, 3000);
            });
        });
    </script>
@endsection

@section('content')

    <div id="info-alert" class="alert w-25 ml-5 text-center"></div>
    <h1 class="h1_anastasia text-center">Зціджування</h1>
    <section class="setup-time-section">
        <input id="date_time_input" class="input-text" type="datetime-local" placeholder="Дата та час">
        <button id="setup-time" class="action-button3">Встановити час</button>
    </section>

    <script src="{{URL::asset('js/set-now-field.js')}}"></script>

    <section class="zcidjuvanya-section">
        <div class="total-time">
            <h5>Кількість:</h5>
            <h5 id="full-amount-scidjuvanya">200 мл</h5>
        </div>

        <label class="amount-slider">
            Кількість (ліва):
            <output for="left-scidjuvanya" id="output-left-scidjuvanya">100 мл</output>
            <input id="left-scidjuvanya" type="range" min="0" max="500" value="100" name="left-amount">
        </label>

        <label class="amount-slider">
            Кількість (права):
            <output for="right-scidjuvanya" id="output-right-scidjuvanya">100 мл</output>
            <input id="right-scidjuvanya" type="range" min="0" max="500" value="100" name="right-amount">
        </label>

        <script>
            const leftScidjuvanya = document.getElementById('left-scidjuvanya');
            const rightScidjuvanya = document.getElementById('right-scidjuvanya');

            const outputLeftScidjuvanya = document.getElementById('output-left-scidjuvanya');
            const outputRightScidjuvanya = document.getElementById('output-right-scidjuvanya');

            const fullAmountScidjuvanya = document.getElementById('full-amount-scidjuvanya');

            leftScidjuvanya.addEventListener('input', () => {
                outputLeftScidjuvanya.textContent = `${leftScidjuvanya.value} мл`;
                fullAmountScidjuvanya.textContent = `${parseInt(leftScidjuvanya.value) + parseInt(rightScidjuvanya.value)} мл`;
            });

            rightScidjuvanya.addEventListener('input', () => {
                outputRightScidjuvanya.textContent = `${rightScidjuvanya.value} мл`;
                fullAmountScidjuvanya.textContent = `${parseInt(leftScidjuvanya.value) + parseInt(rightScidjuvanya.value)} мл`;
            });

        </script>

        <div class="total-time">
            <h5>Тривалість:</h5>
            <h5 id="total-time">0 с</h5>
        </div>

        <div class="button-group">
            <div class="button-group__column">
                <button id="left-scidjuvanya-btn" class="button-group__column__button">Старт</button>
                <p id="left-scidjuvanya-time" class="button-group__column__timer">Ліва: 00:00:00</p>
            </div>
            <div class="button-group__column">
                <button id="right-scidjuvanya-btn" class="button-group__column__button">Старт</button>
                <p id="right-scidjuvanya-time" class="button-group__column__timer">Права: 00:00:00</p>
            </div>
        </div>

        <script>
            let totalTime = 0;

            const totalTimeAmount = document.getElementById('total-time');

            // TIMER LEFT
            const leftCountTimer = document.getElementById('left-scidjuvanya-time');
            const leftTimerManagerButton = document.getElementById('left-scidjuvanya-btn');

            let startTimeL;
            let timerIntervalL;
            let totalTimeL = 0;

            function startTimerL() {
                startTimeL = Date.now();
                timerIntervalL = setInterval(updateTimerL, 1000);
            }

            function stopTimerL() {
                totalTimeL = Date.now() - startTimeL;
                totalTime = totalTimeL + totalTimeR;

                const seconds = Math.floor(totalTime / 1000) % 60;
                const minutes = Math.floor(totalTime / (1000 * 60)) % 60;

                totalTimeAmount.textContent = `${minutes} хв ${seconds} c`
                clearInterval(timerIntervalL);
            }

            function updateTimerL() {
                const elapsedTime = Date.now() - startTimeL;
                const seconds = Math.floor(elapsedTime / 1000) % 60;
                const minutes = Math.floor(elapsedTime / (1000 * 60)) % 60;
                const hours = Math.floor(elapsedTime / (1000 * 60 * 60));
                leftCountTimer.textContent = `Ліва: ${hours < 10 ? '0' : ''}${hours}:${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            }

            leftTimerManagerButton.addEventListener('click', () => {
                if (leftTimerManagerButton.textContent === 'Старт') {
                    leftTimerManagerButton.textContent = 'Стоп';
                    startTimerL();
                } else {
                    leftTimerManagerButton.textContent = 'Старт';
                    stopTimerL();
                }
            });

            // TIMER RIGHT
            const rightCountTimer = document.getElementById('right-scidjuvanya-time');
            const rightTimerManagerButton = document.getElementById('right-scidjuvanya-btn');

            let startTimeR;
            let timerIntervalR;
            let totalTimeR = 0;

            function startTimerR() {
                startTimeR = Date.now();
                timerIntervalR = setInterval(updateTimerR, 1000);
            }

            function stopTimerR() {
                totalTimeR = Date.now() - startTimeR;
                totalTime = totalTimeL + totalTimeR;

                const seconds = Math.floor(totalTime / 1000) % 60;
                const minutes = Math.floor(totalTime / (1000 * 60)) % 60;

                totalTimeAmount.textContent = `${minutes} хв ${seconds} c`
                clearInterval(timerIntervalR);
            }

            function updateTimerR() {
                const elapsedTime = Date.now() - startTimeR;
                const seconds = Math.floor(elapsedTime / 1000) % 60;
                const minutes = Math.floor(elapsedTime / (1000 * 60)) % 60;
                const hours = Math.floor(elapsedTime / (1000 * 60 * 60));
                rightCountTimer.textContent = `Права: ${hours < 10 ? '0' : ''}${hours}:${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            }

            rightTimerManagerButton.addEventListener('click', () => {
                if (rightTimerManagerButton.textContent === 'Старт') {
                    rightTimerManagerButton.textContent = 'Стоп';
                    startTimerR();
                } else {
                    rightTimerManagerButton.textContent = 'Старт';
                    stopTimerR();
                }
            });

        </script>

        <form id="zcidjuvanya-form" action="{{route("trackers.nemovlya.zcidjuvanya.save")}}" method="post">
        <button class="action-button3">Зберегти</button>
        </form>
    </section>
@endsection
