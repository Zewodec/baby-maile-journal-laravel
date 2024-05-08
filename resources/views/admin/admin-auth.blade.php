<!DOCTYPE html>
<html lang="uk" class="admin-page">
<head>
    @include('layouts.link-meta')
    <title>Авторизація Адміністратора - Baby Mile Journal</title>
</head>
<body class="admin-page admin-auth">
<h1 class="h1_anastasia">Вхід адміністратора</h1>
<form class="admin-auth__form w100percent" action="{{route('admin.login')}}" method="post">
    @csrf
    <label>
        <input class="input-text input-text_auth" type="text" name="username" placeholder="Ім'я користувача" required>
    </label>
    <label>
        <input class="input-text input-text_auth" type="password" name="password" placeholder="Пароль" required>
    </label>
    <button class="action-button w25percent" type="submit">Увійти</button>
</form>
</body>
</html>
