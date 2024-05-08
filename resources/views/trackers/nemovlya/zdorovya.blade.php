@extends('master')

@section('title', 'Трекери здоров\'я немовля')

@section('body-classes', 'decorations')

@section('content')

    <h1 class="h1_anastasia text-center">Здоров'я</h1>

    <section class="goduvanya-type-btns">
        <button onclick="openTemperatureSection()" class="goduvanya-type-btns__button">Температура</button>
        <button onclick="openLikySection()" class="goduvanya-type-btns__button">Ліки</button>
        <button onclick="openSymtomesSection()" class="goduvanya-type-btns__button">Симптоми</button>
    </section>

    <section class="setup-time-section">
        <input class="input-text" type="datetime-local" placeholder="Дата та час">
        <button class="action-button3">Встановити час</button>
    </section>

    <section id="temperature-section" class="goduvanya-grudy-section">
        <label class="amount-slider">
            Температура:
            <output for="temperature-range" id="output-temperature-range">36.6 °С</output>
            <input id="temperature-range" type="range" min="33.0" max="42.0" value="36.6">
        </label>

        <button class="action-button3">Зберегти</button>
    </section>

    <section id="liky-section" class="goduvanya-plashechka-section hidden">
        <div class="ingredients-selection">
            <h3 class="ingredients-selection__text">Типи ліків:</h3>
            <div class="ingredients-selection__buttons-group">
                <label>
                    <input type="radio" name="liky-type" onclick="showMedicineField()">
                    медикаменти
                </label>
                <label>
                    <input type="radio" name="liky-type" onclick="showVacineField()">
                    вакцина
                </label>
            </div>
        </div>

        <!--    <hr class="goduvanya-plashechka-section__separator"/>-->

        <div id="liky-section__medicine" class="liky-section__medicine">
            <label class="ingredients-selection__text">
                Медикаменти:
                <input class="input-text" placeholder="Назва медикаменту, доза...">
            </label>
        </div>

        <div id="liky-section__vacine" class="liky-section__vacine ds-none">
            <label class="ingredients-selection__text">
                Вакцина:
                <input class="input-text" placeholder="Назва вакцини, доза...">
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
    </section>


    <section id="symptomes-section" class="goduvanya-tverda-section hidden">


        <div class="liky-section__vacine">
            <label class="ingredients-selection__text">
                <label class="ingredients-selection__text">
                    Симптоми:
                    <input class="input-text" placeholder="Симптоми та їх ступінь">
                </label>
            </label>
        </div>

        <button class="action-button3">Зберегти</button>
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
@endsection
