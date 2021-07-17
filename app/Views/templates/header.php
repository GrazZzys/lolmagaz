<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <? if(isset($page_title)): ?>
    <title><?= $page_title ?></title>
    <? else: ?>
    <title>Magazine</title>
    <? endif; ?>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon">
</head>
<body>
<? if($_SESSION['auth'] === false): ?>
    <div class="modal-sign">
        <div class="modal-forms">
            <div class="close">
                <i class="fas fa-times"></i>
            </div>
            <form action="/register" method="post" novalidate>
                <div class="sign-form">
                    <p class="title-modal">Регистрация</p>
                    <?= csrf_field() ?>
                    <input name="name" id="regName" type="text" placeholder="Введите логин" value="">
                    <input name="email" id="regEmail" type="email"  placeholder="Введите электронный адрес" value="">
                    <input name="password" id="regPassword" type="password"  placeholder="Введите пароль" value="">
                    <button type="submit" class="reg_btn">Зарегистрироваться</button>
                </div>
            </form>

            <form action="/login" method="post" novalidate>
                <div class="login">
                    <p class="title-modal">Вход</p>
                    <?= csrf_field() ?>
                    <input name="email" id="logEmail" type="email" placeholder="Введите электронный адрес" value="">
                    <input name="password" id="logPassword" type="password" placeholder="Введите пароль" value="">
                    <button type="submit" class="log_btn">Войти</button>
                </div>
            </form>
        </div>
    </div>
<? endif; ?>
<header>
    <div class="wrap">
        <div class="nav">
            <div class="logo">
                <a href="<?= base_url() ?>">
                    Magazine
                </a>
            </div>
            <ul class="menu-head">
                <li><a href="/product">Products</a></li>
            </ul>
            <div class="cart">
                <? if ($_SESSION['auth'] === true): ?>
                <i class="fas fa-shopping-cart"></i>
                <p class="money-cart">25$</p>
                <a href="/<?= $_SESSION['user_id'] ?>">
                    <p>Account</p>
                </a>
                <form action="/logout" method="post" novalidate>
                    <?= csrf_field() ?>
                    <button type="submit" class="logout">Выйти</button>
                </form>
                <?else: ?>
                <div class="cart">
                    <p class="sign">Вход/Регистрация</p>
                </div>
                <?endif; ?>
            </div>
        </div>
    </div>
</header>