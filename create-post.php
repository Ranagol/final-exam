<?php
  require 'elements/header.php';
?>

<main role="main" class="container">
  <div class="row">
    <div class="col-sm-8 blog-main">
      <h2>Kreiraj novi post</h2>

      <form action="postsController.php" method="post">
        <div class="form-group">

          <label for="posttitle">Naslov novog posta</label>
          <input class="form-control" placeholder='Naslov' id="posttitle" name='title' type="text" required>

          <label for="posttext">Nov post</label>
          <textarea class="form-control" id = 'posttext' name="body" placeholder = "Once upon a time..."  rows="3" required></textarea>

          <label for="postAuthor" >Ime autora</label>
          <input class="form-control" placeholder='Autor' id="postAutor" name='author' type="text" required>

        </div>
        <input class="btn btn-success" type="submit" value="Posalji">
      </form>

    </div><!-- /.blog-main -->
    <?php
      require 'elements/sidebar.php';
    ?>
  </div><!-- /.row -->
</main><!-- /.container -->    


<?php
  require 'elements/footer.php';
?>

