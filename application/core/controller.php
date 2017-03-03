<?php

/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 09.02.17
 * Time: 12:44
 */
class Controller
{
    /** Defined by default in __construct */
    public $_helperModel;

    public function __construct()
    {
        /** Define helper Model */
        $this->_helperModel = new Helper();
    }

    function indexAction()
    {
        print_r('Core Controller Index Action');
    }

    public function renderLayout()
    {
        $this->_helperModel->getViewModel()->render('header');
        $this->_helperModel->getViewModel()->render('footer');
    }

}
