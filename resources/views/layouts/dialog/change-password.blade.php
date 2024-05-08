<dialog id="change-password">
    <div class="burger-menu__header">
        <button id="close-change-password-dialog-button" class="burger-menu__header__close-btn"><img src="{{URL::asset('images/icon-close.svg')}}"/>
        </button>
    </div>
    <form class="change-password__form">
        <label>
            Введіть старий пароль:
            <input class="input-text" type="password" placeholder="Старий пароль">
        </label>
        <label>
            Введіть новий пароль:
            <input class="input-text"  type="password" placeholder="Новий пароль">
        </label>
        <label>
            Підтвердіть новий пароль:
            <input class="input-text"  type="password" placeholder="Підтвердження нового паролю">
        </label>
        <button class="action-button2" type="submit">Змінити</button>
    </form>
</dialog>
