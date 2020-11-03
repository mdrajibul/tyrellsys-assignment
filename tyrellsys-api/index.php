<?php
/**
 * This is entry file. All config, routing and dispatcher class loaded here
 * @author Md.Rajib-Ul-Islam<mdrajibul@gmail.com>
 */
define('ROOT', __DIR__);

require_once('app/config/Define.php');
require_once('core/Define.php');
require_once('core/AutoLoad.php');
require_once('core/Routing.php');
require_once('app/config/Routing.php');
require_once('core/Dispatcher.php');
require_once('core/Bootstrap.php');
