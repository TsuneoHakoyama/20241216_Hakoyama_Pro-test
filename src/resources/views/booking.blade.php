<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>予約完了</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
</head>

<body>
    <main class="main">
        <!-- Menu-button and title-logo -->
        <div class="title-logo">
            <button class="burger" id="burger">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="logo">
                <a href="#">Rese</a>
            </div>
        </div>
        <nav class="menu" id="menu">
            <ul>
                <li><a href="{{ route('root') }}">Home</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
                <li><a href="{{ '/mypage' }}">Mypage</a></li>
            </ul>
        </nav>

        <!-- Thanks message -->
        <div class="content">
            <div class="message">
                <p>ご予約ありがとうございます</p>
            </div>
            <div class="button">
                <a href="{{ route('root') }}">戻る</a>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/hamburger.js') }}"></script>
</body>

</html>