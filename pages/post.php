<?php

//Подключение шапки сайта
require_once '../parts/header.php';
//Подключение к БД
require_once '../database/connect.php';
//Подключение файла, в котором содержатся объявления переменных, а также функции
require_once '../ads/ads_post.php';

?>

<div class="container">
  <div class="row">
    <div class="col-lg-8 animated delay-1s fadeIn">
      <!-- Заголовок, дата публикации, текст статьи -->
      <h1 class="mt-4"><?php echo $separate_post['title']; ?></h1>
      <hr>
      <p>Опубликовано: <?php echo $separate_post['datetime']; ?>
    </p>
    <hr>
    <img class="img-fluid rounded" src="../<?php echo $separate_post['image']; ?>" alt="">
    <hr>
    <p><?php echo nl2br($separate_post['text']); ?></p>
    <a href="/" class="btn btn-primary">&larr; На главную</a>
    <?php if(isset($_SESSION['admin'])){ ?>
      <a href="../app/admin/edit.php?post_id=<?=$separate_post['id']?>" class="btn btn-primary" style="float:right;background-color:#5fb053">Редактировать</a>
    <?php } ?>
    <hr>
    <!-- Форма с добавлением комментария к статье, а также условие для админа. 
    Если сессия админ, то предоставь для него возможность
    удалять комментарии, которые оставили гости -->
    <?php if(isset($_SESSION['admin'])){ ?>

    <?php } else { ?>
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
    <?php } ?>
    <!-- Комментарии, которые оставили гости -->
    <h5 class="comment">Комментарии:</h5>
    <?php foreach($result as $res) { ?>
      <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="https://img.icons8.com/nolan/48/000000/user.png" alt="">
        <div class="media-body">
          <h5 class="mt-0"><?php echo $res['name'];?>
          <?php if(isset($_SESSION['admin'])){ ?>
            <a href="post.php?post_id=<?=$separate_post['id']?>&del_comment=<?=$res['id']?>" class="guest" style="color: gray;font-weight:100;font-size:14px;float: right;">Удалить</a>
          <?php } ?>
        </h5>
        <?php echo $res['text']; ?>
        <hr>
      </div>
    </div>
  <?php } ?>
</div>
<!-- Вывод записей по категориям -->
<div class="col-md-4">
  <div class="card my-4">
    <h5 class="card-header">Категории записей</h5>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
           <?php foreach($categories as $category){ ?>
            <li><a href="category.php?id=<?=$category["id"]?>"><?=$category["title"]?></a><li>
            <?php } ?>
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
<?php

require_once '../parts/footer.php';

?>
