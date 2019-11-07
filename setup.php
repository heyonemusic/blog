<?php

//Вызов Smarty
$smarty = new Smarty();

//Создание директорий
$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';
$smarty->config_dir = 'configs';
$smarty->cache_dir = 'cache';

//Переменные
$page_title = 'Тестовый блог';

//Вывод данных из таблицы "Посты"
$sql = "SELECT * FROM posts ORDER BY id";
$result = mysqli_query($connect, $sql);
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

//Вывод данных из таблицы "Категории"
$sql = "SELECT * FROM category";
$result = mysqli_query($connect, $sql);
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

//Передача переменных через метод
$smarty->assign('page_title', $page_title);
$smarty->assign('posts', $posts);
$smarty->assign('categories', $categories);

//Отображение файлов
$smarty->display('header.tpl');
$smarty->display('index.tpl');
$smarty->display('footer.tpl');

?>