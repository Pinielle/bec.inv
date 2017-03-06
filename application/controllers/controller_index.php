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
        $this->_helperModel->getViewModel()->renderTemplate('header');
        $this->_helperModel->getViewModel()->renderTemplate('index');
        $this->_helperModel->getViewModel()->renderTemplate('footer');

    }
}
