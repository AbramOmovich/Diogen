<div class="nav-container">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul id="nav" class="sf-menu">
                    <li class="level0 nav-1 first level-top">
                        <a href="https://livedemo00.template-help.com/magento_50897/new-constructions.html" class="level-top">
                            <span>Новостройки</span>
                        </a>
                    </li>
                    <li class="level0 nav-2 @if(Route::is('Rent')) active @endif level-top">
                        <a href="{{ route('Rent') }}" class="level-top">
                            <span>Аренда</span>
                        </a>
                    </li>
                    <li class="level0 nav-3 last @if(Route::is('Buy')) active @endif level-top parent">
                        <a href="{{ route('Buy') }}" class="level-top">
                            <span>Продажа</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>