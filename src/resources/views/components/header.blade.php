<header>
    <div class="header align-items-center flex">
        <x-burger />
        @if(request()->path() == '/' || request()->path() == 'search')
        <x-search />
        @endif
    </div>
    @if (session('fs_msg'))
    <div class="flash_message">
        {{ session('fs_msg') }}
    </div>
    @endif

    <x-menu />
</header>