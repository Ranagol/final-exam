<?php

class Db
{

  private $servername = "localhost";
  private $username = "username";
  private $password = "password";
  private $conn;


  public function connectToDb()
  {
    $this->conn = mysqli_connect($this->servername, $this->username, $this->password); // Create connection
    if (!$this->conn) { // Check connection
      die("Connection failed: " . mysqli_connect_error());
    } else {
      echo "Connected successfully";
    }
  }
}
