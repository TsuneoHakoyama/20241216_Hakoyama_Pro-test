<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者ホーム</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/review.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
</head>

<body>
    <header>
        <div class="header">
            <div class="logo-board">
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
            </div>
            <div class="review-link">
                <li><a href="{{ route('admin.index') }}">管理者ホーム</a></li>
                <li><a href="{{ route('admin.logout') }}">ログアウト</a></li>
            </div>
        </div>
    </header>
    <main>
        <div class="main-board">
            <div class="title">
                <h3>口コミ一覧</h3>
            </div>
            <table class="review">
                <tr>
                    <th>ID</th>
                    <th>ユーザー</th>
                    <th>店舗名</th>
                    <th>評価</th>
                    <th>コメント</th>
                    <th>画像</th>
                    <th>作成日</th>
                    <th>更新日</th>
                    <th></th>
                </tr>
                @foreach($reviews as $review)
                <tr>
                    <td>{{ $review->id }}</td>
                    <td>{{ $review->user->name }}</td>
                    <td>{{ $review->shop->name }}</td>
                    <td>{{ $review->rating }}</td>
                    <td>{{ $review->comment }}</td>
                    <td>{{ $review->image }}</td>
                    <td>{{ $review->created_at }}</td>
                    <td>{{ $review->updated_at }}</td>
                    <td>
                        <form action="{{ route('admin.remove') }}" method="post" class="button">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="id" value="{{ $review->id }}">
                            <button type="submit">削除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </main>
</body>