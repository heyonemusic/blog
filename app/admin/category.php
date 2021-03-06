<?php

//Подключение к БД
require_once '../../database/connect.php';
//Ограничение доступа к странице
require_once '../../database/limitation.php';
//Выход из сессии админа
require_once '../../database/logout.php';
//Функции
require_once '../../function/function.php';
//Объявленные переменные, функции
require_once '../../ads/admin/ads_category.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Административная панель</title>
    <link href="../../css/animate.css" rel="stylesheet">
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/blog-home.css" rel="stylesheet">
</head>
<body>
<!-- Меню -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Административная панель</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">На главную</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">Назад</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?do=logout">Выход</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-12 animated delay-1s fadeIn">
            <h1 class="my-4">
                <small>Категория: <?= get_category_title($_GET['id']) ?></small>
            </h1>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="admin.php">Все категории</a>
                        <!-- Вывод категорий -->
                        <?php foreach ($categories as $category) { ?>
                            <a class="nav-item nav-link"
                               href="category.php?id=<?= $category["id"] ?>"><?= $category["title"] ?></a>
                        <?php } ?>
                    </div>
                </div>
            </nav>
            <!-- Список постов -->
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Статья</th>
                </tr>
                </thead>
                <tbody>
                <!-- Вывод записи -->
                <?php foreach ($posts as $post) { ?>
                    <tr>
                        <th scope="row"><?php echo $post['id']; ?></th>
                        <td>
                            <a href="../../post.php?post_id=<?= $post['id'] ?>">
                                <?php echo $post['title']; ?>
                            </a>
                            <a href="?delete=<?= $post['id'] ?>" style="float: right;margin-left: 20px;"><img
                                        src="../../images/delete.png" title="Удалить запись"></a>
                            <a href="edit.php?post_id=<?= $post['id'] ?>" style="float: right;" target="_blank"><img
                                        src="../../images/edit.png" title="Редактировать запись"></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-sm justify-content-center mb-4">
                    <!-- Пагинация -->
                    <?php for ($i = 1; $i <= $pagesCount; $i++) { ?>
                        <?php if ($page == $i) { ?>
                            <li class="page-item active"><a class="page-link"
                                                            href="category.php?id=<?= $category_id ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                            </li>
                        <?php } else { ?>
                            <li class="page-item"><a class="page-link"
                                                     href="category.php?id=<?= $category_id ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- Подвал сайта -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Тестовый блог 2019</p>
    </div>
</footer>
<script src="../../vendor/jquery/jquery.min.js"></script>
<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>