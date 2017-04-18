<?php

class Connector
{
    const USER_ID = ':id';
    const EMAIL = ':email';
    const PASSWORD =':password';
    const FIRSTNAME =':firstname';
    const LASTNAME =':lastname';
    const ACL =':acl';
    const LOGINTIME =':logintime';

    public $isConn;
    protected $db;
    public $_table;
    public $insertData;
    public $values;
    public $data;
    public $email;
    public $password;
    public $firstname;
    public $lastname;
    public $acl;
    public $logintime;
    public $condition;
    public $id;

    public function __construct(
        $username = DB_USERNAME,
        $password = DB_PASSWORD,
        $host = DB_HOSTNAME,
        $dbname= DB_DATABASE)
    {
        $this->isConn = TRUE;
        try
        {
            $this->db = new  PDO("mysql:host={$host};dbname={$dbname};charset=utf8",$username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        }
        catch (PDOException $e)
        {
            throw new Exception($e->getMessage());

        }
    }

    //disconnect from db
    public function Disconnect()
    {
        $this->db = NULL;
        $this->isConn = FALSE;
    }

    /**
     * @return mixed
     */
    public function getData()
    {

        return $this->data;
    }





}

