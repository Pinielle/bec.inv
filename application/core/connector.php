<?php

class Connector
{
    private $conn;
    private $host;
    private $database;
    private $user;
    private $pass;

    public function __construct()
    {
        $this->host = DB_HOSTNAME;
        $this->database = DB_DATABASE;
        $this->user = DB_USERNAME;
        $this->pass = DB_PASSWORD;

        $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->pass);
    }

    /**
     * @return PDO
     */
    public function getConn()
    {
        return $this->conn;
    }

    public function insert($table = '', $attribute = '', $value = '')
    {
        $sql = null;
        try {
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO $table ($attribute) VALUES ('$value')";
            $this->conn->exec($sql);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $this->conn = null;
    }
}

