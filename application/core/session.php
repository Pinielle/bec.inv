<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 3/7/2017
 * Time: 11:28 PM
 */

class Session
{
    public function init()
    {
        $this->startSession();
        if (isset($_SESSION['time']) && $_SESSION['time'] < time()) {
            $this->unsetSession();
        }
    }

    protected function startSession()
    {

        session_set_cookie_params(SESSION_LIFETIME);
        $_SESSION = array();
        $_SESSION['id']    = $this->getCoockieSessionName();
        $_SESSION['user'] = 'guest';
        $_SESSION['acl'] = '0';
        $_SESSION['logged_in'] = false;
        $_SESSION['time'] = time() + SESSION_LIFETIME;
    }

    protected function unsetSession()
    {
        session_destroy();
        session_start();
        $_SESSION = array();
    }

    public function getCoockieSessionName()
    {
        return $_COOKIE['PHPSESSID'];
    }

    public function getLoggedIn()
    {
        return $_SESSION['logged_in'];
    }


}