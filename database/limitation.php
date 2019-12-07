<?php

//Если сессия не Админ, то не предоставляй доступ
//к административной панели сайта
session_start();
if(!$_SESSION['admin']){
	header("Location: /");
	exit;
}

?>