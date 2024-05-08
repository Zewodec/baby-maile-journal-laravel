<!DOCTYPE html>
<html lang="en">
<head>
    <title>Адмін панель</title>
    @include('layouts.link-meta')
</head>
<body>
<header class="admin-header">
    <h3 class="admin-header__title">Перейти до листування</h3>
</header>

<section class="admin-panel">

    <form class="admin-panel__search-form" action="#" method="post">
        <label>
            <input class="input-text" type="text" name="search" placeholder="Ім'я користувача">
        </label>
        <button class="action-button2" type="submit">Пошук</button>
    </form>

    <div class="admin-panel__sort-by">
        <h3 class="admin-panel__sort-by__title">Сортування за:</h3>
        <form class="admin-panel__sort-by__form" action="#" method="post">
            <label class="admin-panel__sort-by__form__label">
                <input class="admin-panel__sort-by__form__radio-btn" type="radio" name="sort" value="username_sort">
                Ім'ям користувача
            </label>
            <label class="admin-panel__sort-by__form__label">
                <input class="admin-panel__sort-by__form__radio-btn" type="radio" name="sort"
                       value="register_date_sort"> Датою реєстрації
            </label>
        </form>
    </div>

    <table class="admin-panel__table">
        <tr>
            <th>Ім'я користувача</th>
            <th>Дата реєстрації</th>
            <th>Дія</th>
        </tr>
        <tr>
            <td>user1</td>
            <td>01.01.2021</td>
            <td>
                <a class="action-button2" href="#">Видалити</a>
            </td>
        </tr>
        <tr>
            <td>user2</td>
            <td>02.01.2021</td>
            <td>
                <a class="action-button2" href="#">Видалити</a>
            </td>
        </tr>
        <tr>
            <td>user3</td>
            <td>03.01.2021</td>
            <td>
                <a class="action-button2" href="#">Видалити</a>
            </td>
        </tr>
        <tr>
            <td>user4</td>
            <td>04.01.2021</td>
            <td>
                <a class="action-button2" href="#">Видалити</a>
            </td>
        </tr>
        <tr>
            <td>user5</td>
            <td>05.01.2021</td>
            <td>
                <a class="action-button2" href="#">Видалити</a>
            </td>
        </tr>
    </table>

    <a class="action-button2" href="#">Показати ще</a>
</section>

</body>
</html>
