<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/mypage.css">
</head>

<body>
    <div class="main-board">
        <div class="main-content">
            <div class="book-status">
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
                            <li><a href="{{ route('mypage') }}">Mypage</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="column-title">
                    予約状況
                </div>
                <div class="messages">
                    @if(session('remove_msg'))
                    {{ session('remove_msg')}}
                    @endif
                </div>
                @foreach ($my_bookings as $my_booking)
                @if ($my_booking->bookings->isNotEmpty())
                @foreach ($my_booking->bookings as $booking)
                <div class="book-card">
                    <div class="card-header">
                        <div class="header__inner">
                            <div class="favicon">
                                <i class="fa-regular fa-clock clock-custom"></i>
                            </div>
                            <div class="title">
                                予約{{ $booking->id}}
                            </div>
                        </div>
                        <div class="cancel-btn">
                            <form action="/cancel" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="fa-regular fa-circle-xmark xmark-custom"></i>
                                    <input type="hidden" name="shop_id" value="{{ $my_booking->id }} ">
                                    <input type="hidden" name="booking_id" value="{{ $booking->id }} ">
                            </form>
                        </div>
                    </div>
                    <div class="confirm-window">
                        <table class="description">
                            <tr>
                                <th>Shop</th>
                                <td>{{ $my_booking->name }}</td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td>{{ $booking->date }}</td>
                            </tr>
                            <tr>
                                <th>Time</th>
                                <td>{{ $booking->time }}</td>
                            </tr>
                            <tr>
                                <th>Number</th>
                                <td>{{ $booking->number }}人</td>
                            </tr>
                        </table>
                    </div>
                </div>
                @endforeach
                @endif
                @endforeach
            </div>

            <div class="my-favorite">
                <div class="user-name">
                    {{ Auth::user()->name }}さん
                </div>
                <div class="list-title">
                    お気に入り店舗
                </div>
                <div class="grid">
                    @foreach($my_favorites as $my_favorite)
                    @if ($my_favorite->favorites->isNotEmpty())
                    <div class="shop-card">
                        <div class="shop-image">
                            <img src="{{ $my_favorite->image }}" alt="店舗画像">
                        </div>
                        <div class="shop-info">
                            <div class="shop-name">{{ $my_favorite->name }}</div>
                            <div class="shop-tag">
                                <div class="area-tag">#{{ $my_favorite->prefecture->name }}</div>
                                <div class="genre-tag">#{{ $my_favorite->genre->name }}</div>
                            </div>
                            <div class="more-info">
                                <div class="for-detail">
                                    <div class="for-detail">
                                        <a href="{{ route('detail', ['id' => $my_favorite->id]) }}">詳しくみる</a>
                                    </div>
                                </div>
                                <div class="favorite">
                                    <form action="/delete" method="post">
                                        <input type="hidden" name="shop_id" value="{{$my_favorite->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <i class="fa-solid fa-heart heart-active"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/hamburger.js') }}"></script>
</body>

</html>