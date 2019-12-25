<?php

class Db
{

  private $servername = "localhost";
  private $username = "root";
  private $password = "";
  private $conn;


  public function connectToDb() {
    try {
      $this->conn = new PDO("mysql:host=$this->servername;dbname=final-exam", $this->username, $this->password);   
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// set the PDO error mode to exception
      echo "Connected successfully";
    }
    catch(PDOException $e){
      echo "Connection failed: " . $e->getMessage();
    }
  }
}
