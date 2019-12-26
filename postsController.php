<?php


require 'autoload.php';

//UPISATI PODATAK U BAZU
//var_dump($_POST);
if (isset($_POST)) {
  //echo 'Post is set';
  //VALIDACIJA I NAMESTANJE VARIJABLI IZ POST GLOBALA
  $proveraStringova = new Validator;
  $title = $proveraStringova->validacija($_POST['title']);
  $body = $proveraStringova->validacija($_POST['body']);
  $author = $proveraStringova->validacija($_POST['author']);


  //RAD SA DATABAZOM
  $dbInsert = new DbWriting;
  $dbInsert->connectToDb();
  $dbInsert->insertPost($title, $body, $author);

  header('Location: posts.php');
  die();
  
} 



