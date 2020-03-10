<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?{{ Str::random(16) }}">
    @stack('styles')
    <title>PlayIT —  @yield('title')</title>
</head>
<body>
    <div class="overlay" id="info">
        <div class="close-btn" onclick="closeNav()"><img src="{{ asset('img/cross.svg') }}" alt=""></div>
        <div class="info-project">
            <p>PlayIT - онлайн-квест, приуроченный ко дню рождения факультета Информационных Систем и Технологий.</p>
            <p>Выполняй задания, получай за них флекскоины и трать их в нашем новом разделе «Магазин». Уникальные значки, стикерпаки, силиконовые браслеты - все это и многое другое ждёт тебя!</p>
            <p>Трое участников, заработавших к 16 марта больше всего опыта, получат особенные призы, среди которых вкуснейшие кексы, футболки с уникальным дизайном, носочки, кружки, флеш-накопители и другая техника. Дерзай!</p>
            <p>Также, мы ждем твои поздравления в историях Instagram. Автор самой интересной истории получит отдельный подарок от организаторов!</p>
        </div>
    </div>

    <div class="container ">
        <header>
            @include('layouts.header')
        </header>

        @stack('under_header')

        <div class="row">
            @yield('base')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ asset('js/main.js') }}?{{ Str::random(16) }}"></script>
    @stack('scripts')
</body>
</html>