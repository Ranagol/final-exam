<?php

class DbReading extends DbConnection{
  

  public function getPosts(){
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

  public function get5Posts(){
    $sql = "SELECT id, title,body, author, created_at FROM posts ORDER BY created_at DESC LIMIT 5";
    $result = mysqli_query($this->conn, $sql);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
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


