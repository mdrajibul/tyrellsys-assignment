<?php

/**
 * Card controller
 * @author Md.Rajib-Ul-Islam<mdrajibul@gmail.com>
 */
class CardController extends BaseController
{
    private $service;

    public function __construct($controller, $action, $queryString = null)
    {
        parent::__construct($controller, $action, $queryString);

        $this->service = new CardService();
    }

    /**
     * GetMapping - /card/distribute/:players
     * Get request api to distribute player
     * @param int $players - No of players
     */
    public function distribute(int $players)
    {
        if ($this->requestMethod != 'GET') {
            $response['statusCode'] = 405;
            return $this->render($response);
        }
        if ($players < 1) {
            $response['statusCode'] = 422;
            $response['body'] = 'Input value does not exist or value is invalid';
        } else {
            $response['statusCode'] = 200;
            $response['body'] = json_encode($this->service->distribute($players));
        }
        return $this->render($response);
    }
}
