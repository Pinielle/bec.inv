<?php

/** Define required files */
require_once 'core/config.php';
require_once 'core/controller.php';
require_once 'core/view.php';
require_once 'core/helper.php';
require_once 'core/model.php';
require_once 'core/user.php';
require_once 'core/inventory.php';
require_once 'core/route.php';
require_once 'core/session.php';
require_once 'core/connector.php';
require_once 'Runner.php';
require_once 'config.php';

/** initialize Session */
Runner::getInstance('Session')->init();

/** find .css .js in uri */
$isCss = strripos($_SERVER['REQUEST_URI'], '.css');
$isJs  = strripos($_SERVER['REQUEST_URI'], '.js');


if(DEBUG_MODE) {
    ini_set('display_errors',1);
    error_reporting(E_ALL);
}

/** If file extension exist, directly include it without run()  */
/** TODO: Need to refactor in future.Temporary solution */
if ($isCss || $isJs) {
    include $_SERVER['REQUEST_URI'];
} else {
    Route::run();
}
