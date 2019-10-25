<?php

$FilePath = '../../images/post/';

if(is_uploaded_file($_FILES['image']['tmp_name'])){
	move_uploaded_file($_FILES['image']['tmp_name'], $FilePath . $_FILES['image']['name']);
}
else {
	die('Ошибка загрузки файла');
}

?>