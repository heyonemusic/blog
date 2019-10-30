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
//Вывод поста по категории
$posts = get_posts_by_category($connect, $category_id);

?>