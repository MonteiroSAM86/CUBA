<?php 
class Database {
    // Connection variables
    private $host = "localhost"; //81.88.52.85
    private $dbName = "condominio"; //co3wzjcg_condominio
    private $username = "root";//co3wzjcg_HUGO
    private $password = ""; //Insta360!

    public $conn;

    // Method return security connection
    public function dbConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->username, $this->password, array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ));
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}

?>