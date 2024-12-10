<div class="search">
    <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
    <form class="flex" action="/search" method="GET">
        @csrf
        <div class="search__pull-down">
            <select name="area">
                <option value="">All area</option>
                @foreach($prefectures as $prefecture)
                @if (!empty($$area_name))
                @if ($prefecture->name === $area_name)
                <option value="{!! $prefecture->name !!}" selected>
                    {{$prefecture->name}}
                </option>
                @else
                <option value="{!! $prefecture->name !!}">
                    {{$prefecture->name}}
                </option>
                @endif
                @else
                <option value="{!! $prefecture->name !!}">
                    {{$prefecture->name}}
                </option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="search__pull-down">
            <select name="genre">
                <option value="">All genre</option>
                @foreach($genres as $genre)
                @if (!empty($genre_name))
                @if ($genre->name === $genre_name)
                <option value="{!! $genre->name !!}" selected>
                    {{$genre->name}}
                </option>
                @else
                <option value="{!! $genre->name !!}">
                    {{$genre->name}}
                </option>
                @endif
                @else
                <option value="{!! $genre->name !!}">
                    {{$genre->name}}
                </option>
                @endif
                @endforeach
            </select>
        </div>
        <input class="search__keyword" type="text" placeholder="Search ..." value="{!! $keyword ?? '' !!}" name="keyword" />
        <input type="submit" class="search__btn" value="検索" />
    </form>
</div>