<?php
  require 'autoload.php';
  require 'elements/header.php';
  $connect = new DbReading;
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
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete post</button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Warning: you are about to delete this post.</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          Do you really want to delete this post?
          </div>
          <div class="modal-footer">
            <form action="delete-post.php" method="post" >
              
              <!--YES BUTTON-->
              <button  type="submit" class="btn btn-danger" name='delete' value='delete'>Yes</button>
              <input type='hidden' name='postId' value="<?php echo $singlePost[0]["id"]?>">
              
            </form>
            <!--<button type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>-->
            <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
          </div>
        </div>
      </div>
    </div>


    <!--NAPISI KOMENTAR-->
    
    <form action="create-comment.php" method="post">
      <div class="form-group">

        <!--SPECIJALNI DIV ZA POZIVANJE UPOZORENJA ZA PRAZNE FIELDOVE-->
        <div  
          <?php 
            if (!isset($_GET['hasValidationError'])){//ako postoji hasvalidation varijabla u GET, onda echo hidden
              echo 'hidden';
            }
          ?>
         class="alert alert-danger">Kod slanja komentara polja sa imenom i sa komentarom moraju biti popunjena.</div>

        <!--FORMA ZA PISANJE KOMENTARA-->
        <label for="komentari">Napisi komentar</label>
        <textarea class="form-control" id = 'komentari' name="text" placeholder = "Ja mislim da..."  rows="3"></textarea><!--required namerno izostavljen-->
        
        <label for="imena" >Upisi ime (obavezno)</label>
        <input class="form-control" placeholder='Ime' id="imena" name='author' type="text" ><!--required namerno izostavljen-->
        
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





<script src="javascript.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php
  require 'elements/footer.php';
?>

