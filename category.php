<?php

require_once 'includes/connect.php';
require_once 'includes/header.php';
$categories = get_category($connect);
$posts = get_posts($connect);
$category_id = $_GET['id'];
$posts = get_posts_by_category($connect, $category_id);

?>

<!-- Page Content -->
<div class="container">
  <div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8 animated delay-1s fadeIn">
      <h1 class="my-4">Категория:
        <small><?=get_category_title($_GET['id'])?></small>
      </h1>
      <!-- Blog Post -->
      <?php foreach($posts as $post){ ?>
        <div class="card mb-4">
          <img class="card-img-top" src="<?php echo $post['image']; ?>" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title"><?php echo $post['title']; ?></h2>
            <p class="card-text"><?php echo mb_substr(strip_tags($post['text']), 0, 200) . '...'; ?></p>
            <a href="post.php?post_id=<?=$post['id']?>" class="btn btn-primary">Читать полностью &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Опубликовано: <?php echo $post['datetime']; ?>
          </div>
        </div>
      <?php } ?>

      <!-- Pagination -->
    </div>

    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">


      <!-- Categories Widget -->
      <div class="card my-4">
        <h5 class="card-header">Категории записей:</h5>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
               <?php foreach($categories as $category){ ?>
                <li><a href="category.php?id=<?=$category["id"]?>"><?=$category["title"]?></a><li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Side Widget -->
      <div class="card my-4">
        <h5 class="card-header">Актуальное время</h5>
        <div class="card-body" style="height: 170px;">
          <iframe  frameborder="no" scrolling="no" width="280" height="150" src="https://yandex.ru/time/widget/?geoid=213&lang=ru&layout=horiz&type=digital&face=serif"></iframe>
        </div>
      </div>

    </div>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<?php

require_once 'includes/footer.php';

?>