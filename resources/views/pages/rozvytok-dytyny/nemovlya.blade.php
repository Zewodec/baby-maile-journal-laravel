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
            <button class="arrow right-arrow"><img src="{{URL::asset('images/f-arrow-r.png')}}" alt="right arrow"/>
            </button>
        </div>

        <div class="week-info__group">
            <div class="week-info__group__left">
                <img id="nemovlya-image" class="week-info__group__left__image"
                     src="{{URL::asset('images/rozvitok-dytyny/nemovlya/w1-5.png')}}" alt="week-icon"/>
            </div>
            <div class="week-info__group__right">
                <div id="what-is-going-on-section" class="week-info__group__right__section-info">
                    <div class="week-info__group__right__section-info__header">
                        <h5 class="week-info__group__right__section-info__header__title">Що відбувається</h5>
                        <img class="week-info__group__right__section-info__header__icon-button"
                             src="{{URL::asset('images/plus.svg')}}" alt="plus"/>
                    </div>
                    <p id="what-is-going-on-text" class="week-info__group__right__section-info__text">Цього тижня дитина
                        може виявити, що за рухомими предметами, які рухаються, можна не тільки спостерігати, а й
                        схопити! Так малюк уперше звертає увагу на власну руку, як на інструмент - роздивляється її,
                        чіпає пальчики і тягнеться до всього, що може його зацікавити. Ро
                    </p>
                </div>

                <div id="what-to-do-section" class="week-info__group__right__section-info">
                    <div class="week-info__group__right__section-info__header">
                        <h5 class="week-info__group__right__section-info__header__title">Що робити</h5>
                        <img class="week-info__group__right__section-info__header__icon-button"
                             src="{{URL::asset('images/plus.svg')}}" alt="plus"/>
                    </div>
                    <p id="what-to-do-text" class="week-info__group__right__section-info__text">Перебувати поруч і
                        реагувати на примхи обіймами, розмовою або прикладанням до грудей (найчастіше не заради
                        годування, а для зниження занепокоєння - адже малюк так прагне бути поруч із вами!). Носіть
                        дитину на руках і показуйте навколишній світ, відволікайте іграшка</p>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script src="{{URL::asset('js/week-selector-nemovlya.js')}}"></script>
@endsection
