@extends('master')

@section('title', 'Check List')

@section('content')
    <h1 class="h1_anastasia text-center">Чек-лист для безпечної вагітності</h1>

    <section class="cl-section">
        <h3 class="text-bg-line w100percent">Перший триместр</h3>
        <section class="cl-section2">
            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Розпрощатися з шкідливими звичками (паління, алкоголь, надмірне вживання кофеїну
                    та ін.)</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Підтвердити вагітність (зробити тест на вагітність, здати аналіз крові на ХГЛ)</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Консультація гінеколога</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Стати на облік</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Консультація спеціалістів: отоларинголога, офтальмолога, стоматолога, ендокринолога, генетика, психіатра та інших за потребою</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Аналізи (призначаються лікарем за показанням):</p>
            </div>

            <ul class="cl-main-text" style="margin-left: 100px;">
                <li>загальний аналіз крові</li>
                <li>біохімічний аналіз крові: протеїн-А, плазми, вільний бета ХГЛ</li>
                <li>аналіз крові на групу і резус-фактор</li>
                <li>аналіз крові на TORCH-інферкції</li>
                <li>аналізи на антитіла: RW, ВІЛ, вітряна віспа, вірус краснухи та гепатити В і С</li>
                <li>загальний аналіз сечі</li>
                <li>мазок на виявлення статевих інфекцій</li>
            </ul>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">УЗД органів малого тазу, фолікулометрія, гістеросальпінгографія, електрокардіографія (за показанням)</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Вимірення артеріального тиску</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Вимірення товщини комірного простору</p>
            </div>

        </section>

        <h3 class="text-bg-line w100percent">Другий триместр</h3>
        <section class="cl-section2">
            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Консультація гінеколога (кожні 4 тижні)</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Ультразвукове обстеження з метою оцінки анатомії плода</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Вимірення артеріального тиску</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Аналізи (призначаються лікарем за показанням):</p>
            </div>

            <ul class="cl-main-text" style="margin-left: 100px;">
                <li>загальний аналіз крові</li>
                <li>біохімічний аналіз крові: альфа-фетопротеїн, ХГЛ, некон’юнгований естріол, інгібін</li>
                <li>загальний аналіз сечі</li>
            </ul>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Зробити глюкозотолерантний тест для виявлення прихованого діабету вагітних</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">За призначенням лікаря - зробити повторні аналізи та тести</p>
            </div>

        </section>

        <h3 class="text-bg-line w100percent">Третій триместр</h3>
        <section class="cl-section2">
            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Консультація гінеколога (кожні 1-2 тижні)</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Ультразвукове обстеження з метою оцінки анатомії плода</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Вимірення артеріального тиску</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">За призначенням лікаря - зробити повторні аналізи та тести</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Пройти повторні консультації у спеціалістів (офтальмолог, терапевт, стоматолог та ін.)</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Зробити тест на стрептококи групи В</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Вимірювання висоти стояння дна матки і окружності живота</p>
            </div>

        </section>

        <h3 class="text-bg-line w100percent">Список речей в пологовий будинок</h3>
        <section class="cl-section2">
            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Документи для мами (паспорт та його ксерокопія, обмінна карта з результатами аналізів і останнього УЗД і, якщо є, страхування)</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Документи і аналізи людини, яка буде супроводжувати маму в пологах (паспорт, результати флюрографії, аналізів на гепатит і ВІЛ)</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Одяг для мами (резинові тапочки, халат, нічна сорочка, шкарпетки)</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Дитячий одяг на перший час (чіпець, повзунки, сорочечки, шкарпеточки, рукавиці, одноразові або х/б пелюшки)</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Гігієнічні засоби для немовля (декілька підгузників різного розміру, манікюрні дитячі ножиці, пінцет, вата, крем або олія під підгузок без ароматизаторів, вологі серветки)</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Засоби особистої гігієни (гель для душу, шампунь, зубна паста і щітка, гребінець, туалетний папір, паперові рушники, вкладиші для грудей, післяпологові прокладки, вологі серветки, одноразові пелюшки)</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Засоби догляду (зволожуючий крем для тіла, рук і лиця, загоювальний крем або гель для сосків, доглядова косметика)</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Одяг для мами (піжама або нічна сорочка, бюстгалтер для годування, одноразові або бавовняні труси, післяпологовий бандаж або тканина для післяпологового сповивання)</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Посуд (ложка, горнятка, тарілка)</p>
            </div>

            <div class="list-item-text">
                <img src="{{asset('images/tick.png')}}" alt="tick">
                <p class="cl-main-text">Продукти (негазована вода, фрукти, енергетичні батончики, печиво)</p>
            </div>

        </section>


    </section>
@endsection
