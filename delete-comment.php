<?php


require 'autoload.php';


var_dump($_POST);
/*
if (isset($_POST)) {
  //echo 'Post is set';

  $dbInsert = new DbWriting;
  $dbInsert->connectToDb();
  $dbInsert->insertComment($author, $text, $post_id);
  header('Location: single-post.php?id=' . $_POST['post_id']);
  die();
} else {
  //echo "POST is not set";
}
  //var_dump($author);*/