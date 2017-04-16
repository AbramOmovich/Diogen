<div class="col-right sidebar col-xs-12 col-sm-3">
    <div class="block block-layered-nav first">
        <div class="block-title">
            <strong><span>Фильтр</span></strong>
            <span class="toggle"></span></div>
        <div class="block-content">
            <form action="{{ Request::url() }}" method="get">
            <p class="block-subtitle">Доступные параметры</p>
                <button style="padding-bottom: 15px" type="submit" class="button"><span><span>Подобрать</span></span></button>
                <dl id="narrow-by-list">
                <dt class="odd">Цена</dt>
                <dd class="odd">
                    <ol>
                        <li>
                            <a href="https://livedemo00.template-help.com/magento_50897/rentals.html?price=-10000000"><span class="price">0,00&nbsp;$</span> - <span class="price">9&nbsp;999&nbsp;999,99&nbsp;$</span></a>
                            (2)
                        </li>
                        <li>
                            <a href="https://livedemo00.template-help.com/magento_50897/rentals.html?price=10000000-"><span class="price">10&nbsp;000&nbsp;000,00&nbsp;$</span> and above</a>
                            (4)
                        </li>
                    </ol>
                </dd>
                <dt class="odd">Комнаты</dt>
                <dd class="odd">
                    <?php  $rooms = Request::input('rooms',[]);dump(Request::all()) ?>
                    <ol>
                        @for($i= 1; $i < 6; $i++)
                        <li>
                            <input type="checkbox" name="rooms[]" value="{{ $i }}" @if(in_array( $i,$rooms)) checked @endif >
                            ( @if($i == 5)4+@else{{ $i }}@endif () )
                        </li>
                        @endfor
                    </ol>
                </dd>
            </dl>
            </form>
        </div>
    </div>

</div>