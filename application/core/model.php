<?php

/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 09.02.17
 * Time: 12:44
 */
class Model
{
    protected $_tableName;
    protected $_dbConnection;

    public function __construct()
    {
        $dbModel = new DataBase();
        $this->_dbConnection = $dbModel->getDB();
    }

    public function getTableName()
    {
        return $this->_tableName;
    }
}