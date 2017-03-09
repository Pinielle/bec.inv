<?php

/**
 * Main router class
 * Class create requested controller instance and call them action
 */

class Route
{
    /** define default controller name */
    const DEFAULT_CONTROLLER_NAME = 'Index';

    /** define default action name */
    const DEFAULT_ACTION_NAME = 'Index';

    /** default controller path */
    const CONTROLLERS_PATH = 'application/controllers/';

    /** Controllers file extension */
    const INSTANCE_EXTENSION = '.php';

    /** Templates file extension */
    const TEMPLATE_EXTENSION = '.phtml';

    /**
     * Main route method
     *
     * @throws Runner coreException
     */
   public static function run()
    {
        $routes = array();

        if(Route::isRedirect()) {
            $routes = Route::parseRequest();
        }

        /** @var  $controller_file Controller class file */
        $controllerFile = strtolower(Route::setRequestController($routes)) . '.php';
        $controllerPath = self::CONTROLLERS_PATH . $controllerFile;

        Route::includeControllerInstance($controllerPath, $routes);

        /** Finally Call controller Action */
        Route::callControllerMethod(
            Runner::getInstance(Route::setRequestController($routes)),
            Route::setControllerAction($routes)
        );
    }

    /**
     * Check if redirect exist
     *
     * @return bool
     */
    public static function isRedirect()
    {
       return isset($_SERVER['REDIRECT_URL']);
    }

    /**
     * Check and return routed Controller name
     *
     * @param $routes
     * @return string
     */
    public static function setRequestController($routes)
    {
        /** get controller name */
        if (!empty($routes[1])) {
            $controllerName = $routes[1];
        } else {
            $controllerName = self::DEFAULT_CONTROLLER_NAME;
        }

        return 'Controller_' . $controllerName;
    }

    /**
     * Check and return routed Controller Action
     *
     * @param $routes
     * @return string
     */
    public static function setControllerAction($routes)
    {
        /** get action name */
        if (!empty($routes[2])) {
            $controllerAction = $routes[2];
        } else {
            $controllerAction = self::DEFAULT_ACTION_NAME;
        }

        return $controllerAction . 'Action';
    }

    /**
     * Parse Requested Route string
     *
     * @return array
     */
    public static function parseRequest()
    {
        return array_diff(explode('/', $_SERVER['REDIRECT_URL']), array('', NULL, false));
    }

    /**
     * Call requested controller instance Action
     *
     * @param $controller
     * @param $action
     * @throws Runner coreException
     */
    public static function callControllerMethod($controller, $action)
    {
        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            Runner::coreException("Requested controller method not exist");
        }
    }

    /**
     * Check if controller class exist in filesystem
     *
     * @param $controllerPath
     * @return bool
     */
    public static function isControllerExist($controllerPath)
    {
       return file_exists($controllerPath);
    }

    /**
     * Include controller instance from file
     *
     * @param $controllerPath
     * @param $routes
     * @throws Runner coreException
     */
    public static function includeControllerInstance($controllerPath, $routes)
    {
        if (Route::isControllerExist($controllerPath)) {
            include self::CONTROLLERS_PATH . strtolower(Route::setRequestController($routes)) . self::INSTANCE_EXTENSION;
        } else {
            Runner::coreException("Routed file not exist");
        }
    }
}
