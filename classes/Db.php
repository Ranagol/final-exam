<?php

class Db{
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

  public function getPosts(){//ORIGINAL GETPOSTS
    $sql = "SELECT id, title,body, author, created_at FROM posts ORDER BY created_at DESC";
    $result = mysqli_query($this->conn, $sql);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);//creating loopable arrays
    //var_dump($posts);
    
    if (isset($posts)) {
      //echo 'Post is set';
    } else {
      echo "0 results";
    }
    return $posts;
  }

  public function getSinglePost($id){
    $sql = "SELECT id, title, body, author, created_at FROM posts WHERE id = $id";
    $result = mysqli_query($this->conn, $sql);
    $singlePost = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //var_dump($singlePost);
    return $singlePost;
  }

  public function getComments($id){
    $sql = "SELECT * FROM comments WHERE post_id = $id";
    $result = mysqli_query($this->conn, $sql);
    $comments = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //var_dump($comments);
    return $comments;
  }

  
  
}


