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

        $viewInstance = Runner::getInstance('View');
        $viewInstance->renderTemplate('header');
        if(Runner::getInstance('Session')->getLoggedIn()) {
            $viewInstance->renderTemplate('index');
        } else {
            Runner::redirect('login');
        }
        $viewInstance->renderTemplate('footer');

    }
}
