<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>店舗一覧</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

</head>

<body>
    <main class="main">
        <div class="header">
            <!-- Menu-button and title-logo -->
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
                    @if(Auth::check())
                    <ul>
                        <li><a href="{{ route('root') }}">Home</a></li>
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                        <li><a href="{{ route('mypage') }}">Mypage</a></li>
                    </ul>
                    @else
                    <ul>
                        <li><a href="{{ route('root') }}">Home</a></li>
                        <li><a href="{{ '/register' }}">Registration</a></li>
                        <li><a href="{{ '/login' }}">Login</a></li>
                    </ul>
                    @endif
                </nav>
            </div>
            <form action="{{ route('root') }}" method="get" id="sort-form">
                @csrf
                <div class="sort-selector">
                    <label for="sort" class="sort">並び替え：</label>
                    <select name="sort" id="sort" class="sort" onchange="submit(this.form)">
                        <option value="">選択してください</option>
                        <option value="random">ランダム</option>
                        <option value="high">評価の高い順</option>
                        <option value="low">評価の低い順</option>
                    </select>
                </div>
            </form>
            <form action="/search" method="post" class="search-box">
                @csrf
                <div class="input-form">
                    <div class="select-area">
                        <select name="area" id="">
                            <option value="" selected>All area</option>
                            @foreach ($prefectures as $prefecture)
                            <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="select-genre">
                        <select name="genre" id="">
                            <option value="" selected>All genre</option>
                            @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="glass">
                        <i class="fa-solid fa-magnifying-glass glass-custom"></i>
                    </div>
                    <div class="search-word">
                        <input type="text" name="keyword" placeholder="Search ..." id="">
                    </div>
                    <div class="search-btn">
                        <button type="submit">検索</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="main-content">
            <div class="grid">
                @foreach ($shops as $shop)
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
                                @if ($shop->favorites->isNotEmpty())
                                <form action="/delete-favorite" method="post">
                                    <input type="hidden" name="shop_id" value="{{$shop->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <i class="fa-solid fa-heart heart-active"></i>
                                    </button>
                                </form>
                                @else
                                <form action="/favorite" method="post">
                                    @csrf
                                    <input type="hidden" name="shop_id" value="{{$shop->id}}">
                                    <button type="submit">
                                        <i class="fa-solid fa-heart heart-inactive"></i>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>

    <script src="{{ asset('js/hamburger.js') }}"></script>
</body>

</html>