<?php

//Получение ID поста
$post_id = (int)$_GET['post_id'];
//Вывод определённого поста
$separate_post = get_post_by_id($post_id);
//Редактирование поста
edit_post($connect, $post_id);
//Вывод категорий
$categories = get_category($connect);

?>