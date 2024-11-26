<header class="header-area">
    <div class="main-menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box-1620">
                <a wire:navigate class="navbar-brand logo-h" href="{{ route('home') }}">

                    <img
                        style="width: 40px; height: 40px"
                        src="{{ asset('pics/banner/dent_2.jpg') }}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu-nav justify-content-end">
                        <li class="nav-item active"><a
                                wire:navigate class="nav-link" href="{{ route('home') }}" >خانه</a></li>

                        @if( auth()->user()?->is_admin == 0)
                            <li class="nav-item"><a wire:navigate class="nav-link" href="{{ route('chat') }}">
                                    گفتگو با مدیریت
                             <span class="ti-comments">

                             </span>
                                </a></li>
                        @else
                            <li class="nav-item active"><a
                                    class="nav-link" href="{{ route('admin.index') }}" >
                                    پنل مدیریت
                                      <span class="ti-crown">

                             </span>
                                </a></li>
                        @endif



                    </ul>

                    <div class="nav-left text-center text-lg-left py-4 py-lg-0">
                        @guest()
                            <a wire:navigate class="button button-outline button-small" href="{{ route('login') }}">ورود / ثبت نام</a>
                        @endguest

                        @auth()
                                <a wire:navigate class="button button-outline button-small" href="{{ route('logout') }}">خروج</a>
                        @endauth

                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
