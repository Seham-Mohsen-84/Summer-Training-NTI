<?php
class Database{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "training_system";
    private $port = "3307";

    public $conn;
    public function connect(){
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname, $this->port);
        if($this->conn->connect_error){
            die("Connection failed: " . $this->conn->connect_error);
        }
        return $this->conn;
    }
}