<?php


class Validator{

  public function isNotEmptyString($data){
    $t=1;
    if ($data !== '' ) {
      return $data;
    } else {
      //aktiviraj div na single-post.php
      header('Location: single-post.php?id=' . $_POST['post_id'] . '&hasValidationError');//dakle, treba da znamo na koji post se vracamo, zato koristimo post_id, sa kojim saljemo hasValidationError praznu varijablu. Na single-post: ako ova varijabla postoji (isset(hasvalidationError)) u GET globalu onda pokazi div sa upozorenjem. Ako hasValidationError ne postoji, onda za dati div echo 'hidden', pa samim tim div sa upozorenjem se nece videti. Ako imamo prazan string za validaciju, odmah se vrsi redirekcija sa upozorenjem, i ostatak validacije se ne radi.
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