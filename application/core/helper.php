<?php

/**
 * Created by PhpStorm.
 * User: andre
 * Date: 3/3/2017
 * Time: 2:33 PM
 */
class Helper
{
    public function getViewModel()
    {
        return new View();
    }

    public function getSkinDirectoryPath()
    {
        return $this->getRootDirPath(). 'skins/';
    }

    /**
     * Return root directory path
     *
     * @return string
     */
    public function getRootDirPath()
    {
        return $_SERVER['DOCUMENT_ROOT'];
    }

    public function getConfigModel()
    {
        return new Config();
    }

    public function getConnectorModel()
    {
        return new Connector();
    }

}
