<?php
/* Smarty version 3.1.33, created on 2019-11-03 20:16:10
  from 'D:\OpenServer\OSPanel\domains\testproject\testblog\templates\post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dbf0b5a4ce660_21791457',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '799a7b0bb0698486ec5db3731040dd78f68a31d2' => 
    array (
      0 => 'D:\\OpenServer\\OSPanel\\domains\\testproject\\testblog\\templates\\post.tpl',
      1 => 1572801367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dbf0b5a4ce660_21791457 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php

';?>//Подключение шапки сайта
require_once '../parts/header.php';
//Подключение к БД
require_once '../database/connect.php';
//Подключение файла, в котором содержатся объявления переменных, а также функции
require_once '../ads/ads_post.php';

<?php echo '?>';?>

<div class="container">
  <div class="row">
    <div class="col-lg-8 animated delay-1s fadeIn">
      <!-- Заголовок, дата публикации, текст статьи -->
      <h1 class="mt-4"><?php echo '<?php ';?>echo $separate_post['title']; <?php echo '?>';?></h1>
      <hr>
      <p>Опубликовано: <?php echo '<?php ';?>echo $separate_post['datetime']; <?php echo '?>';?>
    </p>
    <hr>
    <img class="img-fluid rounded" src="../<?php echo '<?php ';?>echo $separate_post['image']; <?php echo '?>';?>" alt="">
    <hr>
    <p><?php echo '<?php ';?>echo nl2br($separate_post['text']); <?php echo '?>';?></p>
    <a href="/" class="btn btn-primary">&larr; На главную</a>
    <hr>
<!-- Форма с добавлением комментария к статье, а также условие для админа. 
     Если сессия админ, то предоставь для него возможность
     удалять комментарии, которые оставили гости -->
     <?php echo '<?php ';?>if(!$_SESSION['admin']){ <?php echo '?>';?>
      <div class="card my-4">
        <h5 class="card-header">Оставить комментарий:</h5>
        <div class="card-body">
          <form method="post">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Ваше Имя:" name="name" required><br>
              <textarea class="form-control" rows="3" name="text" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
          </form>
        </div>
      </div>
    <?php echo '<?php ';?>} else { <?php echo '?>';?>

    <?php echo '<?php ';?>} <?php echo '?>';?>
    <!-- Комментарии, которые оставили гости -->
    <h5 class="comment">Комментарии:</h5>
    <?php echo '<?php ';?>foreach($result as $res) { <?php echo '?>';?>
      <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="https://img.icons8.com/nolan/48/000000/user.png" alt="">
        <div class="media-body">
          <h5 class="mt-0"><?php echo '<?php ';?>echo $res['name'];<?php echo '?>';?> 
          <?php echo '<?php ';?>if($_SESSION['admin']){ <?php echo '?>';?>
            <a href="post.php?post_id=<?php echo '<?=';?>$separate_post['id']<?php echo '?>';?>&del_comment=<?php echo '<?=';?>$res['id']<?php echo '?>';?>" class="guest" style="color: gray;font-weight:100;font-size:14px;float: right;">Удалить</a>
          <?php echo '<?php ';?>} <?php echo '?>';?>
        </h5>
        <?php echo '<?php ';?>echo $res['text']; <?php echo '?>';?>
        <hr>
      </div>
    </div>
  <?php echo '<?php ';?>} <?php echo '?>';?>
</div>
<!-- Вывод записей по категориям -->
<div class="col-md-4">
  <div class="card my-4">
    <h5 class="card-header">Категории записей</h5>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
           <?php echo '<?php ';?>foreach($categories as $category){ <?php echo '?>';?>
            <li><a href="category.php?id=<?php echo '<?=';?>$category["id"]<?php echo '?>';?>"><?php echo '<?=';?>$category["title"]<?php echo '?>';?></a><li>
            <?php echo '<?php ';?>} <?php echo '?>';?>
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
<!-- Подвал сайта -->
<?php echo '<?php

';?>require_once '../parts/footer.php';

<?php echo '?>';
}
}
