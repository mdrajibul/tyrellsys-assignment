<?php
/**
 * Framework specific constant
 */
require_once('CoreUtil.php');

define('DS', DIRECTORY_SEPARATOR);
define('DEVENV', true);
if (!defined('APPNAME')) {
    define('APPNAME', '');
}

define('APP_PATH', ROOT . DS . 'app' . DS);
define('CORE_PATH', ROOT . DS . 'core' . DS);
define('APP_CONTROLLER', APP_PATH . 'controllers');
define('APP_INTERFACES', APP_PATH . 'interfaces');
define('APP_SERVICES', APP_PATH . 'services');

define('BASEURL', CoreUtil::baseUrl() . '/' . APPNAME);


