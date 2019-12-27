<?php

require 'autoload.php';

//UPISATI PODATAK U BAZU
//var_dump($_POST);
if (isset($_POST)) {
  //echo 'Post is set';
  //VALIDACIJA I NAMESTANJE VARIJABLI IZ POST GLOBALA
  $proveraStringova = new Validator;
  $author = $proveraStringova->validacija($_POST['author']);
  $text = $proveraStringova->validacija($_POST['text']);
  $post_id = $proveraStringova->validacija($_POST['post_id']);


  //RAD SA DATABAZOM
  $dbInsert = new DbWriting;
  $dbInsert->connectToDb();
  $dbInsert->insertComment($author, $text, $post_id);

  header('Location: single-post.php?id=' . $_POST['post_id']);//WILL RE-ROUTE AFTER CREATING A NEW COMMENT IN THE DB
  die();
} 

 














