<?php

require_once '../includes/connect.php';
require_once '../includes/function.php';
require_once '../includes/auth.php';
if(isset($_GET['delete'])){
	$id = ($_GET['delete']);
	$query = "DELETE FROM posts WHERE id = $id";
	mysqli_query($connect, $query);
}
$posts = get_posts($connect);
$categories = get_category($connect);
add_post($connect);


?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Мой профиль</title>

	<!-- Bootstrap core CSS -->
	<link href="../../css/animate.css" rel="stylesheet">
	<link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="../../css/blog-home.css" rel="stylesheet">

</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="#">Мой профиль</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="profile.php?do=logout">Выход</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Подтверждение удаление записи</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Вы точно хотите удалить запись?
				</div>
				<div class="modal-footer">
					<a href="?delete=<?=$post['id']?>"><button type="button" class="btn btn-primary">Да</button></a>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Нет</button>
				</div>
			</div>
		</div>
	</div>

Привет, юзер! :)

	<footer class="py-5 bg-dark">
		<div class="container">
			<p class="m-0 text-center text-white">Copyright &copy; Тестовый блог 2019</p>
		</div>
		<!-- /.container -->
	</footer>

	<!-- Bootstrap core JavaScript -->
	<script src="../../vendor/jquery/jquery.min.js"></script>
	<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>