<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 13.02.17
 * Time: 12:27
 */
class Controller_Login extends Controller
{
    public function indexAction()
    {
        Runner::getInstance('View')->renderTemplate('header');
        Runner::getInstance('View')->renderTemplate('login');
        Runner::getInstance('View')->renderTemplate('footer');
    }

    public function postAction()
    {

    }
}