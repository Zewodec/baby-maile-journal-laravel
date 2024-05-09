<nav class="burger-menu">
    <div class="burger-menu__header">
        <h1 class="burger-menu__header__title">Головне меню</h1>
        <button class="burger-menu__header__close-btn"><img src="{{URL::asset('images/icon-close.svg')}}"/></button>
    </div>
    <div id="main-menu" class="main-menu">
        <div class="selected-child">
            @if(isset($user['selected_children_id']))
            <div class="selected-child__text">
                <p>{{$children_name}}</p>
                <p>{{$children_age_string}}</p>
            </div>
            @endif
            <div class="selected-child__action-buttons">
                <button id="change-child-button" class="selected-child__select-btn"><img
                        src="{{URL::asset('images/icon-arrow-in-circle.svg')}}"/></button>
            </div>
        </div>
        <ul>
            <li>
                <img src="{{URL::asset('images/lapa-icon2.svg')}}"/>
                <a href="{{route('family.index')}}">Сім'я</a>
            </li>
            <li>
                <img src="{{URL::asset('images/lapa-icon2.svg')}}"/>
                <a href="{{route('rozvytok-dytyny.index')}}">Розвиток дитини</a>
            </li>
            <li>
                <img src="{{URL::asset('images/lapa-icon2.svg')}}"/>
                <a href="{{route('trackers.index')}}">Трекери</a>
            </li>
            <li>
                <img src="{{URL::asset('images/lapa-icon2.svg')}}"/>
                <a href="#">Актуальна інформація</a>
            </li>
            <li>
                <img src="{{URL::asset('images/lapa-icon2.svg')}}"/>
                <a href="#">Календар</a>
            </li>
            <li>
                <img src="{{URL::asset('images/lapa-icon2.svg')}}"/>
                <a href="#">Важливі події</a>
            </li>
            <li>
                <img src="{{URL::asset('images/lapa-icon2.svg')}}"/>
                <a href="#">Форум спілкування</a>
            </li>
            <li>
                <img src="{{URL::asset('images/lapa-icon2.svg')}}"/>
                <a href="#">Налаштування</a>
            </li>

        </ul>
    </div>

    <div id="select-child-menu" class="selection-child-menu hidden">
        @foreach($children as $child)
            <div class="selected-child">
                <a href="{{route('family.select_child', $child->id)}}">
                <div class="selected-child__text">
                    <p>{{$child->name}}</p>
                    <p style="font-size: 32px;">({{$child['birthday']->format('d-m-Y')}})</p>
                </div>
                </a>
                <div class="selected-child__action-buttons">
                    <button class="selected-child__select-btn"><img src="{{URL::asset('images/edit.svg')}}"/></button>
                    <button class="selected-child__select-btn"><img src="{{URL::asset('images/black-hrest.svg')}}"/></button>
                </div>
            </div>
        @endforeach

        <div class="selection-child-menu__action-button-group">
            <button id="add-child-btn" class="action-button2">Додати дитину</button>
            <button id="return-to-main-manu-btn" class="action-button2">Вернутись</button>
        </div>
    </div>
</nav>
