@extends('master')

@section('title', 'Трекери сна немовля')

@section('body-classes', 'decorations')

@section('head')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Intercept form submission
            $('#son-form').submit(function (event) {
                // Prevent default form submission
                event.preventDefault();

                // Serialize form data
                // var formData = $(this).serialize();
                var formData = {
                    _token: '{{ csrf_token() }}',
                    son_time: totalTime / 1000,
                    son_date: $('#date_time_input').val()
                }

                // Send AJAX request
                $.ajax({
                    url: '{{route('trackers.nemovlya.son.save')}}', // URL to submit the form data
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        // Handle success response
                        console.log('Form submitted successfully');
                        // You can display a success message or perform other actions here
                    },
                    error: function (xhr, status, error) {
                        // Handle errors
                        console.error('Form submission failed:', error);
                    }
                });

                // reboot page
                location.reload();
            });
        });
    </script>
@endsection

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

        <form id="son-form" action="{{route("trackers.nemovlya.son.save")}}" method="post">
            <button class="action-button3">Зберегти</button>
        </form>
    </section>
@endsection
