<?php

class View
{

    /**
     * Basic render method
     *
     * @param null $view
     * @param string $defaultTemplate
     */
    function render($view = null, $defaultTemplate = 'default')
    {
        $mustRendered = null;

        if (!is_string($view) || !$view) {
            $mustRendered = $defaultTemplate;
        } else {
            $mustRendered = $view;
        }
        $mustRendered = $mustRendered . '.phtml';
        include 'application/views/' . $mustRendered;
    }
}
