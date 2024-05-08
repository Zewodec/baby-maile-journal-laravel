<dialog id="add-child-dialog">
    <div class="burger-menu__header">
        <button id="close-dialog-button" class="burger-menu__header__close-btn"><img src="{{URL::asset('images/icon-close.svg')}}"/>
        </button>
    </div>
    <form class="add-child-dialog__form">
        <label>
            Ім'я
            <input type="text" placeholder="(ще не знаю)">
        </label>
        <label>
            Стать
            <select>
                <option>(ще не знаю)</option>
                <option>Чоловіча</option>
                <option>Жіноча</option>
            </select>
        </label>
        <label>
            Дата вагітності
            <input type="date">
        </label>
        <p>або</p>
        <label>
            Дата народження
            <input type="date">
        </label>
        <button class="action-button2" type="submit">Додати дитину</button>
    </form>
</dialog>
