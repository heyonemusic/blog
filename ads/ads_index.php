<?php

//Вывод категорий в сайдбаре
$categories = get_category($connect);
//Пагинация
if (isset($_GET['page'])) {
    $page = (int)$_GET['page'];
} else {
    $page = 1;
}
$notesOnPage = 3; //Количество выводимых записей
$from = ($page - 1) * $notesOnPage; //Перебор записей
//Запрос в БД
$sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $from, $notesOnPage";
$result = mysqli_query($connect, $sql);
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
$sql = "SELECT COUNT(*) as count FROM posts";
$result = mysqli_query($connect, $sql);
$count = mysqli_fetch_assoc($result)['count'];
$pagesCount = ceil($count / $notesOnPage);

?>