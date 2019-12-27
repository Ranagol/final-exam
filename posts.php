<?php
  require 'autoload.php';
  require 'elements/header.php';
  $connect = new DbReading;
  $connect->connectToDb();
  $posts = $connect->getPosts();
?>

<main role="main" class="container">
  
  <div class="row">
    <div class="col-sm-8 blog-main">
    <?php
    //PRIKAZIVANJE SVIH POSTOVA NA POSTS STRANI
      foreach ($posts as $post) {     
        echo '<div class="blog-post">';
        echo '<h2 class="blog-post-title">' . '<a id="naslov2" href="single-post.php?id=' . $post["id"] . '">' . $post["title"] . '</a>' . '</h2>';
        echo '<p class="blog-post-meta">' . $post['created_at'] . ' by ' . '<a href="#">' . $post['author'] . '</a></p>';
        echo '<p>' . $post['body'] . '</p><hr></div>';
      }
      
    ?>
      

    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
    </nav>

    </div><!-- /.blog-main -->
    <?php
      require 'elements/sidebar.php';
    ?>
  </div><!-- /.row -->
</main><!-- /.container -->


<?php
require 'elements/footer.php';
?>
