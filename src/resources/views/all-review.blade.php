<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>口コミ一覧</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all-review.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
</head>

<body>
    <div class="main-content">
        <div class="header__wrapper-title">
            <div class="title-logo">
                <button class="burger" id="burger">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
            <div class="logo">
                <a href="#">Rese</a>
            </div>
            <nav class="menu" id="menu">
                <ul>
                    <li><a href="{{ route('root') }}">Home</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                    <li><a href="{{ '/mypage' }}">Mypage</a></li>
                </ul>
            </nav>
        </div>

        <div class="main-board">
            <div class="shop-detail">
                <div class="introduction">
                    <div class="shop-name">
                        <h2>{{ $shop->name }}</h2>
                    </div>
                    <div class="shop-card">
                        <div class="shop-image">
                            <img src="{{ asset($shop->image) }}" alt="店舗画像">
                        </div>
                        <div class="shop-info">
                            <div class="shop-tag">
                                <div class="area-tag">#{{ $shop->prefecture->name }}</div>
                                <div class="genre-tag">#{{ $shop->genre->name }}</div>
                            </div>
                            <div class="more-info">
                                <div class="for-detail">
                                    <a href="{{ route('detail', ['id' => $shop->id]) }}">詳しくみる</a>
                                </div>
                                <div class="favorite">
                                    <i class="fa-solid fa-heart heart-inactive"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="review-view">
                <div class="title">
                    <h3>みんなの評価</h3>
                </div>
                @foreach($reviews as $review)
                <div class="review-card">
                    <div class="user-name">{{ $review->user->name }}</div>
                    <div class="rating">
                        <p>
                            <span class="star5_rating" data-rate="{{ $review->rating }}"></span>
                        </p>
                    </div>
                    <div class="comment">{{ $review->comment }}</div>
                    <div class="image">{{ $review->image }}</div>
                </div>
                @endforeach
            </div>
        </div>
        <script src="{{ asset('js/hamburger.js') }}"></script>
</body>

</html>