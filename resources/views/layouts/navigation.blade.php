<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{route('index')}}">
                <h1 class="main-logo"><span>VPS</span>Compare.pro</h1>
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @foreach([
                        [
                            'label' => 'Home',
                            'href' => route('index'),
                            'isActive' => request()->routeIs('index')
                        ],
                        [
                            'label' => 'About',
                            'href' => route('about'),
                            'isActive' => request()->routeIs('about')
                        ],
                        [
                            'label' => 'FAQ',
                            'href' => route('faq'),
                            'isActive' => request()->routeIs('faq')
                        ],
                        [
                            'label' => 'Contact',
                            'href' => route('contact'),
                            'isActive' => request()->routeIs('contact')
                        ],
                    ] as $page)
                        <li class="nav-item pb-xs-2 pb-md-2 pb-lg-0">
                            @if($page['isActive'])
                                <a
                                    class="active nav-link"
                                    aria-current="page"
                                    href="{{$page['href']}}"
                                >
                                    {{$page['label']}}
                                </a>
                            @else
                                <a class="nav-link" href="{{$page['href']}}">{{$page['label']}}</a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
    <div class="ads">
        <div class="container">
            <div class="banner-lg">
                <img class="img-fluid" src="img/headerBanner-lg.png" alt="ad" />
            </div>
            <div style="display: none" class="banner-sm">
                <img class="img-fluid" src="img/headerBanner-sm.png" alt="ad" />
            </div>
        </div>
    </div>
</header>
