<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App css -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{--    Bootstrap --}}
    <title>Nomad Chargers</title>
</head>
<body>

<nav class="nav">
    <div class="container">
        <div class="nav-row">
            <a class="logo" href="/">NomadChargers</a>
            <ul class="nav-list">
                <li class="nav-list__item">
                    <a href="map.html" class="nav-list__link">
                        <i class="fas fa-map nav-link__item-icon"></i>
                        Карта
                    </a>
                </li>
                <li class="nav-list__item">
                    <a href="{{ route('chargers') }}" class="nav-list__link">
                        <i class="fas fa-list nav-link__item-icon"></i>
                        Список
                    </a>
                </li>
                <li class="nav-list__item">
                    <a href="{{ route('favourite.index') }}" class="nav-list__link">
                        <i class="fas fa-heart nav-link__item-icon"></i>
                        Избранное
                    </a>
                </li>
                <li class="nav-list__item">
                    <a href="login.html" class="nav-list__link">
                        <i class="fas fa-user nav-link__item-icon"></i>
                        Профиль
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<footer class="footer">
    <div class="container">
        <div class="footer__wrapper">
            <h2 class="address">Исанова 79 7 этаж</h2>
            <ul class="social">
                <li class="social__item">
                    <a href="#!"><img src="{{ asset('images/icons/instagram.svg') }}" alt=""></a>
                </li>
                <li class="social__item">
                    <a href="#!"><img src="{{ asset('images/icons/facebook.svg') }}" alt=""></a>
                </li>
            </ul>
            <div class="copyright">
                © 2022 NomadChargers
            </div>
        </div>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/main.js') }}"></script>
@yield('scripts')
</body>
</html>
