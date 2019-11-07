<?php
/* Smarty version 3.1.33, created on 2019-11-07 14:45:07
  from 'D:\OpenServer\OSPanel\domains\testproject\testblog\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dc403c336ac17_74846354',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4961df15c3c5702190bf90356789a1c4d9873254' => 
    array (
      0 => 'D:\\OpenServer\\OSPanel\\domains\\testproject\\testblog\\templates\\index.tpl',
      1 => 1573127105,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5dc403c336ac17_74846354 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="container">
	<div class="row">
		<div class="col-md-8 animated delay-1s fadeIn">
			<h1 class="my-4">Главная:
				<small>Все записи</small>
			</h1>
			<!-- Статьи -->
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
?>
			<div class="card mb-4">
				<img class="card-img-top" src="<?php echo $_smarty_tpl->tpl_vars['post']->value['image'];?>
" alt="Card image cap">
				<div class="card-body">
					<h2 class="card-title"><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</h2>
					<p class="card-text"><?php echo mb_substr(strip_tags($_smarty_tpl->tpl_vars['post']->value['text']),0,200);?>
</p>
					<a href="pages/post.php?post_id=<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
" class="btn btn-primary">Читать полностью &rarr;</a>
				</div>
				<div class="card-footer text-muted">
					Опубликовано: <?php echo $_smarty_tpl->tpl_vars['post']->value['datetime'];?>

				</div>
			</div>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
								<li><a href="pages/category.php?id=<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['title'];?>
</a><li>
									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
		<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
