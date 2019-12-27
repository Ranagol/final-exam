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
    $singlePost = $connect->getSinglePost($_GET['id']);
    $comments = $connect->getComments($_GET['id']);
  ?>

  <main role="main" class="container">
    <div class="row">
      <div class="col-sm-8 blog-main">
      <?php
        
        //DETALJNO PRIKAZIVANJE POJEDINACNOG POSTA
        echo '<div class="blog-post">';
        echo '<h2 class="blog-post-title">' .  $singlePost[0]["title"] . '</h2>';

        echo '<p class="blog-post-meta">' . $singlePost[0]['created_at'] . ' by ' . '<a href="#">' . $singlePost[0]['author'] . '</a></p>';

        echo '<p>' . $singlePost[0]['body'] . '</p><hr></div>';
      ?>


      <!--BRISANJE POSTA-->

      <form action="delete-post.php" method="post" >

        <!--BUTTON-->
        <button  id="delete-button" class="btn btn-danger delete-button"  name='delete' value='delete'>Delete post</button>
        <input type='hidden' name='postId' value="<?php echo $singlePost[0]["id"]?>">
        <br>
        <hr>

      </form>
      


      <!--NAPISI KOMENTAR-->
      <form action="create-comment.php" method="post">
        <div class="form-group">

          <label for="komentari">Napisi komentar</label>
          <textarea class="form-control" id = 'komentari' name="text" placeholder = "Ja mislim da..."  rows="3" required></textarea>
          
          <label for="imena" >Upisi ime (obavezno)</label>
          <input class="form-control" placeholder='Ime' id="imena" name='author' type="text" required>
          
          <input type="hidden" name="post_id" value="<?php echo $singlePost[0]["id"] ?>" /><!--hidden post_id 
          sending in the background -->

        </div>
        <input class="btn btn-success" type="submit" value="Posalji komentar">
      </form>
       
      
      <?php  
        
        //KOMENTARI POVUCENI IZ DB
        
        echo '<hr>';
        echo '<div id="div-comment">';

          echo '<div>';
            echo '<h4 class="blog-post">Komentari</h4>';//NASLOV KOMENTARA
          echo '</div>';

          echo '<div>';
            echo '<button id="hide-button" class="btn btn-outline-primary">Hide comments</button>';
          echo '</div>';

        echo '</div>';
        
        echo '<div id="div-hide">';//POMOCU OVOG DIVA SAKRIVAMO KOMENTARE
        echo '<ul>';
        
        //PRIKAZIVANJE KOMENTARA
        foreach ($comments as $comment) {
          echo '<div id="div-comment">';
            echo '<div>';
              echo '<li>' . $comment['author'] . ': ' . $comment['text'] . '</li>';
            echo '</div>';

            //BRISANJE KOMENTARA
            $commentId = $comment['id'];
            $postIdFromComments = $comment['post_id'];

            $html = "
              <div>
                <form action='delete-comment.php' method='post'>
                  <button class='btn btn-outline-danger' name='delete' value='delete'>Delete comment</button>
                  <input type='hidden' name='commentId' value='$commentId'>
                  <input type='hidden' name='postIdFromComments' value='$postIdFromComments'>
                </form>
                <hr>
              </div></div>
            ";
            echo $html;
        }
        echo '</ul>';
        echo '</div>';
      ?>

      <!-- SIDEBAR -->
      </div><!-- /.blog-main -->
        <?php
          require 'elements/sidebar.php';
        ?>
      </div><!-- /.row -->
  </main><!-- /.container -->




  <?php
    require 'elements/footer.php';
  ?>
  <script src="javascript.js"></script>
</body>

</html>