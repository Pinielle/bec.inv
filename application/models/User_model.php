<?php

/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 09.02.17
 * Time: 17:01
 */
class User
{

    protected $permission = array(

        'user_controller' => array('view_action')
    );

    function login()
    {

    }

    function checkPermission($permission)
    {
        if (isset($permission['SU'])) {
            return true;
        }
        return false;
    }

    function logOut()
    {

    }
}