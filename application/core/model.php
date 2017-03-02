<?php

/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 09.02.17
 * Time: 12:44
 */
class Model
{
    protected $tablename;
    protected $dbConnection;

    public function __construct()
    {
        $dbModel = new DataBase();
        $this->dbConnection = $dbModel->getDB();
    }

    public function getTableName()
    {
        return $this->tablename;
    }
}