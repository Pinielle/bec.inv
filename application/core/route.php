<?php

/**
 * Класс-маршрутизатор для определения запрашиваемой страницы. цепляет классы контроллеров и моделей.
 * Создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
 */

class Route
{
    /** define default controller name */
    const DEFAULT_CONTROLLER_NAME = 'Index';

    /** define default action name */
    const DEFAULT_ACTION_NAME = 'Index';


    /**
     * Main route logic
     */
    static function start()
    {
        $controllerName = null;
        $actionName     = null;

        /** TODO: $routes Removing first empty array element, maybe should refactored. Temporary solution. */
        $routes = array_diff(explode('/', $_SERVER['REQUEST_URI']), array('', NULL, false));

        /** get controller name */
        if (!empty($routes[1])) {
            $controllerName = $routes[1];
        } else {
            $controllerName = self::DEFAULT_CONTROLLER_NAME;
        }

        /** get action name */
        if (!empty($routes[2])) {
            $actionName = $routes[2];
        } else {
            $actionName = self::DEFAULT_ACTION_NAME;
        }

        /** Add Prefixes */
        $modelName = 'Model_' . $controllerName;
        $controllerName = 'Controller_' . $controllerName;
        $actionName = $actionName . 'Action';


        $modelFile = strtolower($modelName) . '.php';
        $model_path = "application/models/" . $modelFile;

        if (file_exists($model_path)) {
            include "application/models/" . $modelFile;
        }
        /** @var  $controller_file Controller class file */
        $controllerFile = strtolower($controllerName) . '.php';
        $controllerPath = "application/controllers/" . $controllerFile;

        if (file_exists($controllerPath)) {
            include "application/controllers/" . $controllerFile;
        } else {
            $errorText = "File not exist";
            Route::ErrorPage404($errorText);
        }

        $controller = new $controllerName;
        $action = $actionName;


        if (method_exists($controller, $action)) {
            $controller->$action();

        } else {
            $errorText = "Requested controller method not exist";
            Route::ErrorPage404($errorText);
        }
    }

    /**
     * @param null $errorText
     */
    function ErrorPage404($errorText = null)
    {
        print_r($errorText);
    }

}
