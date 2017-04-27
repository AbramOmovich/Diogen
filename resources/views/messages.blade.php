@extends('Main')

@section('Posts')
        <div class="main-container col2-right-layout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="main">
                            <div class="row">
                                <div class="col-main col-xs-12 col-sm-9" STYLE="margin-left: 10%">
                                    <div class="padding-s">
                                        <div class="product-view">
                                            <div class="product-collateral">
                                                <h2>Вхоящие заявки</h2>
                                                @foreach($messages as $message)
                                                    <div style="margin-top: 24px" class="block block-related first">
                                                        <div class="block-content">

                                                            <ol class="mini-products-list" id="block-related">
                                                                <li class="item odd" @if($message->watched === 0) style="background-color: #e6e6e6" @endif <?php $message->watched = 1; $message->save();?> >
                                                                    <h3>{{ $message->post->title() }}</h3>
                                                                    <div class="product">
                                                                        <a href="{{ route('post',['id' => $message->post_id]) }}" title="{{ $message->post->title() }}" class="product-image"><img class="cover-message" src="{{ $message->post->showPhoto() }}" alt="{{ $message->post->title() }}"></a>
                                                                        <a href="#">
                                                                            <h3 style="color: #676767">{{ $message->senderName() }}</h3>
                                                                        </a>
                                                                        @php(setlocale(LC_TIME, 'Russian'))
                                                                        <small>{{ iconv('windows-1251', 'utf-8',$message->created_at->formatLocalized('%d %B %Y') )  }}</small>
                                                                        <p style="color: #2c2c2c">{{ $message->comment }}</p>
                                                                        <div class="product-details">
                                                                            <table style="margin-top: 12px; margin-bottom: 12px">
                                                                                <tr>
                                                                                    <td style="padding-right: 10px"><span>Телефон: </span></td>
                                                                                    <td><a href="tel:{{  $message->senderPhone() }}">{{ $message->senderPhone() }}</a></td>
                                                                                </tr>
                                                                                @if($message->senderEmail())
                                                                                <tr>
                                                                                    <td><span>Email: </span></td>
                                                                                    <td><a href="mailto:{{ $message->senderEmail() }}">{{ $message->senderEmail() }}</a></td>
                                                                                </tr>
                                                                                @endif
                                                                            </table>
                                                                            <a style="padding-right: 10px" href="#" class="link-wishlist">Ответить</a>
                                                                            <a href="" class="link-cart">Удалить</a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ol>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection