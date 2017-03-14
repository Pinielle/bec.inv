<?php

class Connector
{
    public $isConn;
    protected $datab;


    public function __construct($username = DB_USERNAME, $password = DB_PASSWORD, $host = DB_HOSTNAME, $dbname= DB_DATABASE)
    {
        $this->isConn = TRUE;
        try
        {
            $this->datab = new  PDO("mysql:host={$host};dbname={$dbname};charset=utf8",$username, $password);
            $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        }
        catch (PDOException $e)
        {
            throw new Exception($e->getMessage());

        }
    }




    //disconnect from db
    public function Disconnect()
    {
        $this->datab = NULL;
        $this->isConn = FALSE;
    }

    //get row
    public function getRow($table, $param, $value )
    {
       $query = "SELECT * FROM $table WHERE $param = $value";

        try
        {
            $stmt = $this->datab->prepare($query);
            $stmt->execute();
            return $stmt->fetch();
        }
        catch (PDOException $e)
        {
            throw new Exception($e->getMessage());
        }
    }

    //get rows

    public function getRows($query, $params =[])
    {

        try
        {
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll();
        }
        catch (PDOException $e)
        {
            throw new Exception($e->getMessage());
        }
    }

    //insert row
    public function insertROw($table, $param, $value )
    {
        $query = "INSERT INTO $table WHERE $param = $value";
        try
        {
            $stmt = $this->datab->prepare($query);
            $stmt->execute();
            return TRUE;
        }
        catch (PDOException $e)
        {
            throw new Exception($e->getMessage());
        }
    }

    //update row
    public function updateRow($query, $params =[])
    {
        $this->insertROw($query, $params);
    }

    //delete row
    public function deleteRow($query, $params =[])
    {
        $this->insertROw($query, $params);
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

