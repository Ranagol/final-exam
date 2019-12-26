<?php


class DbWriting{
  private $servername = "localhost";
  private $username = "root";
  private $password = "";
  public $conn;
  private $dbname = "final-exam";

  
  public function connectToDb() {
    // Create connection
    $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
    // Check connection
    if (!$this->conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected successfully3";
  }

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