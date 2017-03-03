<?php

/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 13.02.17
 * Time: 12:14
 */
class DataBase
{

    public $_db;

    public function getDb()
    {
        $this->_db = mysql_connect("localhost", "root", "root");
        mysql_select_db("bec_inv", $this->_db);
        return $this->_db;
    }
}