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
        $this->_helperModel->getViewModel()->renderTemplate('header');
        $this->_helperModel->getViewModel()->renderTemplate('login');
        $this->_helperModel->getViewModel()->renderTemplate('footer');
    }


}