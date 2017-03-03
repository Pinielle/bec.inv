<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 03.03.17
 * Time: 11:29
 */
    class Controller_Index extends Controller
    {

        function __construct()
        {
            $this->model = new Model_Index();
            $this->view = new View;
        }

        function indexAction()
        {

            $this->view->generate('View_Head.php', 'View_Footer.php');
        }
    }