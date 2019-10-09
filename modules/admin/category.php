<?php

require_once '../../includes/connect.php';
require_once '../../includes/function.php';
require_once '../../includes/auth.php';
$posts = get_posts($connect);
$categories = get_category($connect);
$category_id = $_GET['id'];
$posts = get_posts_by_category($connect, $category_id);

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
						<a class="nav-link" href="#">Выход</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>


	<div class="container">
		<div class="row">
			<!-- Blog Entries Column -->
			<div class="col-md-12 animated delay-1s fadeIn">
				<h1 class="my-4">
					<small>Категория: <?=get_category_title($_GET['id'])?></small>
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
									<a href="../../post.php?post_id=<?=$post['id']?>">
										<?php echo $post['title']; ?>
									</a>
									<a href="#" style="float: right;margin-left: 20px;"><img src="../../images/delete.png" title="Удалить запись"></a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>


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