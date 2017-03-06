<?php

class View
{
    /** Defined by default in __construct */
    public $_helperModel;

    /** theme prefix. Not sure that it needed  in future */
    const THEME_PREFIX  = 'theme_';

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
        $mustRendered = null;

        /** check if custom theme set in admin */
        if($this->getUsedTheme()) {
            $usedTheme = $this->getUsedTheme();
        } else {
            $usedTheme = 'default';
        }

        $themePath = $this->_helperModel->getSkinDirectoryPath() . self::THEME_PREFIX . $usedTheme;

        if (!is_string($view) || !$view) {
            $mustRendered = $defaultTemplate;
        } else {
            $mustRendered = $view;
        }

        $mustRendered = $mustRendered . '.phtml';

        include $themePath.'/templates/' . $mustRendered;
    }


    /**
     * Get currently used theme. Shuld configure in admin (nearest future)
     *
     * @return string
     */
    public function getUsedTheme()
    {
       return $this->_helperModel->getConfigModel()->getThemeName();
    }

    /**
     * Get currently used theme CSS folder
     *
     * @return string
     */
    public function getThemeCssPath()
    {
        /** check if custom theme set in admin */
        if($this->getUsedTheme()) {
            $usedTheme = $this->getUsedTheme();
        } else {
            $usedTheme = 'default';
        }

        return '/skins/'. self::THEME_PREFIX . $usedTheme. '/css/';
    }

    /**
     * Get currently used theme JS folder
     *
     * @return string
     */
    public function getThemeJsPath()
    {
        /** check if custom theme set in admin */
        if($this->getUsedTheme()) {
            $usedTheme = $this->getUsedTheme();
        } else {
            $usedTheme = 'default';
        }

        return '/skins/'. self::THEME_PREFIX . $usedTheme. '/js/';
    }
}
