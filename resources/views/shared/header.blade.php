<header class="header">
    <a href="/" class="header__logo">
        <img src="/images/common/logo.png" alt="SAMA">
    </a>

    <nav class="header__nav">
        <ul>
            @foreach ($treeMenu as $menu)
            <li class="header__nav--item">

                @if (strlen($menu->url) > 2)
                    <a href="{{ $menu->url }}"><span>{{ $menu->name }}</span></a>
                @else
                    <span>{{ $menu->name }}</span>
                @endif


                @if(isset($menu->children) && count($menu->children) > 0)
                    <ol class="header__nav--submenu">
                        @foreach($menu->children as $children)
                        <li><a href="{{ $children->url }}">{{ $children->name }}</a></li>
                        @endforeach
                    </ol>
                @endif
            </li>
            @endforeach
        </ul>
    </nav>

    <div class="header__m-nav">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="header__m-nav--gnb">
        <div class="header__m-nav--gnb__top">
            <h2>SAMA</h2>
            <button type="button" class="close-btn">닫기</button>
        </div>
        <ul class="header__m-nav--gnb__list">
            @foreach ($treeMenu as $menu)
            <li class="header__m-nav--gnb__item menu">
                @if(isset($menu->children) && count($menu->children) > 0)
                    <div class="menu__title"><a href="">{{ $menu->name }}</a></div>
                    <ul class="menu__sub">
                        @foreach($menu->children as $children)
                        <li><a href="{{ $children->url }}">{{ $children->name }}</a></li>
                        @endforeach
                    </ul>
                @else
                    <span class="menu__title"><a href="{{ $menu->url }}">{{ $menu->name }}</a></span>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
    <div class="gnb-mask"></div>

    <div class="header__search">
        <ul>
            <li class="language__kor"><a href="#">KOR</a></li>
            <li class="language__eng"><a href="#">ENG</a></li>
        </ul>
        <!-- <input type="text"> -->
        <button type="submit" class="btn-search">검색</button>
    </div>

    <div class="header-search">
        <div class="header-search__box">
            <form action="/other/search" method="get">
                <div class="header-search__box--input">
                    <input type="text" name="keyword" placeholder="검색어를 입력해주세요">
                    <button type="submit" class="header-search__box--button">검색</button>
                </div>
            </form>
            <button type="button" class="header-search__box--close">닫기</button>
        </div>
    </div>
</header>
