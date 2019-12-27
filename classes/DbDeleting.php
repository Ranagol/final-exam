<?php

class DbDeleting extends DBConnection{
 

  public function deleteComment($commentId){
    $sql = "DELETE FROM comments WHERE id = $commentId";
    $result = mysqli_query($this->conn, $sql);
    
  }

  public function deletePost($postId){
    $sql = "DELETE FROM posts WHERE id = $postId";
    $result = mysqli_query($this->conn, $sql);
    
  }


}