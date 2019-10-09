<?php

$connect = mysqli_connect('localhost', 'root', '', 'blog');
if($connect == false){
	echo 'Произошла ошибка подключения к БД';
	exit;
}

?>