<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 13.02.17
 * Time: 12:14
 */
    class DataBase {

        public $db;

        public function getDB()
        {
            $db = mysql_connect("localhost","root","root");
            mysql_select_db("bec_inv",$db);
            return $this->db;
        }
    }