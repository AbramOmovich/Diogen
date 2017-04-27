<div class="col-right sidebar col-xs-12 col-sm-3">
    <div class="block block-related first">
        <div class="block-title">
            <strong><span>Сопутствующие товары</span></strong>
            <span class="toggle"></span></div>
        <div class="block-content">

            <ol class="mini-products-list" id="block-related">

                @php($relateds = \App\Post::getRandomPosts())
                @foreach($relateds as $related)
                <li class="item odd">
                    <div class="product">
                        <a href="{{ route('post',['id' => $related->id ]) }}" title="{{ $related->title() }}" class="product-image">
                            <img src="{{ $related->showPhoto() }}" alt="{{ $related->title() }}" class="cover-message">
                        </a>
                        <p class="product-name"><a href="{{ route('post',['id' => $related->id ]) }}">{{ $related->title() }}</a></p>
                        <div class="product-details">
                            <div class="price-box">
<span class="regular-price" id="product-price-23-related">
<span class="price">{{ $related->price() }}</span> </span>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ol>
        </div>
    </div>
    <div class="block block-subscribe">
        <div class="block-title">
            <strong><span>Информационный бюллетень</span></strong>
            <span class="toggle"></span></div>
        <form action="#" method="post" id="newsletter-validate-detail">
            <div class="block-content">
                <div class="form-subscribe-header">
                    <label for="newsletter">Подписаться на рассылку:</label>
                </div>
                <div class="input-box">
                    <input type="text" name="email" id="newsletter" title="Подписаться на нашу рассылку" class="input-text required-entry validate-email form-control">
                </div>
                <div class="actions">
                    <button type="submit" title="Подписаться" class="button"><span><span>Подписаться</span></span></button>
                </div>
            </div>
        </form>
    </div>
    <div class="block block-poll last_block">
        <div class="block-title">
            <strong><span>Опрос</span></strong>
            <span class="toggle"></span></div>
        <form id="pollForm" action="" method="post">
            <div class="block-content">
                <p class="block-subtitle">Основная причина покупки товаров в интернет магазине?</p>
                <ul id="poll-answers">
                    <li class="odd">
                        <input type="radio" name="vote" class="radio poll_vote" id="vote_22" value="22">
                        <span class="label"><label for="vote_22">Более удобная перевозка и доставка</label></span>
                    </li>
                    <li class="even">
                        <input type="radio" name="vote" class="radio poll_vote" id="vote_23" value="23">
                        <span class="label"><label for="vote_23">Более низкая цена</label></span>
                    </li>
                    <li class="odd">
                        <input type="radio" name="vote" class="radio poll_vote" id="vote_24" value="24">
                        <span class="label"><label for="vote_24">Большой выбор</label></span>
                    </li>
                    <li class="even">
                        <input type="radio" name="vote" class="radio poll_vote" id="vote_25" value="25">
                        <span class="label"><label for="vote_25">Централизованная процедура поиска товара (не выходя из дома)</label></span>
                    </li>
                    <li class="odd">
                        <input type="radio" name="vote" class="radio poll_vote" id="vote_26" value="26">
                        <span class="label"><label for="vote_26">Безопасные платежи</label></span>
                    </li>
                    <li class="even">
                        <input type="radio" name="vote" class="radio poll_vote" id="vote_27" value="27">
                        <span class="label"><label for="vote_27">30-дневная гарантия возврата денег</label></span>
                    </li>
                    <li class="last odd">
                        <input type="radio" name="vote" class="radio poll_vote" id="vote_28" value="28">
                        <span class="label"><label for="vote_28">Другое.</label></span>
                    </li>
                </ul>
                <div class="actions">
                    <button type="submit" title="Голосовать" class="button"><span><span>Голосовать</span></span></button>
                </div>
            </div>
        </form>
    </div>
</div>