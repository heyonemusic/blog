<?php
/* Smarty version 3.1.33, created on 2019-11-03 21:00:30
  from 'D:\OpenServer\OSPanel\domains\testproject\testblog\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dbf15beda7439_98438725',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d40c5c9add83e4948005d8a871cde7a7b9f1434' => 
    array (
      0 => 'D:\\OpenServer\\OSPanel\\domains\\testproject\\testblog\\templates\\header.tpl',
      1 => 1572804022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dbf15beda7439_98438725 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</title>
	<link href="../css/animate.css" rel="stylesheet">
	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/blog-home.css" rel="stylesheet">
</head>
<body>
	<!-- Форма авторизации на сайте -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Вход в административную панель блога</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post">
						<div class="form-group" style="margin-bottom:5px;">
							<input type="text" class="form-control" placeholder="Логин:" name="login" required><br>
							<input type="password" class="form-control" placeholder="Пароль:" name="password" required><br>
							<button type="submit"  class="btn btn-primary" name="submit"  style="float:right;">Войти</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Форма регистрации на сайте -->
	<!--
	<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Регистрация на сайте</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post">
						<div class="form-group" style="margin-bottom:5px;">
							<input type="email" onkeyup="var yratext=/[^a-z,@,.0-9]/; if(yratext.test(this.value)) this.value=''" class="form-control" placeholder="E-mail: (максимум 16 символов)" name="email" maxlength=16 required><br>
							<input type="text"  onkeyup="var yratext=/[^a-z,A-Z,а-я,А-Я]/; if(yratext.test(this.value)) this.value=''" class="form-control" placeholder="Ваше имя: (максимум 10 символов)" name="name" maxlength=10 required><br>
							<input type="text" onkeyup="var yratext=/[^a-z,A-Z,0-9]/; if(yratext.test(this.value)) this.value=''" class="form-control" placeholder="Логин: (максимум 8 символов)" name="login" maxlength=8 required><br>
							<input type="password" class="form-control" placeholder="Пароль: (максимум 8 символов)" name="password" maxlength=8 required><br>
							<button type="submit" name="registration" class="btn btn-primary" style="float:right;">Зарегистрироваться</button>
						</div>
					</form>
				</div>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>
-->

<!-- Навигация -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container">
		<a class="navbar-brand" href="/">Тестовый блог</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<!-- Если сессия не админ, то отображай ссылку
					   на форму с авторизацией. Иначе, отображай ссылку 
					   на административную панель сайта -->
					   <?php if (!$_smarty_tpl->tpl_vars['_SESSION']->value['admin']) {?>
					   <li class="nav-item">
					   	<a class="nav-link" href="/" data-toggle="modal" data-target="#exampleModal">Вход</a>
					   </li>
					   <?php } else { ?>
					   <li class="nav-item">
					   	<a class="nav-link" href="../app/admin/admin.php">Административная панель</a>
					   </li>
					   <?php }?>
					 </ul>
					</div>
				</div>
			</nav><?php }
}
