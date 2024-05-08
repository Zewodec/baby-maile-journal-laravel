@extends('master')

@section('title', 'Трекери підгузників немовля')

@section('body-classes', 'decorations')

@section('content')

    <h1 class="h1_anastasia text-center">Підгузник</h1>

    <section class="goduvanya-type-btns">
        <button onclick="openWetSection()" class="goduvanya-type-btns__button">Мокрий</button>
        <button onclick="openBrydniySection()" class="goduvanya-type-btns__button">Брудний</button>
        <button onclick="openZmishaniySection()" class="goduvanya-type-btns__button">Змішаний</button>
        <button onclick="openSyhiySection()" class="goduvanya-type-btns__button">Сухий</button>
    </section>

    <section class="setup-time-section">
        <input class="input-text" type="datetime-local" placeholder="Дата та час">
        <button class="action-button3">Встановити час</button>
    </section>


    <section id="pidguznik-section_wet" class="goduvanya-grudy-section">
        <hr class="goduvanya-plashechka-section__separator"/>

        <label class="amount-slider">
            Вологість:
            <output for="right-scidjuvanya" id="output-wet-slider">Середньо</output>
            <input id="wet-slider" type="range" min="0" max="5" value="2">
        </label>

        <button class="action-button3">Зберегти</button>
    </section>

    <section id="pidguznik-section_brydniy" class="goduvanya-grudy-section hidden">
        <hr class="goduvanya-plashechka-section__separator"/>

        <div class="pidguznik-section_brydniy">
            <h3 class="button-group__column__timer">Колір випорожнення:</h3>
            <div class="ingredients-selection__buttons-group pidguznik-section_brydniy__colors">
                <label>
                    <input name="colir-vyporognenya" type="radio" value="yellow">
                    Жовтий
                </label>
                <label>
                    <input name="colir-vyporognenya" type="radio" value="brown">
                    Коричневий
                </label>
                <label>
                    <input name="colir-vyporognenya" type="radio" value="light_green">
                    Світло-зелений
                </label>
                <label>
                    <input name="colir-vyporognenya" type="radio" value="green">
                    Зелений
                </label>
                <label>
                    <input name="colir-vyporognenya" type="radio" value="red">
                    Червоний
                </label>
                <label>
                    <input name="colir-vyporognenya" type="radio" value="black">
                    Чорний
                </label>
                <label>
                    <input name="colir-vyporognenya" type="radio" value="white">
                    Білий
                </label>
            </div>
        </div>

        <button class="action-button3">Зберегти</button>
    </section>

    <section id="pidguznik-section_zmishaniy" class="goduvanya-grudy-section hidden">

        <hr class="goduvanya-plashechka-section__separator"/>

        <label class="amount-slider">
            Вологість:
            <output for="right-scidjuvanya" id="output-wet2-slider">Середньо</output>
            <input id="2-slider" type="range" min="0" max="5" value="2">
        </label>

        <div class="pidguznik-section_brydniy">
            <h3 class="button-group__column__timer">Колір випорожнення:</h3>
            <div class="ingredients-selection__buttons-group pidguznik-section_brydniy__colors">
                <label>
                    <input name="colir-vyporognenya" type="radio" value="yellow">
                    Жовтий
                </label>
                <label>
                    <input name="colir-vyporognenya" type="radio" value="brown">
                    Коричневий
                </label>
                <label>
                    <input name="colir-vyporognenya" type="radio" value="light_green">
                    Світло-зелений
                </label>
                <label>
                    <input name="colir-vyporognenya" type="radio" value="green">
                    Зелений
                </label>
                <label>
                    <input name="colir-vyporognenya" type="radio" value="red">
                    Червоний
                </label>
                <label>
                    <input name="colir-vyporognenya" type="radio" value="black">
                    Чорний
                </label>
                <label>
                    <input name="colir-vyporognenya" type="radio" value="white">
                    Білий
                </label>
            </div>
        </div>

        <button class="action-button3">Зберегти</button>

    </section>

    <section id="pidguznik-section_syhiy" class="goduvanya-grudy-section hidden">
        <button class="action-button3">Зберегти</button>
    </section>
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
@endsection
