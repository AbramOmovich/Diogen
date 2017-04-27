<div class="header-container">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="header">
                    <div class="top_row">
                        <ul class="links">
                            <li><a href="{{ route('make') }}" title="Подать объявление">Подать объявление</a></li>

                            @if(Auth::guest())
                                <li><a href="{{ route('register') }}" title="Регистрация">Регистрация</a></li>
                                <li><a href="{{ route('login') }}" title="Войти">Войти</a></li>
                            @else
                                <li><a href="{{ route('showMessages') }}">Мои сообщения  @if(Auth::user()->newMessages() > 0) ({{ Auth::user()->newMessages() }})@endif</a></li>
                                <li>
                                    <div class="btn-group pull-right">
                                        <a class="dropdown-toggle" href="#" id="userDrop" data-toggle="dropdown" role="button" >{{ Auth::user()->email }}<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('userPosts') }}">Мои обЪявления</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выйти</a></li>
                                        </ul>
                                    </div>
                                </li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            @endif
                        </ul>
                        <p class="welcome-msg">
                        @if(!Auth::check())
                                Добро пожаловать в наш интернет-магазин!
                        @else
                                Добро пожаловать, {{ Auth::user()->firstName }}
                        @endif
                        </p>
                    </div>
                    <div class="clear"></div>
                    <h1 class="logo">
                        <strong>Агенство Диоген</strong>
                        <a href="{{ route('Home') }}" title='Агенство "Диоген"'>
                            <img src="/public/images/logo.png" alt='Агенство "Диоген"'/>
                        </a>
                    </h1>
                    <div class="right_head">
                        <form id="search_mini_form" action="{{ route('search') }}" method="get">
                            <div class="form-search">
                                <label for="search">Search:</label>
                                <input id="search" type="text" name="q" value="" class="input-text"/>
                                <button type="submit" title="Поиск" class="button"><strong><i class="fa fa-search"></i></strong></button>
                                <div id="search_autocomplete" class="search-autocomplete"></div>
                            </div>
                        </form>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>