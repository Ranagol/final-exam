<?php


require 'autoload.php';


var_dump($_POST);

if (isset($_POST)) {
  //echo 'Post is set';

  $deleteComment = new DbDeleting;
  $deleteComment->connectToDb();
  $deleteComment->deleteComment($_POST['commentId']);
  //header('Location: single-post.php?id=' . $_POST['post_id']);//trebace nam i post_id na ovoj strani...
  //die();
} 