<?php
class Database{
    private $host = "localhost";
    private $user = "root";
    private $pass = "R1zk!271104";
    private $db_name = "db_dairy";
    public $conn;

    public function __construct(){
        $this -> conn = new mysqli($this -> host,$this -> user,$this -> pass,$this -> db_name);
        if ($this -> conn->connect_error){
            die("Koneksi gagal: ". $this -> conn -> connect_error);
        }
    }
}
?>