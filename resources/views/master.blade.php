<!DOCTYPE html>
<html lang="uk">
<head>
    <title>@yield('title', 'BabyMile Journal')</title>
    @include('layouts.link-meta')

    @yield('head')

</head>
<body class="@yield('body-classes', '')">
@include('layouts.header')

@include('layouts.burger-menu')

@include('layouts.dialog.add-child')

@include('layouts.dialog.change-password')

@yield('content')

@include('layouts.footer')

<script src="{{URL::asset('js/burgermenu.js')}}"></script>
@yield('scripts')
</body>
</html>
