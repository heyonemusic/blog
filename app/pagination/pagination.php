<?php

//Номер страницы
$page = int()$_GET['page'];
//Количество выводимых записей
$notesOnPage = 3;
//Перебор записей
$from = ($page - 1) * $notesOnPage;

?>