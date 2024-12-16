<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録完了</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
</head>

<body>
    <main class="main">
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
                <li><a href="{{ route('register') }}">Registration</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
            </ul>
        </nav>

        <div class="content">
            <div class="message">
                <p>会員登録ありがとうございます</p>
            </div>
            <div class="sent-confirm">
                <p>登録されたメールアドレスに確認メールを送信しました</p>
            </div>
            <div class="button">
                <a href="{{ route('login') }}">ログインする</a>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/hamburger.js') }}"></script>
</body>

</html>