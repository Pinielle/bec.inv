<?php

/**
 * Класс-маршрутизатор для определения запрашиваемой страницы. цепляет классы контроллеров и моделей.
 * Создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
 */

class Route
{

    static function start()
    {

        $controller_name = 'Main';
        $action_name = 'Index';

        /** TODO: $routes Removing first empty array element, maybe should refactored. Temporary solution. */
        $routes = array_diff(explode('/', $_SERVER['REQUEST_URI']), array('', NULL, false));

        // получаем имя контроллера
        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }

        // получаем имя экшена
        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

            // добавляем префиксы
            $model_name = 'Model_'.$controller_name;
            $controller_name = 'Controller_'.$controller_name;
            $action_name = $action_name.'Action';


            $model_file = strtolower($model_name).'.php';
            $model_path = "application/models/".$model_file;

            if(file_exists($model_path))
            {
                include "application/models/".$model_file;
            }
            // подцепляем файл с классом контроллера
            $controller_file = strtolower($controller_name) . '.php';
            $controller_path = "application/controllers/" . $controller_file;

            if (file_exists($controller_path)) {
                include "application/controllers/" . $controller_file;
        } else {
            $errorText = "File not exist";
            Route::ErrorPage404($errorText);
        }

        $controller = new $controller_name;
        $action = $action_name;


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
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        print_r($errorText);
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }

}
