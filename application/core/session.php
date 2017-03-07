<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 3/7/2017
 * Time: 11:28 PM
 */

class Session
{
    public static function startNewUserSession($customerId)
    {
        Session::unsetSession();
        Session::startSession();

        $_SESSION['CREATED'] = $_SERVER['REQUEST_TIME'];
        $_SESSION['CUSTOMER_ID'] = $customerId;
        $_SESSION['customer_logged_in'] = true;
    }

    protected function unsetSession()
    {
        if(isset($_SESSION)) {
            unset($_SESSION['customer_id'], $_SESSION['customer_logged_in']);
            session_destroy();
            header('Location: index.php');
        }
    }

    protected function startSession()
    {
        session_set_cookie_params(Session::getSessionLifeTime(),"/");
        session_start();
        $_SESSION = array();
    }

    protected function getSessionLifeTime()
    {
        return ini_get("session.gc_maxlifetime");
    }

    protected function regenerateSession()
    {
        if (!isset($_SESSION['CREATED'])) {
            $_SESSION['CREATED'] = time();
        } else if (time() - $_SESSION['CREATED'] > 1800) {
            session_regenerate_id(true);
            $_SESSION['CREATED'] = time();
        }
    }
}