<?php

class Database {

    private $host = "retailpro.cobshee2rf93.ap-south-1.rds.amazonaws.com";
    private $database_name = "retailpro_db";
    private $username = "enflowsa";
    private $password = "HRSU6DDDPiw0IkOgT4JY";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Database could not be connected: " . $exception->getMessage();
        }
        return $this->conn;
    }

}

?>