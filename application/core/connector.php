<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 06.03.17
 * Time: 16:24
 */
class Connector
{
    private $conn;
    private $host;
    private $database;
    private $user;
    private $pass;



    public function __construct(){

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

}