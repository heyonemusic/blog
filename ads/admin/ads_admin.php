<?php

//Удаление поста из БД
if(isset($_GET['delete'])){
	$id = ($_GET['delete']);
	$query = "DELETE FROM posts WHERE id = $id";
	mysqli_query($connect, $query);
}
//Вывод постов
$posts = get_posts($connect);
//Вывод категорий
$categories = get_category($connect);
//Добавление поста на сайт
add_post($connect);

?>