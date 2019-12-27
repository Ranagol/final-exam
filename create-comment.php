<?php

require 'autoload.php';

//UPISATI PODATAK U BAZU
//var_dump($_POST);
if (isset($_POST)) {
  //echo 'Post is set';
  

  //NAMESTANJE VARIJABLI
  $author = $_POST['author'];
  $text = $_POST['text'];
  $post_id = $_POST['post_id'];

  //VALIDACIJA DA LI SU POLJA PRAZNA
  $proveraStringova = new Validator;
  $author = $proveraStringova->isNotEmptyString($author);
  $text = $proveraStringova->isNotEmptyString($text);
  $post_id = $proveraStringova->isNotEmptyString($post_id);


  //VALIDACIJA < > / ... PROBLEMATICNIH KARAKTERA
  $author = $proveraStringova->removeSpecialCharacters($author);
  $text = $proveraStringova->removeSpecialCharacters($text);
  $post_id = $proveraStringova->removeSpecialCharacters($post_id);


  //RAD SA DATABAZOM
  $dbInsert = new DbWriting;
  $dbInsert->connectToDb();
  $dbInsert->insertComment($author, $text, $post_id);

  header('Location: single-post.php?id=' . $_POST['post_id']);//WILL RE-ROUTE AFTER CREATING A NEW COMMENT IN THE DB
  die();
} 

 














