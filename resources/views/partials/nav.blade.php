<nav class="navbar navbar-default navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ (Request::is('/') ? 'active' : '') }}">
                    <a href="{{ URL::to('') }}"><i class="fa fa-home"></i> Головна</a>
                </li>
                <li class="{{ (Request::is('cabinet') ? 'active' : '') }}">
                    <a href="{{ URL::to('cabinet') }}">Кабінет користувача</a>
                </li>

                <li class="{{ (Request::is('contact') ? 'active' : '') }}">
                    <a href="{{ URL::to('contact') }}">Контакти</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li class="{{ (Request::is('auth/login') ? 'active' : '') }}"><a href="{{ URL::to('auth/login') }}"><i
                                    class="fa fa-sign-in"></i> Увійти</a></li>
                    <li class="{{ (Request::is('auth/register') ? 'active' : '') }}"><a
                                href="{{ URL::to('auth/register') }}">Зареєструватися</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-user"></i> {{ Auth::user()->name }} <i
                                    class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            @if(Auth::check())
                                @if(Auth::user()->admin==1)
                                    <li>
                                        <a href="{{ URL::to('admin/dashboard') }}"><i class="fa fa-tachometer"></i> Адмін панель</a>
                                    </li>
                                @endif
                                <li role="presentation" class="divider"></li>
                                @if(Auth::user()->groups->first())
                                    <li>
                                        <a href="{{ URL::to('/group') }}"><i class="fa fa-sign-out"></i> Група</a>
                                    </li>
                                @endif
                                <li>
                                    <a href="{{ URL::to('/cabinet/settings') }}"><i class="fa fa-cog"></i> Налаштування </a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ URL::to('auth/logout') }}"><i class="fa fa-sign-out"></i> Вихід</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
