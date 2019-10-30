<?php

//Вывод категорий в сайдбаре
$categories = get_category($connect);
//Вывод постов
$posts = get_posts($connect);
//Получение ID категории и присвоение в переменную
$category_id = $_GET['id'];
//Вывод поста по категории
$posts = get_posts_by_category($connect, $category_id);

?>