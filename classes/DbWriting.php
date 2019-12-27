<?php


class DbWriting extends DBConnection{


  public function insertComment($author, $text, $post_id){
    $sql = "INSERT INTO comments (author, text, post_id) VALUES('$author','$text', '$post_id')";
    $result = mysqli_query($this->conn, $sql);
    if (!$result) {
      //echo 'mySQL query failed';
    } else{
      //echo 'mySQL query successfull';
    }
  }

  public function insertPost($title, $body, $author){
    $sql = "INSERT INTO posts (title, body, author) VALUES('$title', '$body','$author')";
    $result = mysqli_query($this->conn, $sql);
    if (!$result) {
      echo 'mySQL query failed';
    } else{
      //echo 'mySQL query successfull';
    }
  }

}