<?php

//Подключение функций
require_once __DIR__ . '/../function/function.php';
//Подключение сессии админа
require_once __DIR__ . '/../ads/ads_session_admin.php';
//Выход из сессии админа
require_once __DIR__ . '/../database/logout.php';
//Регистрация пользователей
require_once __DIR__ . '/../ads/ads_registration_user.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Тестовый блог</title>
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/blog-home.css" rel="stylesheet">
</head>
<body>
<!-- Форма авторизации на сайте -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Вход в административную панель блога</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group" style="margin-bottom:5px;">
                        <input type="text" class="form-control" placeholder="Логин:" name="login" required><br>
                        <input type="password" class="form-control" placeholder="Пароль:" name="password" required><br>
                        <button type="submit" class="btn btn-primary" name="submit" style="float:right;">Войти</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Форма регистрации на сайте -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Регистрация на сайте</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group" style="margin-bottom:5px;">
                        <!-- Поля для регистрации, с ограничением на ввод данных -->
                        <input type="text"
                               onkeyup="var yratext=/[^a-z,A-Z,а-я,А-Я]/; if(yratext.test(this.value)) this.value=''"
                               class="form-control" placeholder="Ваше имя: (максимум 10 символов)" name="name"
                               maxlength=10 required><br>
                        <input type="login"
                               onkeyup="var yratext=/[^a-z,A-Z,0-9]/; if(yratext.test(this.value)) this.value=''"
                               class="form-control" placeholder="Логин: (максимум 8 символов)" name="login" maxlength=8
                               required><br>
                        <input type="password" class="form-control" placeholder="Пароль: (максимум 8 символов)"
                               name="password" maxlength=8 required><br>
                        <button type="submit" name="registration" class="btn btn-primary" style="float:right;">
                            Зарегистрироваться
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- Навигация -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Тестовый блог</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <!-- Если сессия не Админ, то отображай ссылку
                       на вход для Админа и регистрацию. Иначе, отображай ссылку
                       на административную панель сайта -->
                <?php if (empty($_SESSION['admin'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/" data-toggle="modal" data-target="#exampleModal1">Регистрация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/" data-toggle="modal" data-target="#exampleModal">Вход</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../app/admin/admin.php">Административная панель</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?do=logout">Выход</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>