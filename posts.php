<?php
require 'autoload.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/blog.css">
  <link rel="stylesheet" href="styles/styles.css">
  <title>Zavrsni rad</title>
</head>

<body>
  

  <?php
    require 'elements/header.php';
    $connect = new Db;
    $connect->connectToDb();
    $posts = $connect->getPosts();
  ?>

  <main role="main" class="container">
    
    <div class="row">
      <div class="col-sm-8 blog-main">
      <?php
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
</body>

</html>