@extends('Main')
@section('Posts')
    <div class="main-container col1-layout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="main">
                        <div class="col-main">
                            <div class="padding-s">
                                <div class="account-create">
                                    <div class="page-title">
                                        <h1>Создать учётную запись</h1>
                                    </div>
                                    <form action="{{ route('register') }}" method="post">
                                        <div class="fieldset">
                                            {{ csrf_field() }}
                                            <h2 class="legend">Личная информация</h2>
                                            <ul class="form-list">
                                                <li class="fields">
                                                    <div class="customer-name">
                                                        <div class="field name-firstname">
                                                            <label for="firstName" class="required"><em>*</em>Имя</label>
                                                            <div class="input-box">
                                                                <input type="text" id="firstName" name="firstName" value="" title="Имя" maxlength="255" class="input-text required-entry form-control">
                                                            </div>
                                                        </div>
                                                        <div class="field name-lastname">
                                                            <label for="lastName" class="required"><em>*</em>Фамилия</label>
                                                            <div class="input-box">
                                                                <input type="text" id="lastName" name="lastName" value="" title="Фамилия" maxlength="255" class="input-text required-entry form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <label for="email_address" class="required"><em>*</em>Адрес электронной почты (email)</label>
                                                    <div class="input-box">
                                                        <input type="email" name="email" id="email_address" value="" title="Адрес электронной почты (email)" class="input-text validate-email required-entry form-control">
                                                    </div>
                                                </li>
                                                <li class="control">
                                                    <input type="checkbox" name="is_subscribed" title="Подписаться на рассылку" value="1" id="is_subscribed" class="checkbox">
                                                    <label for="is_subscribed">Подписаться на рассылку</label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="fieldset">
                                            <h2 class="legend">Информация для авторизации</h2>
                                            <ul class="form-list">
                                                <li class="fields">
                                                    <div class="field">
                                                        <label for="password" class="required"><em>*</em>Пароль</label>
                                                        <div class="input-box">
                                                            <input type="password" name="password" id="password" title="Пароль" class="input-text required-entry validate-password form-control">
                                                        </div>
                                                    </div>
                                                    <div class="field">
                                                        <label for="confirmation" class="required"><em>*</em>Подтвердите пароль</label>
                                                        <div class="input-box">
                                                            <input type="password" name="password_confirmation" title="Подтвердите пароль" id="confirmation" class="input-text required-entry validate-cpassword form-control">
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>


                                        </div>
                                        <div class="buttons-set">
                                            <p class="required">* Обязательные поля</p>
                                            <p class="back-link"><a href="{{ route('login') }}" class="back-link"><small>« </small>Вернуться</a></p>
                                            <button type="submit" title="Отправить" class="button"><span><span>Отправить</span></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
