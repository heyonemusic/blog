<?php

//Возможность удаления комментария для админа
if(isset($_GET['del_comment'])){
	$id = ($_GET['del_comment']);
	$query = "DELETE FROM comments WHERE id = $id";
	mysqli_query($connect, $query);
}
//Добавление комментария к статье
add_comment($connect, $post_id);
//Получение ID поста и присвоение в переменную
$post_id = $_GET['post_id'];
//Вывод конкретного поста по ID
$separate_post = get_post_by_id($post_id);
//Вывод категорий в сайдбаре
$categories = get_category($connect);
//Вывод комментариев, оставленных гостями
$result = pin_comment($connect, $post_id);

?>