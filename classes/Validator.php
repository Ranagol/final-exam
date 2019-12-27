<?php


class Validator{

  public function isNotEmptyString($data){
    $t=1;
    if ($data !== '' ) {
      return $data;
    } else {
      //aktiviraj div na single-post.php
      header('Location: single-post.php?id=' . $_POST['post_id'] . '&hasValidationError');
      die();
    }
    
  }


  public function removeSpecialCharacters($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
}