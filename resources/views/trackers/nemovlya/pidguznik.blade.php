@extends('master')

@section('title', 'Трекери підгузників немовля')

@section('body-classes', 'decorations')

@section('head')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body{
            background-color: #FFF9F4;
        }
    </style>
@endsection

@section('content')

    <h1 class="h1_anastasia text-center">Підгузник</h1>

    @if(session('error'))
        <div class="alert alert-danger w-25 text-center ml-5">{{session('error')}}</div>
    @endif
    @if(session('success'))
        <div class="alert alert-success w-25 text-center ml-5">{{session('success')}}</div>
    @endif

    <section class="goduvanya-type-btns">
        <button onclick="openWetSection()" class="goduvanya-type-btns__button">Мокрий</button>
        <button onclick="openBrydniySection()" class="goduvanya-type-btns__button">Брудний</button>
        <button onclick="openZmishaniySection()" class="goduvanya-type-btns__button">Змішаний</button>
        <button onclick="openSyhiySection()" class="goduvanya-type-btns__button">Сухий</button>
    </section>

    <form method="post" action="{{route('trackers.nemovlya.pidguznik.save')}}">
        @csrf
        <section id="pidguznik-section_wet" class="goduvanya-grudy-section">
            <section class="setup-time-section">
                <input id="date_time_input" class="input-text" type="datetime-local" placeholder="Дата та час"
                       name="datetime">
                <button id="setup-time" class="action-button3" type="button">Встановити час</button>
            </section>

            <hr class="goduvanya-plashechka-section__separator"/>

            <label class="amount-slider">
                Вологість:
                <output for="right-scidjuvanya" id="output-wet-slider">Середньо</output>
                <input id="wet-slider" type="range" min="0" max="5" value="2" name="vologist">
            </label>

            <script>
                const slider = document.getElementById('wet-slider');
                const output = document.getElementById('output-wet-slider');
                output.innerHTML = slider.value;

                slider.oninput = function () {
                    output.innerHTML = this.value;
                }
            </script>

            <input type="hidden" name="type" value="wet">
            <button class="action-button3">Зберегти</button>
        </section>
    </form>

    <form method="post" action="{{route('trackers.nemovlya.pidguznik.save')}}">
        @csrf
        <section id="pidguznik-section_brydniy" class="goduvanya-grudy-section hidden">
            <section class="setup-time-section">
                <input id="date_time_input" class="input-text" type="datetime-local" placeholder="Дата та час"
                       name="datetime">
                <button id="setup-time" class="action-button3" type="button">Встановити час</button>
            </section>

            <hr class="goduvanya-plashechka-section__separator"/>

            <div class="pidguznik-section_brydniy">
                <h3 class="button-group__column__timer">Колір випорожнення:</h3>
                <div class="ingredients-selection__buttons-group pidguznik-section_brydniy__colors">
                    <label>
                        <input name="kaka_color" type="radio" value="Жовтий">
                        Жовтий
                    </label>
                    <label>
                        <input name="kaka_color" type="radio" value="Коричневий" checked>
                        Коричневий
                    </label>
                    <label>
                        <input name="kaka_color" type="radio" value="Світло-зелений">
                        Світло-зелений
                    </label>
                    <label>
                        <input name="kaka_color" type="radio" value="Зелений">
                        Зелений
                    </label>
                    <label>
                        <input name="kaka_color" type="radio" value="Червоний">
                        Червоний
                    </label>
                    <label>
                        <input name="kaka_color" type="radio" value="Чорний">
                        Чорний
                    </label>
                    <label>
                        <input name="kaka_color" type="radio" value="Білий">
                        Білий
                    </label>
                </div>
            </div>

            <input type="hidden" name="type" value="dirty">
            <button class="action-button3">Зберегти</button>
        </section>
    </form>

    <form method="post" action="{{route('trackers.nemovlya.pidguznik.save')}}">
        @csrf
        <section id="pidguznik-section_zmishaniy" class="goduvanya-grudy-section hidden">
            <section class="setup-time-section">
                <input id="date_time_input" class="input-text" type="datetime-local" placeholder="Дата та час"
                       name="datetime">
                <button id="setup-time" class="action-button3" type="button">Встановити час</button>
            </section>

            <hr class="goduvanya-plashechka-section__separator"/>

            <label class="amount-slider">
                Вологість:
                <output for="right-scidjuvanya" id="output-wet2-slider">Середньо</output>
                <input id="2-slider" type="range" min="0" max="5" value="2" name="vologist">
            </label>

            <script>
                const slider2 = document.getElementById('2-slider');
                const output2 = document.getElementById('output-wet2-slider');
                output2.innerHTML = slider2.value;

                slider2.oninput = function () {
                    output2.innerHTML = this.value;
                }
            </script>

            <div class="pidguznik-section_brydniy">
                <h3 class="button-group__column__timer">Колір випорожнення:</h3>
                <div class="ingredients-selection__buttons-group pidguznik-section_brydniy__colors">
                    <label>
                        <input name="kaka_color" type="radio" value="Жовтий">
                        Жовтий
                    </label>
                    <label>
                        <input name="kaka_color" type="radio" value="Коричневий" checked>
                        Коричневий
                    </label>
                    <label>
                        <input name="kaka_color" type="radio" value="Світло-зелений">
                        Світло-зелений
                    </label>
                    <label>
                        <input name="kaka_color" type="radio" value="Зелений">
                        Зелений
                    </label>
                    <label>
                        <input name="kaka_color" type="radio" value="Червоний">
                        Червоний
                    </label>
                    <label>
                        <input name="kaka_color" type="radio" value="Чорний">
                        Чорний
                    </label>
                    <label>
                        <input name="kaka_color" type="radio" value="Білий">
                        Білий
                    </label>
                </div>
            </div>

            <input type="hidden" name="type" value="mixed">
            <button class="action-button3">Зберегти</button>

        </section>
    </form>

    <form method="post" action="{{route('trackers.nemovlya.pidguznik.save')}}">
        @csrf
        <section id="pidguznik-section_syhiy" class="goduvanya-grudy-section hidden">
            <section class="setup-time-section">
                <input id="date_time_input" class="input-text" type="datetime-local" placeholder="Дата та час"
                       name="datetime">
                <button id="setup-time" class="action-button3" type="button">Встановити час</button>
            </section>

            <input type="hidden" name="type" value="dry">
            <button class="action-button3">Зберегти</button>
        </section>
    </form>
