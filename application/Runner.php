<?php

final class Runner
{
    /**
     * Retrieve instance of model class
     *
     * @param string $modelClass
     * @return object
     */
    public static function getInstance($modelClass)
    {
        if(!$modelClass or !is_string($modelClass))
        {
            Runner::coreException('Class name does not exist or is not a string');
            die();
        }
        return new $modelClass;
    }

    /**
     * Render Core exception with passed text.
     *
     * @param string $exceptionText
     * @throws Exception
     */
    public static function coreException($exceptionText = '')
    {
        throw new Exception($exceptionText);
    }

    public static function getCopyright()
    {
        return "Copyright (c) 2017. Babenko eCommerce. Internal Usage only";
    }
}