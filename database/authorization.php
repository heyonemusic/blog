<?php

//Сессия администратора
session_start();
if(!$_SESSION['admin']){
	header("Location: /");
	exit;
}

//Выход из сессии администратора
if($_GET['do'] == 'logout'){
	unset($_SESSION['admin']);
	session_destroy();
	header("Location: /");
	exit;
}

?>