@endsection

@section('scripts')
    <script>
        const wetSection = document.getElementById('pidguznik-section_wet');
        const brydniySection = document.getElementById('pidguznik-section_brydniy');
        const zmishaniySection = document.getElementById('pidguznik-section_zmishaniy');
        const syhiySection = document.getElementById('pidguznik-section_syhiy');

        function openWetSection() {
            wetSection.classList.remove('hidden');
            brydniySection.classList.add('hidden');
            zmishaniySection.classList.add('hidden');
            syhiySection.classList.add('hidden');
        }

        function openBrydniySection() {
            wetSection.classList.add('hidden');
            brydniySection.classList.remove('hidden');
            zmishaniySection.classList.add('hidden');
            syhiySection.classList.add('hidden');
        }

        function openZmishaniySection() {
            wetSection.classList.add('hidden');
            brydniySection.classList.add('hidden');
            zmishaniySection.classList.remove('hidden');
            syhiySection.classList.add('hidden');
        }

        function openSyhiySection() {
            wetSection.classList.add('hidden');
            brydniySection.classList.add('hidden');
            zmishaniySection.classList.add('hidden');
            syhiySection.classList.remove('hidden');
        }
    </script>

    <script src="{{asset('js/set-now-field-query.js')}}"></script>
@endsection
