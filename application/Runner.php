<?php

require_once 'models/model_login.php';
final class Runner
{
    /**
     * Retrieve instance of model class
     *
     * @param string $instanceClass
     * @return object
     */
    public static function getInstance($instanceClass)
    {
        if(!$instanceClass || !is_string($instanceClass))
        {
            Runner::coreException('Class name does not exist or is not a string');
            die();
        }

        if(stripos($instanceClass, '/')) {
           $requiredInstance = explode('/', $instanceClass);
           require_once Runner::getRequiredInstancePath($requiredInstance);
           $instanceClass = $requiredInstance[1];
        }

        return new $instanceClass;
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

    public static function getRequiredInstancePath($instance)
    {
        return strtolower($instance[0].'/'. strtolower($instance[1]). Route::INSTANCE_EXTENSION);
    }

    public static function getPostData($data)
    {
        return $_POST[$data];
    }


}