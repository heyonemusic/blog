<?php

require_once '../../includes/connect.php';
require_once '../../includes/function.php';
require_once '../../includes/auth.php';
if(isset($_GET['delete'])){
	$id = ($_GET['delete']);
	$query = "DELETE FROM posts WHERE id = $id";
	mysqli_query($connect, $query);
}
$posts = get_posts($connect);
$categories = get_category($connect);
add_post($connect);
add_image($connect);

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Административная панель</title>

	<!-- Bootstrap core CSS -->
	<link href="../../css/animate.css" rel="stylesheet">
	<link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="../../css/blog-home.css" rel="stylesheet">

</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="#">Административная панель</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="admin.php?do=logout">Выход</a>
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

	<div class="container">
		<div class="row">
			<!-- Blog Entries Column -->
			<div class="col-md-12 animated delay-1s fadeIn">
				<h1 class="my-4">
					<small>Все записи:</small>
				</h1>
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
						<div class="navbar-nav">
							<a class="nav-item nav-link" href="admin.php">Все категории</a>
							<?php foreach($categories as $category){ ?>
								<a class="nav-item nav-link" href="category.php?id=<?=$category["id"]?>"><?=$category["title"]?></a>
							<?php } ?>
						</div>
					</div>
				</nav>
				<!-- Blog Post -->
				<table class="table">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Статья</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($posts as $post) { ?>
							<tr>
								<th scope="row"><?php echo $post['id']; ?></th>
								<td>
									<a href="../../post.php?post_id=<?=$post['id']?>" target="_blank">
										<?php echo $post['title']; ?>
									</a>
									<a href="?delete=<?=$post['id']?>" style="float: right;margin-left: 20px;"><img src="../../images/delete.png" title="Удалить запись"></a>
									<a href="edit.php?post_id=<?=$post['id']?>" style="float: right;" target="_blank"><img src="../../images/edit.png" title="Редактировать запись"></a> 
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<!-- Blog Entries Column -->
			<div class="col-md-12 animated delay-1s fadeIn">
				<div class="card my-4">
					<h5 class="card-header">Добавить новую запись:</h5>
					<div class="card-body">
						<form method="post" enctype="multipart/form-data">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Заголовок статьи:" name="title" required><br>
								<input type="file" class="form-control-file" placeholder="Изображение:" name="image" required><br>
								<select class="form-control" name="categories">
									<?php foreach($categories as $category) { ?>
										<option><?=$category["id"]?></option>
									<?php } ?>
								</select><br>
								<textarea class="form-control" rows="12" name="text" placeholder="Вставка изображений осуществляется так: img class=card-img-top src=ссылка на изображение"></textarea>
							</div>
							<button type="submit" class="btn btn-primary" style="float:right;">Добавить</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

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