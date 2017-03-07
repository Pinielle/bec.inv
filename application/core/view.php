<?php

class View
{
    /** theme prefix. Not sure that it needed  in future */
    const THEME_PREFIX  = 'theme_';

    /**
     * Render Template file via path
     * @param string $template
     */
    public function renderTemplate($template = '')
    {
      include $this->getTemplate($template);
    }

    public function getTemplate($template = '')
    {
        if (!$template) {
            Runner::coreException('Template name must be specified');
            die();
        }

        $themePath = Runner::getInstance('Helper')->getSkinDirectoryPath() . self::THEME_PREFIX . 'default';

        if(!file_exists($themePath.'/templates/' . $template.'.phtml')) {
            Runner::coreException('Template file not exits');
            die();
        }

        return $themePath.'/templates/' . $template.'.phtml';
    }


    /**
     * Get currently used theme. Should configure in admin (nearest future)
     *
     * @return string
     */
    public function getUsedTheme()
    {
       return Runner::getInstance('Config')->getThemeName();
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

    public function getCopyright()
    {
        return Runner::getCopyright();
    }

    public function getFormAction()
    {
        return $_SERVER['REDIRECT_URL'];

    }
}
