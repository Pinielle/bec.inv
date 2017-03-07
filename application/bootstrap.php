<?php
/** Define required files */
require_once 'core/config.php';
require_once 'core/controller.php';
require_once 'core/view.php';
require_once 'core/helper.php';
require_once 'core/model.php';
require_once 'core/route.php';
require_once 'core/session.php';
require_once 'core/connector.php';
require_once 'Runner.php';

/** find .css .js in uri */
$isCss = strripos($_SERVER['REQUEST_URI'], '.css');
$isJs  = strripos($_SERVER['REQUEST_URI'], '.js');


/** If file extension exist, directly include it without run()  */
/** TODO: Need to refactor in future.Temporary solution */
if ($isCss || $isJs) {
    include $_SERVER['REQUEST_URI'];
} else {
    Route::run();
}
