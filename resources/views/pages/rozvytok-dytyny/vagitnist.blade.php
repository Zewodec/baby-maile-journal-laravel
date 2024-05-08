@extends('master')

@section('title','Розвиток дитини')

@section('head')
    <link rel="stylesheet" href="{{URL::asset('css/week-selector.css')}}">
@endsection

@section('content')

    <h1 class="h1_anastasia text-center">Тиждень</h1>

    <section class="week-info">
        <div class="week-selector">
            <button class="arrow left-arrow"><img src="{{URL::asset('images/f-arrow-l.png')}}" alt="left-arrow"/>
            </button>
            <div class="week-circle-container">
                <!-- Тут будуть кружечки -->
            </div>
            <button class="arrow right-arrow"><img src="{{URL::asset('images/f-arrow-r.png')}}" alt="right-arrow"/>
            </button>
        </div>

        <div class="week-info__group">
            <div class="week-info__group__left">
                <img id="vagitnist-image" class="week-info__group__left__image"
                     src="{{asset('images/rozvitok-dytyny/weeks/001.jpg')}}" alt="week-icon"/>
                <p id="dovgina-text" class="week-info__group__left__text">Довжина: до 0,1 см</p>
                <p id="vaga-text" class="week-info__group__left__text">Вага: до 0,1 г</p>
            </div>
            <div class="week-info__group__right">
                <div id="maluk-section" class="week-info__group__right__section-info">
                    <div class="week-info__group__right__section-info__header">
                        <h5 class="week-info__group__right__section-info__header__title">Малюк</h5>
                        <img class="week-info__group__right__section-info__header__icon-button"
                             src="{{URL::asset('images/plus.svg')}}"
                             alt="plus"/>
                    </div>
                    <p id="maluk-text" class="week-info__group__right__section-info__text">При обчисленні терміну
                        вагітності часто виникає плутанина: виявляється, що термін, поставлений акушером-гінекологом на
                        два тижні більше, ніж реальний. Чому виникає така різниця?

                        Загальноприйнято вираховувати два терміни, акушерський та ембріональний.

                        Акушерський вважають від першого дня останньої менструації. До цієї дати за формулою Келлера
                        додають 280 днів (40 тижнів) і отримують ПДР, передбачувану дату пологів. Щоб не мучитися зі
                        складанням, можна спростити розрахунок: від дати початку останніх місячних відібрати три місяці
                        і додати сім днів. Усі аналізи, програми ведення вагітності, списки обстежень орієнтуються на
                        акушерський термін, який відраховується по тижнях.

                        Ембріональний термін відраховується з овуляції чи зачаття. Він приблизно на два тижні
                        відрізняється від акушерського терміну. Ембріональний термін безпосередньо залежить від
                        регулярності та тривалості менструального циклу. До того ж це дуже приблизна дата: точний день
                        овуляції або зачаття визначити досить складно. Отже, і точне визначення ембріонального терміну
                        розвитку плоду неможливе.

                        Усупереч поширеній думці, УЗД не може підказати точний термін та дату пологів. Воно лише
                        показує, чи відповідають розміри плоду встановленому «акушерському терміну»
                    </p>
                </div>

                <div id="mama-section" class="week-info__group__right__section-info">
                    <div class="week-info__group__right__section-info__header">
                        <h5 class="week-info__group__right__section-info__header__title">Мама</h5>
                        <img class="week-info__group__right__section-info__header__icon-button"
                             src="{{URL::asset('images/plus.svg')}}"
                             alt="plus"/>
                    </div>
                    <p id="mama-text" class="week-info__group__right__section-info__text">Текст Текст Текст Текст Текст
                        Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст </p>
                </div>

                <div id="useful-section" class="week-info__group__right__section-info">
                    <div class="week-info__group__right__section-info__header">
                        <h5 class="week-info__group__right__section-info__header__title">Корисне та цікаве</h5>
                        <img class="week-info__group__right__section-info__header__icon-button"
                             src="{{URL::asset('images/plus.svg')}}"
                             alt="plus"/>
                    </div>
                    <p id="useful-text" class="week-info__group__right__section-info__text">Текст Текст Текст Текст
                        Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст </p>
                </div>
            </div>
        </div>
    </section>

@endsection



@section('scripts')
    <script src="{{URL::asset('js/week-selector.js')}}"></script>
@endsection
