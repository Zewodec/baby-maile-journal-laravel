@extends('master')

@section('title', 'Трекери годування немовля')

@section('body-classes', 'decorations')

@section('head')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #FFF9F4;
        }
    </style>
@endsection

@section('content')

    <h1 class="h1_anastasia text-center">Годування</h1>

    <section class="goduvanya-type-btns">
        <button onclick="openGrudySection()" class="goduvanya-type-btns__button">Груди</button>
        <button onclick="openPlashechkaSection()" class="goduvanya-type-btns__button">Пляшечка</button>
        <button onclick="openTverdaSection()" class="goduvanya-type-btns__button">Тверда</button>
    </section>

    @if(session('error'))
        <div class="alert alert-danger w-25 text-center ml-5">{{session('error')}}</div>
    @endif
    @if(session('success'))
        <div class="alert alert-success w-25 text-center ml-5">{{session('success')}}</div>
    @endif

    <form action="{{route('trackers.nemovlya.goduvanya.save.grudy')}}" method="post">
        <section id="goduvanya-grudy-section" class="goduvanya-grudy-section">
            @csrf
            <section class="setup-time-section">
                <input id="date_time_input" class="input-text" type="datetime-local" placeholder="Дата та час"
                       name="datetime">
                <button id="setup-time" class="action-button3" type="button">Встановити час</button>
            </section>

            <div class="total-time">
                <h5>Тривалість:</h5>
                <h5 id="total-time">0 с</h5>
            </div>

            <div class="button-group">
                <div class="button-group__column">
                    <button id="left-scidjuvanya-btn" class="button-group__column__button" type="button">Старт</button>
                    <p id="left-scidjuvanya-time" class="button-group__column__timer">Ліва: 00:00:00</p>
                </div>
                <div class="button-group__column">
                    <button id="right-scidjuvanya-btn" class="button-group__column__button" type="button">Старт</button>
                    <p id="right-scidjuvanya-time" class="button-group__column__timer">Права: 00:00:00</p>
                </div>
            </div>

            <input type="hidden" name="left_time" id="left_time_field">
            <input type="hidden" name="right_time" id="right_time_field">
            <input type="hidden" name="goduvanya_type" value="Груди">


            <button class="action-button3">Зберегти</button>
        </section>
    </form>

    <form action="{{route('trackers.nemovlya.goduvanya.save.plashechka')}}" method="post">
        <section id="goduvanya-plashechka-section" class="goduvanya-plashechka-section hidden">
            @csrf
            <section class="setup-time-section">
                <input id="date_time_input" class="input-text" type="datetime-local" placeholder="Дата та час"
                       name="datetime">
                <button id="setup-time" class="action-button3" type="button">Встановити час</button>
            </section>

            <div class="ingredients-selection">
                <h3 class="ingredients-selection__text">Інгрідієнти:</h3>
                <div class="ingredients-selection__buttons-group">
                    <label>
                        <input type="radio" name="plashechka_type" value="Зціджене" checked>
                        Зціджене
                    </label>
                    <label>
                        <input type="radio" name="plashechka_type" value="Суміш">
                        Суміш
                    </label>
                    <label>
                        <input type="radio" name="plashechka_type" value="інше">
                        інше
                    </label>
                </div>
            </div>

            <hr class="goduvanya-plashechka-section__separator"/>

            <label class="amount-slider">
                Кількість:
                <output for="amount-plashka" id="output-amount-plashka">100 мл</output>
                <input id="amount-plashka" type="range" min="0" max="350" value="100" name="plashechka_amount">
            </label>

            <script>
                const amountPlashka = document.getElementById('amount-plashka');
                const outputAmountPlashka = document.getElementById('output-amount-plashka');

                amountPlashka.addEventListener('input', () => {
                    outputAmountPlashka.textContent = `${amountPlashka.value} мл`;
                });
            </script>

            <div class="button-group">
                <div class="button-group__column">
                    <button id="timer-manager-button" class="button-group__column__button" type="button">Старт</button>
                    <p id="current-count-timer" class="button-group__column__timer">00:00:00</p>
                </div>
            </div>

            <input type="hidden" name="plashechka_time" id="plashechka_time">
            <input type="hidden" name="goduvanya_type" value="plashechka">

            <script>
                const plashechkaTimeField = document.getElementById('plashechka_time');
                const timerManagerButton = document.getElementById('timer-manager-button');
                const currentCountTimer = document.getElementById('current-count-timer');
                const trivalistTimeText = document.getElementById('trivalist-time-text');

                let startTime;
                let timerInterval;
                let totalTimeP = 0;

                function startTimer() {
                    startTime = Date.now();
                    timerInterval = setInterval(updateTimer, 1000);
                }

                function stopTimer() {
                    totalTimeP = Date.now() - startTime;
                    plashechkaTimeField.value = totalTimeP / 1000;
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
    </form>

    <form action="{{route('trackers.nemovlya.goduvanya.save.tverda')}}" method="post">
        <section id="goduvanya-tverda-section" class="goduvanya-tverda-section hidden">
            @csrf
            <section class="setup-time-section">
                <input id="date_time_input" class="input-text" type="datetime-local" placeholder="Дата та час"
                       name="datetime">
                <button id="setup-time" class="action-button3" type="button">Встановити час</button>
            </section>

            <div class="ingredients-tverda-selection">
                <div class="ingredients-tverda-selection__column">
                    <label>
                        <input type="radio" name="group1" value="Овочі">
                        Овочі
                    </label>
                    <label>
                        <input type="radio" name="group1" value="Фрукти">
                        Фрукти
                    </label>
                    <label>
                        <input type="radio" name="group1" value="Молочні продукти" checked>
                        Молочні продукти
                    </label>
                </div>

                <div class="ingredients-tverda-selection__column">
                    <label>
                        <input type="radio" name="group2" value="Злаки" checked>
                        Злаки
                    </label>
                    <label>
                        <input type="radio" name="group2" value="М'ясо">
                        М'ясо
                    </label>
                    <label>
                        <input type="radio" name="group2" value="Злібні вироби">
                        Злібні вироби
                    </label>
                </div>

                <div class="ingredients-tverda-selection__column">
                    <label>
                        <input type="radio" name="group3" value="Риба">
                        Риба
                    </label>
                    <label>
                        <input type="radio" name="group3" value="Добавки">
                        Добавки
                    </label>
                    <label>
                        <input type="radio" name="group3" value="Інше" checked>
                        Інше
                    </label>
                </div>
            </div>

            <hr class="goduvanya-plashechka-section__separator"/>

            <label class="amount-slider">
                Кількість:
                <output for="tverda-amount-slider" id="output-tverda-amount-slider">100 г</output>
                <input id="tverda-amount-slider" type="range" min="0" max="350" value="100">
            </label>

            <script>
                const tverdaAmountSlider = document.getElementById('tverda-amount-slider');
                const outputTverdaAmountSlider = document.getElementById('output-tverda-amount-slider');

                tverdaAmountSlider.addEventListener('input', () => {
                    outputTverdaAmountSlider.textContent = `${tverdaAmountSlider.value} г`;
                });
            </script>

            <div class="button-group">
                <div class="button-group__column">
                    <button id="tverda-timer-btn" class="button-group__column__button" type="button">Старт</button>
                    <p id="tverda-timer-time" class="button-group__column__timer">00:00:00</p>
                </div>
            </div>

            <input type="hidden" name="goduvanya_type" value="tverda">
            <input type="hidden" name="tverda_time" id="tverda_time">
            <button class="action-button3">Зберегти</button>

            <script>
                const tverdaTimeField = document.getElementById('tverda_time');
                const tverdaTimerButton = document.getElementById('tverda-timer-btn');
                const tverdaTimerTime = document.getElementById('tverda-timer-time');

                let startTimeT;
                let timerIntervalT;
                let totalTimeT = 0;

                function startTimerT() {
                    startTimeT = Date.now();
                    timerIntervalT = setInterval(updateTimerT, 1000);
                }

                function stopTimerT() {
                    totalTimeT = Date.now() - startTimeT;
                    tverdaTimeField.value = totalTimeT / 1000;
                    clearInterval(timerIntervalT);
                }

                function updateTimerT() {
                    const elapsedTime = Date.now() - startTimeT;
                    const seconds = Math.floor(elapsedTime / 1000) % 60;
                    const minutes = Math.floor(elapsedTime / (1000 * 60)) % 60;
                    const hours = Math.floor(elapsedTime / (1000 * 60 * 60));
                    tverdaTimerTime.textContent = `${hours < 10 ? '0' : ''}${hours}:${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
                }

                tverdaTimerButton.addEventListener('click', () => {
                    if (tverdaTimerButton.textContent === 'Старт') {
                        tverdaTimerButton.textContent = 'Стоп';
                        startTimerT();
                    } else {
                        tverdaTimerButton.textContent = 'Старт';
                        stopTimerT();
                    }
                });
            </script>
        </section>
    </form>
@endsection

@section('scripts')

    <script>
        const grudySection = document.getElementById('goduvanya-grudy-section');
        const plashechkaSection = document.getElementById('goduvanya-plashechka-section');
        const tverdaSection = document.getElementById('goduvanya-tverda-section');

        function openGrudySection() {
            grudySection.classList.remove('hidden');
            plashechkaSection.classList.add('hidden');
            tverdaSection.classList.add('hidden');
        }

        function openPlashechkaSection() {
            grudySection.classList.add('hidden');
            plashechkaSection.classList.remove('hidden');
            tverdaSection.classList.add('hidden');
        }

        function openTverdaSection() {
            grudySection.classList.add('hidden');
            plashechkaSection.classList.add('hidden');
            tverdaSection.classList.remove('hidden');
        }
    </script>

    <script>
        let totalTime = 0;

        const totalTimeAmount = document.getElementById('total-time');
        const leftTimeField = document.getElementById('left_time_field');
        const rightTimeField = document.getElementById('right_time_field');

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

            leftTimeField.value = totalTimeL / 1000;

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

            rightTimeField.value = totalTimeR / 1000;

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

    <script src="{{URL::asset('js/set-now-field-query.js')}}"></script>
@endsection
