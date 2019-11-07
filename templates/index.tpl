{* Подключение шапки *}
{include file = 'header.tpl'}
<div class="container">
	<div class="row">
		<div class="col-md-8 animated delay-1s fadeIn">
			<h1 class="my-4">Главная:
				<small>Все записи</small>
			</h1>
			<!-- Статьи -->
			{foreach $posts as $post}
			<div class="card mb-4">
				<img class="card-img-top" src="{$post.image}" alt="Card image cap">
				<div class="card-body">
					<h2 class="card-title">{$post.title}</h2>
					<p class="card-text">{mb_substr(strip_tags($post.text), 0, 200)}</p>
					<a href="pages/post.php?post_id={$post.id}" class="btn btn-primary">Читать полностью &rarr;</a>
				</div>
				<div class="card-footer text-muted">
					Опубликовано: {$post.datetime}
				</div>
			</div>
			{/foreach}
			<!-- Пагинация -->
			<nav aria-label="Page navigation example">
				<ul class="pagination justify-content-center mb-4">
					<li class="page-item"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
				</ul>
			</nav>
		</div>
		<!-- Сайдбар -->
		<div class="col-md-4">
			<!-- Вывод записей по категориям -->
			<div class="card my-4">
				<h5 class="card-header">Категории записей:</h5>
				<div class="card-body">
					<div class="row">
						<div class="col-lg-6">
							<ul class="list-unstyled mb-0">
								{foreach $categories as $category}
								<li><a href="pages/category.php?id={$category.id}">{$category.title}</a><li>
									{/foreach}
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- Яндекс.Виджет -->
				<div class="card my-4">
					<h5 class="card-header">Актуальное время</h5>
					<div class="card-body" style="height: 170px;">
						<iframe  frameborder="no" scrolling="no" width="280" height="150" src="https://yandex.ru/time/widget/?geoid=213&lang=ru&layout=horiz&type=digital&face=serif"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
	{* Подключение подвала сайта *}
	{include file = 'footer.tpl'}