<?php

class DbDeleting{
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

  public function deleteComment($commentId){
    $sql = "DELETE FROM comments WHERE id = $commentId";
    $result = mysqli_query($this->conn, $sql);
    
  }

  public function deletePost($postId){
    $sql = "DELETE FROM posts WHERE id = $postId";
    $result = mysqli_query($this->conn, $sql);
    
  }


}