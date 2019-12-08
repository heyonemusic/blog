<?php

//Выход из сессии администратора
if($_GET['do'] == 'logout'){
	unset($_SESSION['admin']);
	session_destroy();
	header("Location: /");
	exit;
}

?>