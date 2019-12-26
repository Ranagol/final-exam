<?php
    require_once 'autoload.php';
    $connect = new Db;
    $connect->connectToDb();
    $posts = $connect->getPosts();
  ?>


<aside class="col-sm-3 ml-sm-auto blog-sidebar">
  <div class="sidebar-module sidebar-module-inset">
    <h4>Latest posts</h4>
    <?php
      foreach ($posts as $post) {     
        echo '<a id="naslov2" href="single-post.php?id=' . $post["id"] . '">' . $post["title"] . '</a><br>';
        
      }
        
    ?>
  </div>
</aside><!-- /.blog-sidebar -->