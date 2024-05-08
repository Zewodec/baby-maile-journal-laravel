<!DOCTYPE html>
<html lang="uk" style="height: 100%;">
<head>

    <title>Авторизація</title>
    @include('layouts.link-meta')
</head>
<body class="auth-body">

<header class="auth-header">
    <a href="{{route('index')}}">
    <img src="{{URL::asset('images/logo.png')}}" alt="logo">
    </a>
    <div class="register-login-toggle">
        <div class="switch">
            <input type="checkbox" id="toggle-switch" class="toggle-switch">
            <label for="toggle-switch"></label>
            <div class="circle"></div>
        </div>
        <img id="image-arrow-up" src="{{URL::asset('images/arrow-up.png')}}" alt="arrow">
        <p id="switch-bottom-text" class="register-login-toggle__text">Перейти на форму<br/>входу</p>
    </div>
</header>

<script src="{{URL::asset('js/toggle-switch.js')}}"></script>

<form id="sign-up-form" class="sign-up-form w100percent" action="{{route('auth.register')}}" method="POST">
    <h1 class="h1_anastasia">Реєстрація</h1>
    @csrf
    <input class="input-text input-text_auth" type="text" name="username" placeholder="Ім'я користувача" required>
    <input class="input-text input-text_auth" type="email" name="email" placeholder="Електронна скринька" required>
    <input class="input-text input-text_auth" id="password-register" type="password" name="password" placeholder="Пароль" required>
    <input class="input-text input-text_auth" id="repeat-password-register" type="password" name="password-repeat" placeholder="Повторіть пароль"
           required>

    <button class="action-button" type="submit">Зареєструватися</button>
</form>

<form id="sign-in-form" class="sign-in-form hidden" action="{{route('auth.login')}}" method="POST">
    <h1 class="h1_anastasia">Вхід</h1>
    @csrf
    <input class="input-text input-text_auth" type="text" name="username_or_email"
           placeholder="Ім'я користувача / Електронна скринька" required>
    <input class="input-text input-text_auth" type="password" name="password" placeholder="Пароль" required>

    <button class="action-button" type="submit">Увійти</button>
</form>


<script>
    const password = document.getElementById('password-register');
    const repeatPassword = document.getElementById('repeat-password-register');

    repeatPassword.addEventListener('input', function() {
        if (password.value !== repeatPassword.value) {
            repeatPassword.style.borderColor = 'red';
        } else {
            repeatPassword.style.borderColor = 'green';
        }
    });
</script>
</body>
</html>
