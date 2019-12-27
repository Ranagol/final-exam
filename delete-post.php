<?php

require 'autoload.php';

//var_dump($_POST);

if (isset($_POST)) {
  //echo 'Post is set';
  $deleteComment = new DbDeleting;
  $deleteComment->connectToDb();
  $deleteComment->deletePost($_POST['postId']);

  header('Location: posts.php');//WILL RE-ROUTE TO POSTS AFTER DELETING
  die();
} 
