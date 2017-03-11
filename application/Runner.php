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

    /**
     * Return copyright
     * @return string
     */
    public static function getCopyright()
    {
        return "Copyright (c) 2017. Babenko eCommerce. Internal Usage only";
    }

    /**
     * Directly include class file
     * @param $instance
     * @return string
     */
    public static function getRequiredInstancePath($instance)
    {
        return strtolower($instance[0].'/'. strtolower($instance[1]). Route::INSTANCE_EXTENSION);
    }

    /**
     * Return post Data Array
     *
     * @param $data
     * @return mixed
     */
    public static function getPostData($data)
    {
        return $_POST[$data];
    }

    /**
     * Redirect to requested location via header
     *
     * @param $direction
     */
    public static function redirect($direction)
    {
       $location = 'Location: ' . Runner::getBaseUrl() . $direction;
       header($location);
    }

    /**
     * Return string with full URL
     *
     * @param $direction
     * @return string
     */
    public static function getUrl($direction)
    {
        return Runner::getBaseUrl() . $direction;
    }

    /**
     * Check if $_POST Exists
     *
     * @return bool
     */
    public static function isPost()
    {
        return isset($_POST);
    }

    /**
     * Return associative array with POST
     *
     * @return mixed
     */
    public static function getPost()
    {
        return $_POST;
    }

    /**
     * Return base domain url
     *
     * @return string
     */
    public static function getBaseUrl()
    {
        return 'http://' . $_SERVER['HTTP_HOST'] . '/';
    }


    /**
     * Method for capturing and transfer front error messages. If type param not passed, method argument "type"
     * became as @elert.
     *
     * Requires 3 parameters:
     * @param string $errors - Text of exception, can be array() if you have several texts in one method
     * @param string $template - template to render, can be specified.
     * @param string $type type of notification. Should be only @alert, @success, @info, @warning.
     */
    public static function errorPage($errors = null, $template = '', $type = 'alert')
    {
        global $errorMessages;
        $errorMessages = $errors;
        $errorMessages['type'] = $type;
        Runner::getInstance('View')->renderTemplate('header');
        Runner::getInstance('View')->renderTemplate($template);
        Runner::getInstance('View')->renderTemplate('footer');
    }

}