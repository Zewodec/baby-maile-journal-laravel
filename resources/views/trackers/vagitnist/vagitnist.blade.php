@extends('master')

@section('title', 'Трекер Вагітності')

@section('content')

<h1 class="h1_anastasia text-center">Трекери</h1>

<section class="tracker-vagitnosti-section">
    <div class="tracker-vagitnosti-section__item">
        <div class="tracker-vagitnosti-section__item__text-group">
            <h3 class="tracker-vagitnosti-section__item__text-group__title">Трекер ваги</h3>

            <div class="tracker-vagitnosti-section__item__text-group__info">
                <p class="tracker-vagitnosti-section__item__text-group__info__head">Поточна вага</p>
                <p class="tracker-vagitnosti-section__item__text-group__info__text">{{$vaga}} кг</p>
            </div>

            <div class="tracker-vagitnosti-section__item__text-group__info">
                <p class="tracker-vagitnosti-section__item__text-group__info__head">Надбавка</p>
                <p class="tracker-vagitnosti-section__item__text-group__info__text">{{$nadbavka}} кг</p>
            </div>
        </div>
        <img class="tracker-vagitnosti-section__item__text-group__image" src="{{URL::asset('images/woman.png')}}" alt="woman">
        <div class="tracker-vagitnosti-section__item__text-group__btn-div">
            <a class="tracker-vagitnosti-section__item__text-group__btn-div__icon-btn"
               href="{{route('trackers.vagitnist.vaga')}}"><img src="{{URL::asset('images/arrow-in-circle.svg')}}"></a>
        </div>
    </div>

    <div class="tracker-vagitnosti-section__item">
        <div class="tracker-vagitnosti-section__item__text-group">
            <h3 class="tracker-vagitnosti-section__item__text-group__title">Лічильник поштовхів</h3>

            <div class="tracker-vagitnosti-section__item__text-group__info">
                <p class="tracker-vagitnosti-section__item__text-group__info__head">Сьогодні зафіксовано</p>
                <p class="tracker-vagitnosti-section__item__text-group__info__text">0 поштовхів</p>
            </div>

            <div class="tracker-vagitnosti-section__item__text-group__info">
                <p class="tracker-vagitnosti-section__item__text-group__info__head">Тривалість</p>
                <p class="tracker-vagitnosti-section__item__text-group__info__text">00:00:00</p>
            </div>
        </div>
        <img class="tracker-vagitnosti-section__item__text-group__image" src="{{URL::asset('images/rozvitok-dytyny/vagitnist.png')}}"
             alt="woman">
        <div class="tracker-vagitnosti-section__item__text-group__btn-div">
            <a class="tracker-vagitnosti-section__item__text-group__btn-div__icon-btn"
               href="{{route('trackers.vagitnist.poshtovhs')}}"><img src="{{URL::asset('images/arrow-in-circle.svg')}}"></a>
        </div>

    </div>

</section>
@endsection
