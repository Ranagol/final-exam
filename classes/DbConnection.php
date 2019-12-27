<?php

class DbConnection{
  protected $servername = "localhost";
  protected $username = "root";
  protected $password = "";
  public $conn;
  protected $dbname = "final-exam";

  
  public function connectToDb() {
    // Create connection
    $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
    // Check connection
    if (!$this->conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected successfully3";
  }
}

