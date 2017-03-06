<?php

class View
{
    /** Defined by default in __construct */
    public $_helperModel;

    public function __construct()
    {
        /** Define helper Model */
        $this->_helperModel = new Helper();
    }

    /**
     * Basic render method
     *
     * @param null $view
     * @param string $defaultTemplate
     */
    public function renderTemplate($view = null, $defaultTemplate = 'default')
    {
        $themePrefix  = 'theme_';
        $mustRendered = null;
        $themePath    = $this->_helperModel->getSkinDirectoryPath() . $themePrefix . $this->getUsedTheme();

        if (!is_string($view) || !$view) {
            $mustRendered = $defaultTemplate;
        } else {
            $mustRendered = $view;
        }

        $mustRendered = $mustRendered . '.phtml';

        include $themePath.'/templates/' . $mustRendered;
    }


    public function getUsedTheme()
    {
       return $this->_helperModel->getConfigModel()->getThemeName();
    }

    public function getSearchForm()
    {
        $this->_helperModel->getViewModel()->renderTemplate('search');
    }

}
