<?php

/**
 * Base controller which is extendable to other controller. All common functionality written here
 * @author Md.Rajib-Ul-Islam<mdrajibul@gmail.com>
 */
abstract class BaseController
{
    /**
     * @var  - Current controller object
     */
    protected $controller;
    /**
     * @var - current action name
     */
    protected $action;
    /**
     * @var  - current request method
     */
    protected $requestMethod;
    /**
     * @var string - Current full url
     */
    protected $url;
    /**
     * @var array  - all request params and additional params
     */
    protected $params = array();


    public function __construct($controller, $action, $queryString = '')
    {
        $queryString = $queryString ? "/" . $queryString : $queryString;
        $this->controller = $controller;
        $this->action = $action;
        $this->url = BASEURL . $this->controller . '/' . $this->action . $queryString;

        $this->params['controller'] = $this->controller;
        $this->params['action'] = $this->action;
        $this->params['queryString'] = $queryString;
        $this->params['url'] = $this->url;
        $this->requestMethod = $_SERVER["REQUEST_METHOD"];

        $this->prepareParams();

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


    }

    /**
     * render output
     * @param array $response
     */
    public function render(array $response)
    {
        header('HTTP/1.1 ' . CoreUtil::responseHeaderByCode($response['statusCode']));
        if ($response['body']) {
            echo $response['body'];
        }
    }

    /**
     * redirect to different url
     * @param $option
     */
    public function redirect($option)
    {
        if (is_array($option)) {
            $urlString = "";
            if (isset($option['BaseController'])) {
                $urlString .= $option['BaseController'];
            }
            if (isset($option['action'])) {
                $urlString .= "/" . $option['action'];
            }
            if (isset($option['params'])) {
                $urlString .= "/" . $option['params'];
            }
            $url = BASEURL . $urlString;
        } else if (is_string($option) && strpos($option, '/') === false) {
            $option = BASEURL . $this->controller . '/' . $option;
        } else {
            $url = $option;
        }
        header('Location:' . $url);
        exit();
    }

    /**
     * A callback function. it is called before action function execute.
     * Useful to check authorization header or authentication before routing url
     */
    public function beforeFilter()
    {
    }

    /**
     * A callback function. it is called after action function execute.
     * Useful to do additional operation like templating or reset value after action function execute
     */
    public function afterFilter()
    {

    }


    private function prepareParams()
    {
        if (isset($_POST) && is_array($_POST)) {
            foreach ($_POST as $key => $value) {
                $this->params[$key] = $value;
            }
        }
        if (isset($_GET) && is_array($_GET)) {
            foreach ($_GET as $key => $value) {
                $this->params[$key] = $value;
            }
        }
        if (isset($_FILES) && is_array($_FILES)) {
            foreach ($_FILES as $key => $value) {
                $this->params[$key] = $value;
            }
        }
    }
}
