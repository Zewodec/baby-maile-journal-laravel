@extends('master')

@section('title', 'Актуальна інформація')

@section('content')
    <h1 class="h1_anastasia text-center">Актуальна інформація</h1>

    <section class="ai-section">
        <a href="{{route('actual_info.check_list')}}" style="text-decoration: none;">
            <div class="menu__item">
                <p class="menu__item__text">Чек-лист для безпечної вагітності</p>
                <img class="menu__item__img" src="{{asset('images/circle_arrow.png')}}" alt="arror right">
            </div>
        </a>

        <a href="{{route('actual_info.vpravy')}}" style="text-decoration: none;">
            <div class="menu__item">
                <p class="menu__item__text">Вправи для вагітних</p>
                <img class="menu__item__img" src="{{asset('images/circle_arrow.png')}}" alt="arror right">
            </div>
        </a>

        <a href="{{route('actual_info.poshtovhs')}}" style="text-decoration: none;">
            <div class="menu__item">
                <p class="menu__item__text">Поштовхи дитини</p>
                <img class="menu__item__img" src="{{asset('images/circle_arrow.png')}}" alt="arror right">
            </div>
        </a>

        <a href="{{route('actual_info.goduvanya')}}" style="text-decoration: none;">
            <div class="menu__item">
                <p class="menu__item__text">Годування дитини</p>
                <img class="menu__item__img" src="{{asset('images/circle_arrow.png')}}" alt="arror right">
            </div>
        </a>

        <a href="{{route('actual_info.fiz_psych_rozv_dytyny')}}" style="text-decoration: none;">
            <div class="menu__item">
                <p class="menu__item__text">Фізичний та психічнийрозвиток дитини</p>
                <img class="menu__item__img" src="{{asset('images/circle_arrow.png')}}" alt="arror right">
            </div>
        </a>

        <a href="{{route('actual_info.doglyad')}}" style="text-decoration: none;">
            <div class="menu__item">
                <p class="menu__item__text">Догляд за немовлям</p>
                <img class="menu__item__img" src="{{asset('images/circle_arrow.png')}}" alt="arror right">
            </div>
        </a>

        <a href="{{route('actual_info.vpravy_dity')}}" style="text-decoration: none;">
            <div class="menu__item">
                <p class="menu__item__text">Вправи для дітей</p>
                <img class="menu__item__img" src="{{asset('images/circle_arrow.png')}}" alt="arror right">
            </div>
        </a>

        <a href="{{route('actual_info.odyag')}}" style="text-decoration: none;">
            <div class="menu__item">
                <p class="menu__item__text">Відповідний одяг за віком та погодою</p>
                <img class="menu__item__img" src="{{asset('images/circle_arrow.png')}}" alt="arror right">
            </div>
        </a>

    </section>
@endsection
