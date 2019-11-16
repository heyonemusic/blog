<?php

//Удаление поста из БД
if(isset($_GET['delete'])){
	$id = ($_GET['delete']);
	$query = "DELETE FROM posts WHERE id = $id";
	mysqli_query($connect, $query);
}
//Вывод категорий
$categories = get_category($connect);
//Получение ID категории и присвоение в переменную
$category_id = $_GET['id'];

if(isset($_GET['page'])){
	$page = (int)$_GET['page'];
} else {
	$page = 1;
}
	$notesOnPage = 3; //Количество выводимых записей
	$from = ($page - 1) * $notesOnPage; //Перебор записей
  //Запрос в БД
	$category_id = mysqli_real_escape_string($connect, $category_id);
	$sql = "SELECT * FROM posts WHERE category_id = ".$category_id." ORDER BY id DESC LIMIT $from, $notesOnPage";
	$result = mysqli_query($connect, $sql);
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$sql = "SELECT COUNT(*) as count FROM posts WHERE category_id = ".$category_id;
	$result = mysqli_query($connect, $sql);
	$count = mysqli_fetch_assoc($result)['count'];
	$pagesCount = ceil($count / $notesOnPage);


	?>