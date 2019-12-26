<?php


require 'autoload.php';

//UPISATI PODATAK U BAZU
//var_dump($_POST);
if (isset($_POST)) {
  //echo 'Post is set';
  $author = htmlspecialchars($_POST['author']);
  $text = htmlspecialchars($_POST['text']);
  $post_id = htmlspecialchars($_POST['post_id']);
  $dbInsert = new DbWriting;
  $dbInsert->connectToDb();
  $dbInsert->insertComment($author, $text, $post_id);
  header('Location: single-post.php?id=' . $_POST['post_id']);
  die();
} else {
  //echo "POST is not set";
}
  //var_dump($author);












