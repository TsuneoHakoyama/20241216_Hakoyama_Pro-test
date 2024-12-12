<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>口コミ登録</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/review.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

</head>

<body>
    <div class="main-content">
        <form action="{{ route('record', ['id' => $shop->id]) }} " method="post" enctype="multipart/form-data" accept="image/png, image/jpeg">
            @csrf
            <div class="main-board">
                <div class="shop-detail">
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

                    <div class="introduction">
                        <div class="title">
                            <h2>今回のご利用はいかがでしたか？</h2>
                        </div>
                        <div class="shop-card">
                            <div class="shop-image">
                                <img src="{{ asset($shop->image) }}" alt="店舗画像">
                            </div>
                            <div class="shop-info">
                                <div class="shop-name">{{ $shop->name }}</div>
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

                <div class="review-form">
                    <div class="title">
                        <h3>体験を評価してください</h3>
                    </div>
                    <div class="input-hidden">
                        <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                    </div>
                    <div class="form-rating">
                        <input class="form-rating__input" id="star5" name="rating" type="radio" value="5">
                        <label class="form-rating__label" for="star5">★</label>
                        <input class="form-rating__input" id="star4" name="rating" type="radio" value="4">
                        <label class="form-rating__label" for="star4">★</label>
                        <input class="form-rating__input" id="star3" name="rating" type="radio" value="3">
                        <label class="form-rating__label" for="star3">★</label>
                        <input class="form-rating__input" id="star2" name="rating" type="radio" value="2">
                        <label class="form-rating__label" for="star2">★</label>
                        <input class="form-rating__input" id="star1" name="rating" type="radio" value="1">
                        <label class="form-rating__label" for="star1">★</label>
                    </div>
                    <div class="error-message">
                        @if($errors->has('rating'))
                        {{ $errors->first('rating') }}
                        @endif
                    </div>
                    <div class="title">
                        <h3>口コミを投稿</h3>
                    </div>
                    <div class="input-text">
                        <textarea name="comment" id="" rows="10" cols="40"></textarea>
                    </div>
                    <div class="error-message">
                        @if($errors->has('comment'))
                        {{ $errors->first('comment') }}
                        @endif
                    </div>
                    <div class="title">
                        <h3>画像の追加</h3>
                    </div>
                    <div class="input-image">
                        <div class="image-card">
                            <div class="text__field">
                                <label class="label" for="image">
                                    <input type="file" name="image" id="image">ファイルを選択
                                </label>
                                <p id="upload-file">またはドラッグアンドドロップ</p>
                            </div>
                        </div>
                    </div>
                    <div class="error-message">
                        @if($errors->has('image'))
                        {{ $errors->first('image') }}
                        @endif
                    </div>
                </div>
            </div>
            <div class="submit">
                <button type="submit">口コミを投稿する</button>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/hamburger.js') }}"></script>
    <script src="{{ asset('js/filename.js') }}"></script>
</body>

</html>