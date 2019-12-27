<?php

require 'autoload.php';

//var_dump($_POST);

if (isset($_POST)) {
  //echo 'Post is set';

  $deleteComment = new DbDeleting;
  $deleteComment->connectToDb();
  $deleteComment->deleteComment($_POST['commentId']);

  header('Location: single-post.php?id=' . $_POST['postIdFromComments']);//WILL REROUT TO THE RIGHT SINGLE-PAGE WITH THE RIGHT POST IN IT
  die();
} 