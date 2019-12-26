<?php


require 'autoload.php';

//UPISATI PODATAK U BAZU
//var_dump($_POST);
if (isset($_POST)) {
  //echo 'Post is set';
  $author = $_POST['author'];
  $text = $_POST['text'];
  $post_id = $_POST['post_id'];
  $dbInsert = new DbWriting;
  $dbInsert->connectToDb();
  $dbInsert->insertComment($author, $text, $post_id);
  header('Location: single-post.php?id=' . $_POST['post_id']);
  die();
} else {
  //echo "POST is not set";
}
  //var_dump($author);












