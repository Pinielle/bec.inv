<?php

/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 03.03.17
 * Time: 11:29
 */
class Controller_Index extends Controller
{
    /**
     * Main index action
     */
    public function indexAction()
    {
        $sql = 'SELECT * FROM settings';
        $conn_a = new Connector();
        $conn=$conn_a->getConn();
        foreach ($conn->query($sql) as $row)
        {

            print $row['title'] . "<br>\t";
            print $row['text'] . "<br>\t";
            print $row['page'] . "<br>\n";
        }
        Runner::getInstance('Connector');
        Runner::getInstance('View')->renderTemplate('header');
        Runner::getInstance('View')->renderTemplate('index');
        Runner::getInstance('View')->renderTemplate('footer');

    }
}
