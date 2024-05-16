<!DOCTYPE html>
<html lang="en">
<head>
    <title>Адмін панель</title>
    @include('layouts.link-meta')
</head>
<body>
<header class="admin-header">
    <h3 class="admin-header__title"><a class="admin-header__title" href="https://mail.theuniverse.cx.ua/">Перейти до
            листування</a></h3>
</header>

<section class="admin-panel">
        <a class="action-button2" href="{{route("auth.logout")}}">Вийти</a>
    <form action="#" method="get">
        <div class="admin-panel__search-form">
            <label>
                <input class="input-text" type="text" name="username_search" placeholder="Ім'я користувача">
            </label>
            <button class="action-button2" type="submit">Пошук</button>
        </div>


        <div class="admin-panel__sort-by">
            <h3 class="admin-panel__sort-by__title">Сортування за:</h3>
            <div class="admin-panel__sort-by__form">
                <label class="admin-panel__sort-by__form__label">
                    <input class="admin-panel__sort-by__form__radio-btn" type="radio" name="sort" value="username_sort"
                           checked>
                    Ім'ям користувача
                </label>
                <label class="admin-panel__sort-by__form__label">
                    <input class="admin-panel__sort-by__form__radio-btn" type="radio" name="sort"
                           value="register_date_sort"> Датою реєстрації
                </label>
            </div>
        </div>
    </form>

    <table class="admin-panel__table">
        <tr>
            <th>Ім'я користувача</th>
            <th>Дата реєстрації</th>
            <th>Дія</th>
        </tr>
        @if(isset($users))
            @foreach($users as $user)
                <tr>
                    <td>{{$user->username}}</td>
                    <td>{{\Carbon\Carbon::parse($user->created_at)->format('d.m.Y')}}</td>
                    <td>
                        <a class="action-button2" href="{{route('admin.user_remove', ['userId' => $user->id])}}">Видалити</a>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>

    {{--    <a class="action-button2" href="#">Показати ще</a>--}}
</section>

</body>
</html>
