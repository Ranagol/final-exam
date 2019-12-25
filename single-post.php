<?php
spl_autoload_register('myAutoloader');
function myAutoloader($className){
    include 'classes/' . $className . '.php';
}
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
    //var_dump($_GET);
    $connect = new Db;
    $connect->connectToDb();
    $singlePost = $connect->getSinglePost($_GET['id']);
    $comments = $connect->getComments($_GET['id']);
    //var_dump($comments);
  ?>

  <main role="main" class="container">
    
    <div class="row">
      <div class="col-sm-8 blog-main">
      <?php
        
        //OVO JE POST DEO
        echo '<div class="blog-post">';
        echo '<h2 class="blog-post-title">' . '<a href="single-post.php?id=' . $singlePost[0]["id"] . '">' . $singlePost[0]["title"] . '</a>' . '</h2>';
        echo '<p class="blog-post-meta">' . $singlePost[0]['created_at'] . ' by ' . '<a href="#">' . $singlePost[0]['author'] . '</a></p>';
        echo '<p>' . $singlePost[0]['body'] . '</p><hr></div>';
      ?>
      <!--NAPISI KOMENTAR-->
      <form action="" method="post">
        <div class="form-group">
          <label for="komentari">Napisi komentar</label>
          <textarea class="form-control" id = 'komentari' name="comment" placeholder = "Ja mislim da..."  rows="3"></textarea>
        </div>
        <input class="btn btn-success" type="submit" value="Posalji komentar">
      </form>
       
      
      <?php  
        //KOMENTARI POVUCENI IZ DB
        echo '<hr>';
        echo '<h4 class="blog-post">Komentari</h4>';
        echo '<ul>';
        foreach ($comments as $comment) {
          echo '<li>' . $comment['author'] . ': ' . $comment['text'].'</li><hr>'; 
        }
        echo '</ul>';
      ?>

      </div><!-- /.blog-main -->
    </div><!-- /.row -->
  </main><!-- /.container -->




  <?php
    require 'elements/footer.php';
  ?>

</body>

</html>