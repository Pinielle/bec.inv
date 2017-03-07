<?php

/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 09.02.17
 * Time: 12:44
 */
class Controller
{

    function indexAction()
    {
    }

    protected function getPostAction()
    {
        return $_POST;
    }

    public function getPostData($data)
    {
        return Runner::getPostData($data);
    }

}
