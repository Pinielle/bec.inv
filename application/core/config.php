<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 3/3/2017
 * Time: 3:43 PM
 */

class Config
{
    const DEFAULT_SKIN_NAME = 'default';

    /**
     * Mock for now
     * Must used by customer settings in backend
     *
     * @param $themeName string
     * @return string
     */
    public function getThemeName($themeName = self::DEFAULT_SKIN_NAME)
    {
        return $themeName;
    }

    public function getConfig()
    {
        include "/var/www/bec.inv/config.php";

    }
}