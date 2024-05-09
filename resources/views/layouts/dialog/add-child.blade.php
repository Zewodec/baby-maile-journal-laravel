<dialog id="add-child-dialog">
    <div class="burger-menu__header">
        <button id="close-dialog-button" class="burger-menu__header__close-btn"><img src="{{URL::asset('images/icon-close.svg')}}"/>
        </button>
    </div>
    <form class="add-child-dialog__form" action="{{route('family.add_child')}}" method="post">
        @csrf
        <label>
            Ім'я
            <input type="text" placeholder="(ще не знаю)" name="child_name">
        </label>
        <label>
            Стать
            <select name="child_sex">
                <option name="child_sex" value="null">(ще не знаю)</option>
                <option name="child_sex" value="male">Чоловіча</option>
                <option name="child_sex" value="female">Жіноча</option>
            </select>
        </label>
        <label>
            Дата вагітності
            <input type="date" name="vagitnist_date">
        </label>
        <p>або</p>
        <label>
            Дата народження
            <input type="date" name="birthday">
        </label>
        <button class="action-button2" type="submit">Додати дитину</button>
    </form>
</dialog>
