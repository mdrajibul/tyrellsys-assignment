<?php

/**
 * Class Dispatcher - Use to route targeted controller base on routing table configs.
 * @author Md.Rajib-Ul-Islam<mdrajibul@gmail.com>
 */
final class Dispatcher
{
    public function __construct()
    {
        $this->setReporting();
        $this->dispatch();
    }

    /**
     * Use to set display error
     */
    public function setReporting()
    {
        if (DEVENV == true) {
            error_reporting(E_ALL);
            ini_set('display_errors', 'On');

        } else {
            error_reporting(0);
            ini_set('display_errors', 'Off');
        }
        ini_set('log_errors', 'On');
        ini_set('error_log', APP_PATH . DS . 'tmp' . DS . 'logs' . DS . 'error.log');
    }


    /**
     * Configure route url base on routing table
     * @param string $url - current url
     * @return string
     */

    public function routeURL(string $url)
    {
        if (!empty($url)) {
            $lastChar = $url[strlen($url) - 1];

            if ($lastChar != "/") {
                $url .= "/";
            }
        }

        foreach (Routing::$routing as $pattern => $result) {
            if (preg_match($pattern, $url)) {
                return preg_replace($pattern, $result, $url);
            }
        }
        return $url;
    }

    /**
     * Parse url and base on routing initialize controller and invoke targeted function/action and call user define function
     */
    private function dispatch()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = str_replace(APPNAME, '', $url);

        $queryString = array();

        $url = $this->routeURL($url);

        if (!isset($url) || $url == "" || $url == "/") {
            $controller = Routing::$defaultController;
            $action = Routing::$defaultAction;

        } else {
            $urlArray = explode("/", $url);
            array_shift($urlArray);
            $controller = $urlArray[0];
            if ($controller) {
                $controllerArr = explode("?", $controller);
                $controller = $controllerArr[0];
            }
            array_shift($urlArray);
            if (isset($urlArray[0]) && $urlArray[0] != "") {
                $action = $urlArray[0];
                if ($action) {
                    $actionArr = explode("?", $action);
                    $action = $actionArr[0];
                }
                array_shift($urlArray);
            } else {
                $action = 'index';
            }
            $queryString = $urlArray;
        }
        $controllerName = ucfirst($controller) . 'Controller';

        if (class_exists($controllerName)) {
            if ((int)method_exists($controllerName, $action)) {
                $impQueryString = is_array($queryString) ? implode("/", $queryString) : $queryString;
                $dispatch = new $controllerName($controller, $action, $impQueryString);
                @call_user_func_array(array($dispatch, "beforeFilter"), $queryString);
                @call_user_func_array(array($dispatch, $action), $queryString);
                @call_user_func_array(array($dispatch, "afterFilter"), $queryString);
            } else {
                die("No function# $action found in $controllerName class");
            }
        } else {
            $this->dispatchDefaultRoute($queryString);
        }
    }

    /**
     * Dispatch to default controller and action
     * @param array $queryString
     */
    private function dispatchDefaultRoute(array $queryString)
    {
        $controller = Routing::$defaultController;
        $action = Routing::$defaultAction;
        $controllerName = ucfirst($controller) . 'Controller';

        if (class_exists($controllerName) && (int)method_exists($controllerName, $action)) {
            $dispatch = new $controllerName($controller, $action);
            @call_user_func_array(array($dispatch, "beforeFilter"), $queryString);
            @call_user_func_array(array($dispatch, $action), $queryString);
            @call_user_func_array(array($dispatch, "afterFilter"), $queryString);
        } else {
            die("No function# $action found in $controller class");
        }
    }
}

