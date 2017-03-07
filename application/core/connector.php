<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 06.03.17
 * Time: 16:24
 */
class Connector
{
    public function indexAction()
    {
        $server = "localhost";
        $user = "root";
        $pass = "mul2ler0";
        $database = "bec_inv";

        $connectbd = mysql_connect($server,$user,$pass);
        mysql_select_db($database);

        return $connectbd;
    }
}