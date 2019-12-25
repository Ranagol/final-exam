<?php

class Db
{

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

  public function getPosts(){
    $sql = "SELECT title, author, created_at FROM posts ORDER BY created_at DESC";
    $result = mysqli_query($this->conn, $sql);
    //var_dump($result);

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      echo "<table class = 'table' ><tr><th>Naslov</th><th>Autor</th><th>Datum</th></tr>";
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["title"]."</td><td>".$row["author"]."</td><td> ".$row["created_at"]."</td></tr>";
      }
      echo "</table>";
    } else {
      echo "0 results";
    }    
  }
  
}


