<?php

//Файл с подключением к БД
require_once 'connect.php';

//Вывод данных из таблицы "Категории"
function get_category($connect){
	$sql = "SELECT * FROM category";
	$result = mysqli_query($connect, $sql);
	$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $categories;
}

//Вывод данных из таблицы "Посты"
function get_posts($connect){
	$sql = "SELECT * FROM posts ORDER BY id";
	$result = mysqli_query($connect, $sql);
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $posts;
}

//GET запросы к post.php | Получение массива поста, открытие новой страницы с полной статьёй
function get_post_by_id($post_id){
  global  $connect; //Объявление глобальной переменной, которая отвечает за подключение к БД
  $sql = "SELECT * FROM posts WHERE id =".$post_id; //Выборка элементов из таблицы по id и присвоение GET-запроса
  $result = mysqli_query($connect, $sql); //Переменная, которая подключается к БД и присваивает значения переменной $sql
  $separate_post = mysqli_fetch_assoc($result); //Переменная, которая принимает записи в таблице posts по id в виде ассоциативного массива
  return $separate_post; //Возвращение результата
}

//Вывод статьи по категориям
function get_posts_by_category($connect, $category_id){
	$category_id = mysqli_real_escape_string($connect, $category_id);
	$sql = "SELECT * FROM posts WHERE category_id = ".$category_id;
	$result = mysqli_query($connect, $sql);
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $posts;
}

//Вывод заголовка определённой категории
function get_category_title($category_id){
	global $connect;
	$category_id = mysqli_real_escape_string($connect, $category_id);
	$sql = 'SELECT title FROM category WHERE id = "'.$category_id.'"';
	$result = mysqli_query($connect, $sql); 
	$category = mysqli_fetch_assoc($result); 
	return $category['title']; 
}

//Добавление комментария к статье
function add_comment($connect, $post_id){
	$name = trim(htmlspecialchars($_POST['name']));
	$text = trim(htmlspecialchars($_POST['text']));
	$post_id = $_GET['post_id'];
	if(!empty($_POST)){
		$sql = "INSERT INTO comments (`name`, `text`, `post_id`) VALUES ('$name', '$text', '$post_id')";
		$result = mysqli_query($connect, $sql);
		$url = (isset($_SERVER["HTTPS"]) && ($_SERVER["HTTPS"] == "on")) ? "https" : "http";
		$url .= "://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
		header("Location: $url");
	}
}

//Вывод комментариев
function pin_comment($connect, $post_id){
	$post_id = $_GET['post_id'];
	$sql = "SELECT * FROM comments WHERE post_id =" .$post_id;
	$query = mysqli_query($connect, $sql);
	$result = mysqli_fetch_all($query, MYSQLI_ASSOC);
	return $result;
}

// Добавление записи
function add_post($connect){
	$title = trim(htmlspecialchars($_POST['title']));
	$image = trim(htmlspecialchars($_POST['image']));
	$categories = ($_POST['categories']);
	$text = ($_POST['text']);
	if(!empty($_POST)){
		$sql = "INSERT INTO posts (`title`, `image`, `category_id`, `text`) VALUES ('$title', '$image', '$categories', '$text')";
		$result = mysqli_query($connect, $sql);
		$url = (isset($_SERVER["HTTPS"]) && ($_SERVER["HTTPS"] == "on")) ? "https" : "http";
		$url .= "://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
		header("Location: $url");
	}
}

function edit_post($connect, $post_id){
	$post_id = $_GET['post_id'];
	if(isset($_POST['submit'])){
		$title = $_POST['title'];
		$image = $_POST['image'];
		$text = $_POST['text'];
		$category = $_POST['category'];
		$update = "UPDATE posts SET `title` = '$title', `image` = '$image', `text` = '$text', `category_id` = '$category' WHERE id = ".$post_id;
		$result = mysqli_query($connect, $update);
		header("Location: ". $_SERVER["REQUEST_URI"]);
	}
}

function admin($connect){
	session_start();
	//Получаем админа
	$sql_login = "SELECT * FROM users";
	$query_login = mysqli_query($connect, $sql_login);
	$result_login = mysqli_fetch_all($query_login, MYSQLI_ASSOC);
	$admin = $result_login['0']['login'];
	//Получаем пароль админа
	$sql_password = "SELECT * FROM users";
	$query_password = mysqli_query($connect, $sql_password);
	$result_password = mysqli_fetch_all($query_password, MYSQLI_ASSOC);
	$password = $result_password['0']['password'];
	//Проверка введённых данных в форме с БД
	if(isset($_POST['submit'])){
		if($admin === $_POST['login'] && $password === $_POST['password']){
			$_SESSION['admin'] = $admin;
			header("Location: modules/admin/admin.php");
			exit;
		}
		else {
			header("Location: ". $_SERVER["REQUEST_URI"]);
		}
	}
}

function add_image($connect) {
	$path = '../../images/post/';
	$types = array('image/gif', 'image/png', 'image/jpeg');
	$size = 1024000;
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
//Перемещение файла в специальную директорию
		if(move_uploaded_file($_FILES['image']['tmp_name'], $path . $_FILES['image']['name'])){
			$image = ($_FILES['image']['name']);
			$sql = "INSERT INTO posts (`image`) VALUES ('$image')";
			mysql_query($connect, $sql);
		}
//Проверка файла на его тип
		if(!in_array($_FILES['image']['type'], $types))
			die();
//Проверка файла на его размер
		if ($_FILES['image']['size'] > $size)
			die('Слишком большой размер файла. <a href="?">Попробовать другой файл?</a>');
	}
}
/*
function registration_new_user($connect){
	$email = trim($_POST['email']);
	$name = trim($_POST['name']);
	$login = trim($_POST['login']);
	$password = trim(htmlspecialchars(md5($_POST['password'])))	;
	if(isset($_POST['registration'])){
		$sql = "INSERT INTO users (`email`, `name`, `login`, `password`) VALUES ('$email', '$name', '$login', '$password')";
		$result = mysqli_query($connect, $sql);
		header("Location: ". $_SERVER["REQUEST_URI"]);
	}
}
*/

?>