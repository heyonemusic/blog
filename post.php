<?php
//Подключение к БД
require_once 'includes/connect.php';
//Подключение функций
require_once 'includes/function.php';

//Возможность удалить комментарий для админа
if(isset($_GET['del_comment'])){
  $id = ($_GET['del_comment']);
  $query = "DELETE FROM comments WHERE id = $id";
  mysqli_query($connect, $query);
}

//Добавление комментария к статье
add_comment($connect, $post_id);
//Получение ID поста и присвоение в переменную
$post_id = $_GET['post_id'];
//Вывод конкретного поста по ID
$separate_post = get_post_by_id($post_id);
//Вывод категорий
$categories = get_category($connect);
//Вывод комментариев, оставленных пользователями
$result = pin_comment($connect, $post_id);
//Подключение шапки сайта
require_once 'includes/header.php';

?>

<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Post Content Column -->
    <div class="col-lg-8 animated delay-1s fadeIn">

      <!-- Title -->


      <h1 class="mt-4"><?php echo $separate_post['title']; ?></h1>





        <!-- Author 
        <p class="lead">
          by
          <a href="#">Start Bootstrap</a>
        </p>
      -->

      <hr>
      <!-- Date/Time -->
      <p>Опубликовано: <?php echo $separate_post['datetime']; ?>
    </p>


    <hr>

    <!-- Preview Image -->
    <img class="img-fluid rounded" src="<?php echo $separate_post['image']; ?>" alt="">

    <hr>

        <!-- Post Content 
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>
      -->
      <p><?php echo nl2br($separate_post['text']); ?></p>
      <a href="/" class="btn btn-primary">&larr; На главную</a>

<!--
        <blockquote class="blockquote">
          <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
          <footer class="blockquote-footer">Someone famous in
            <cite title="Source Title">Source Title</cite>
          </footer>
        </blockquote>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>
        -- >
        <hr>

        <!-- Comments Form -->
        <?php if(!$_SESSION['admin']){ ?>
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
        <?php } else { ?>

        <?php } ?>

        <!-- Single Comment     -->
        <h5 class="comment">Комментарии:</h5>
        <?php foreach($result as $res) { ?>
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="https://img.icons8.com/nolan/48/000000/user.png" alt="">
            <div class="media-body">
              <h5 class="mt-0"><?php echo $res['name'];?> 
              <?php if($_SESSION['admin']){ ?>
                <a href="post.php?post_id=<?=$separate_post['id']?>&del_comment=<?=$res['id']?>" class="guest" style="color: gray;font-weight:100;font-size:14px;float: right;">Удалить</a>
              <?php } ?>
            </h5>
            <?php echo $res['text']; ?>
            <hr>
          </div>
        </div>
      <?php } ?>
    </div>

    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">
      <!-- Categories Widget -->
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

          <!-- Side Widget 
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>
        -->

        <div class="card my-4">
          <h5 class="card-header">Актуальное время</h5>
          <div class="card-body" style="height: 170px;">
            <iframe  frameborder="no" scrolling="no" width="280" height="150" src="https://yandex.ru/time/widget/?geoid=213&lang=ru&layout=horiz&type=digital&face=serif"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php

  require_once 'includes/footer.php';

  ?>
