<?php

class Database
{
  private $host = 'localhost';
  private $db_name = 'scandiweb';
  private $username = 'root';
  private $password = '';
  private $conn = null;

  public function connect()
  {
    try {
      $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    } catch (PDOExeption $e) {
      echo $e->getMessage();
    }
    return $this->conn;
  }
}




?>