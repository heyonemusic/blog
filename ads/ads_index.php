<?php

//Вывод категорий в сайдбаре
$categories = get_category($connect);
//Вывод постов
$posts = get_posts($connect);

?>