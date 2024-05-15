@extends('master')

@section('title', 'Трекери здоров\'я немовля')

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

    <h1 class="h1_anastasia text-center">Здоров'я</h1>

    @if(session('error'))
        <div class="alert alert-danger w-25 text-center ml-5">{{session('error')}}</div>
    @endif
    @if(session('success'))
        <div class="alert alert-success w-25 text-center ml-5">{{session('success')}}</div>
    @endif

    <section class="goduvanya-type-btns">
        <button onclick="openTemperatureSection()" class="goduvanya-type-btns__button">Температура</button>
        <button onclick="openLikySection()" class="goduvanya-type-btns__button">Ліки</button>
        <button onclick="openSymtomesSection()" class="goduvanya-type-btns__button">Симптоми</button>
    </section>

    <section id="temperature-section" class="goduvanya-grudy-section">
        <form method="post" action="{{route("trackers.nemovlya.zdorovya.save.temp")}}">
            @csrf
            <section class="setup-time-section">
                <input id="date_time_input" class="input-text" type="datetime-local" placeholder="Дата та час"
                       name="datetime">
                <button id="setup-time" class="action-button3" type="button">Встановити час</button>
            </section>

            <label class="amount-slider">
                Температура:
                <output for="temperature-range" id="output-temperature-range">36.6 °С</output>
                <input id="temperature-range" type="range" min="33.0" max="42.0" value="36.6" step="0.1" name="temp">
            </label>

            <script>
                const temperatureRange = document.getElementById('temperature-range');
                const outputTemperatureRange = document.getElementById('output-temperature-range');

                temperatureRange.oninput = function () {
                    outputTemperatureRange.value = this.value + ' °С';
                }
            </script>

            <button class="action-button3">Зберегти</button>
        </form>
    </section>

    <section id="liky-section" class="goduvanya-plashechka-section hidden">
        <form method="post" action="{{route("trackers.nemovlya.zdorovya.save.liky")}}">
            @csrf
            <section class="setup-time-section">
                <input id="date_time_input" class="input-text" type="datetime-local" placeholder="Дата та час"
                       name="datetime">
                <button id="setup-time" class="action-button3" type="button">Встановити час</button>
            </section>

            <div class="ingredients-selection">
                <h3 class="ingredients-selection__text">Типи ліків:</h3>
                <div class="ingredients-selection__buttons-group">
                    <label>
                        <input type="radio" name="liky_type" onclick="showMedicineField()" value="medicaments">
                        медикаменти
                    </label>
                    <label>
                        <input type="radio" name="liky_type" onclick="showVacineField()" value="vacine">
                        вакцина
                    </label>
                </div>
            </div>

            <!--    <hr class="goduvanya-plashechka-section__separator"/>-->

            <div id="liky-section__medicine" class="liky-section__medicine">
                <label class="ingredients-selection__text">
                    Медикаменти:
                    <input class="input-text" placeholder="Назва медикаменту, доза..." name="name_doza_medicament">
                </label>
            </div>

            <div id="liky-section__vacine" class="liky-section__vacine ds-none">
                <label class="ingredients-selection__text">
                    Вакцина:
                    <input class="input-text" placeholder="Назва вакцини, доза..." name="name_doza_vacine">
                </label>
            </div>

            <script>
                const medicineField = document.getElementById('liky-section__medicine');
                const vacineField = document.getElementById('liky-section__vacine');

                function showMedicineField() {
                    medicineField.classList.remove('ds-none');
                    vacineField.classList.add('ds-none');
                }

                function showVacineField() {
                    medicineField.classList.add('ds-none');
                    vacineField.classList.remove('ds-none');
                }
            </script>

            <button class="action-button3">Зберегти</button>
        </form>
    </section>


    <section id="symptomes-section" class="goduvanya-tverda-section hidden">
        <form method="post" action="{{route("trackers.nemovlya.zdorovya.save.symptomes")}}">
            @csrf
            <section class="setup-time-section">
                <input id="date_time_input" class="input-text" type="datetime-local" placeholder="Дата та час"
                       name="datetime">
                <button id="setup-time" class="action-button3" type="button">Встановити час</button>
            </section>

            <div class="liky-section__vacine">
                <label class="ingredients-selection__text">
                    <label class="ingredients-selection__text">
                        Симптоми:
                        <input class="input-text" placeholder="Симптоми та їх ступінь" name="symptomes_stypin">
                    </label>
                </label>
            </div>

            <button class="action-button3">Зберегти</button>
        </form>
    </section>
@endsection

@section('scripts')
    <script>
        const temperatureSection = document.getElementById('temperature-section');
        const likySection = document.getElementById('liky-section');
        const symptomesSection = document.getElementById('symptomes-section');

        function openTemperatureSection() {
            temperatureSection.classList.remove('hidden');
            likySection.classList.add('hidden');
            symptomesSection.classList.add('hidden');
        }

        function openLikySection() {
            temperatureSection.classList.add('hidden');
            likySection.classList.remove('hidden');
            symptomesSection.classList.add('hidden');
        }

        function openSymtomesSection() {
            temperatureSection.classList.add('hidden');
            likySection.classList.add('hidden');
            symptomesSection.classList.remove('hidden');
        }
    </script>

    <script src="{{URL::asset('js/set-now-field-query.js')}}"></script>
@endsection
