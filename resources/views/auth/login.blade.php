@extends('Main')

@section('Posts')
    <div class="main-container col1-layout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="main">
                        <div class="col-main">
                            <div class="padding-s">
                                <div class="account-login">
                                    <div class="page-title">
                                        <h1>Страница авторизации</h1>
                                    </div>
                                        <div class="col2-set">
                                            <div class="wrapper">
                                                <div class="registered-users-wrapper">
                                                    <div class="col-2 registered-users">
                                                        <div class="content">
                                                            <h2>Зарегистрированные клиенты</h2>
                                                            <p>Если у вас есть учётная запись на нашем сайте, пожалуйста, авторизируйтесь.</p>

                                                            <form role="form" action="{{ route('login') }}" method="POST">
                                                                {{ csrf_field() }}

                                                            <ul class="form-list">
                                                                <li>
                                                                    <label for="email" class="required"><em>*</em>Адрес электронной почты (email)</label>
                                                                    <div class="input-box">
                                                                        <input type="email" name="email" value="" id="email" class="input-text required-entry validate-email form-control" title="Адрес электронной почты (email)">
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <label for="pass" class="required"><em>*</em>Пароль</label>
                                                                    <div class="input-box">
                                                                        <input type="password" name="password" class="input-text required-entry validate-password form-control" id="pass" title="Пароль">
                                                                    </div>
                                                                </li>
                                                            </ul>


                                                            <p class="required">* Обязательные поля</p>
                                                            <div class="buttons-set">
                                                                <a href="https://livedemo00.template-help.com/magento_50897/customer/account/forgotpassword/" class="f-left">Забыли пароль?</a>
                                                                <button type="submit" class="button" title="Вход" name="send" id="send2"><span><span>Вход</span></span></button>
                                                            </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="new-users-wrapper">
                                                    <div class="col-1 new-users">
                                                        <div class="content">
                                                            <h2>Новые клиенты</h2>
                                                            <p>Создав учётную запись на нашем сайте, вы будете тратить меньше времени на оформление заказа, сможете хранить несколько адресов доставки, отслеживать состояние заказов, а также многое другое.</p>
                                                            <div class="buttons-set">
                                                                <button type="button" title="Создать учётную запись" class="button" onclick="window.location='{{ route('register') }}';"><span><span>Создать учётную запись</span></span></button>
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
                </div>
            </div>
        </div>
    </div>
@endsection
