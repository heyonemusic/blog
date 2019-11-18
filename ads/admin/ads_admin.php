<?php

//Удаление поста из БД
if(isset($_GET['delete'])){
	$id = (int)($_GET['delete']);
	$query = "DELETE FROM posts WHERE id = $id";
	mysqli_query($connect, $query);
}
//Вывод постов
if(isset($_GET['page'])){
	$page = (int)$_GET['page'];
} else {
	$page = 1;
}
	$notesOnPage = 6; //Количество выводимых записей
	$from = ($page - 1) * $notesOnPage; //Перебор записей
  //Запрос в БД
	$sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $from, $notesOnPage";
	$result = mysqli_query($connect, $sql);
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$sql = "SELECT COUNT(*) as count FROM posts";
	$result = mysqli_query($connect, $sql);
	$count = mysqli_fetch_assoc($result)['count'];
	$pagesCount = ceil($count / $notesOnPage);
//Вывод категорий
	$categories = get_category($connect);
//Добавление поста на сайт
	add_post($connect);

	?>