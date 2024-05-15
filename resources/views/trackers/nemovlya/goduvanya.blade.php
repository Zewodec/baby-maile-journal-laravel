@extends('master')

@section('title', 'Трекери годування немовля')

@section('body-classes', 'decorations')

@section('content')

    <h1 class="h1_anastasia text-center">Годування</h1>

    <section class="goduvanya-type-btns">
        <button onclick="openGrudySection()" class="goduvanya-type-btns__button">Груди</button>
        <button onclick="openPlashechkaSection()" class="goduvanya-type-btns__button">Пляшечка</button>
        <button onclick="openTverdaSection()" class="goduvanya-type-btns__button">Тверда</button>
    </section>

    <section class="setup-time-section">
        <input id="date_time_input" class="input-text" type="datetime-local" placeholder="Дата та час">
        <button id="setup-time" class="action-button3">Встановити час</button>
    </section>

    <script src="{{URL::asset('js/set-now-field.js')}}"></script>

    <section id="goduvanya-grudy-section" class="goduvanya-grudy-section">
        <div class="total-time">
            <h5>Тривалість:</h5>
            <h5>0 с</h5>
        </div>

        <div class="button-group">
            <div class="button-group__column">
                <button class="button-group__column__button">Старт</button>
                <p class="button-group__column__timer">Ліва: 00:00:00</p>
            </div>
            <div class="button-group__column">
                <button class="button-group__column__button">Старт</button>
                <p class="button-group__column__timer">Права: 00:00:00</p>
            </div>
        </div>

        <button class="action-button3">Зберегти</button>
    </section>

    <section id="goduvanya-plashechka-section" class="goduvanya-plashechka-section hidden">
        <div class="ingredients-selection">
            <h3 class="ingredients-selection__text">Інгрідієнти:</h3>
            <div class="ingredients-selection__buttons-group">
                <label>
                    <input type="radio" name="plashechka-type">
                    Зціджене
                </label>
                <label>
                    <input type="radio" name="plashechka-type">
                    Суміш
                </label>
                <label>
                    <input type="radio" name="plashechka-type">
                    інше
                </label>
            </div>
        </div>

        <hr class="goduvanya-plashechka-section__separator"/>

        <label class="amount-slider">
            Кількість:
            <output for="amount-plashka" id="output-amount-plashka">100</output>
            <input id="amount-plashka" type="range" min="0" max="350" value="100">
        </label>

        <div class="total-time">
            <h5 class="total-time__text">Тривалість:</h5>
            <h5 class="total-time__time">0 с</h5>
        </div>

        <div class="button-group">
            <div class="button-group__column">
                <button class="button-group__column__button">Старт</button>
                <p class="button-group__column__timer">00:00:00</p>
            </div>
        </div>

        <button class="action-button3">Зберегти</button>
    </section>


    <section id="goduvanya-tverda-section" class="goduvanya-tverda-section hidden">
        <div class="ingredients-tverda-selection">
            <div class="ingredients-tverda-selection__column">
                <label>
                    <input type="radio" name="group1">
                    Овочі
                </label>
                <label>
                    <input type="radio" name="group1">
                    Фрукти
                </label>
                <label>
                    <input type="radio" name="group1">
                    Молочні продукти
                </label>
            </div>

            <div class="ingredients-tverda-selection__column">
                <label>
                    <input type="radio" name="group2">
                    Злаки
                </label>
                <label>
                    <input type="radio" name="group2">
                    М'ясо
                </label>
                <label>
                    <input type="radio" name="group2">
                    Злібні вироби
                </label>
            </div>

            <div class="ingredients-tverda-selection__column">
                <label>
                    <input type="radio" name="group3">
                    Риба
                </label>
                <label>
                    <input type="radio" name="group3">
                    Добавки
                </label>
                <label>
                    <input type="radio" name="group3">
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

        <div class="total-time">
            <h5 class="total-time__text">Тривалість:</h5>
            <h5 class="total-time__time">0 с</h5>
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
@endsection
