<?php

/**
 * Core utility class
 * @author Md.Rajib-Ul-Islam<mdrajibul@gmail.com>
 *
 */
final class CoreUtil
{
    /**
     * Constant var of http status code mapping
     * @var array
     */
    private static $statusCodeMapping = array(
        '200' => '200 OK',
        '201' => '201 Created',
        '202' => '202 Accepted',
        '301' => '301 Moved Permanently',
        '304' => '304 Not Modified',
        '304' => '304 Not Modified',
        '400' => '400 Bad Request',
        '401' => '401 Unauthorized',
        '403' => '403 Forbidden',
        '404' => '404 Not Found',
        '405' => '405 Method Not Allowed',
        '408' => '408 Request Timeout',
        '422' => '422 Unprocessable Entity',
        '500' => '500 Internal Server Error',
        '502' => '502 Bad Gateway',
        '503' => '503 Service Unavailable',
    );

    /**
     * get the bae url base on server global var
     * @return string
     */
    public static function baseUrl()
    {
        if (isset($_SERVER['HTTPS'])) {
            $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        } else {
            $protocol = 'http';
        }
        return $protocol . "://" . $_SERVER['HTTP_HOST'];
    }

    /**
     * Get response header by status code
     * @param $statusCode
     * @return string
     */
    public static function responseHeaderByCode($statusCode)
    {
        return CoreUtil::$statusCodeMapping[$statusCode];
    }
}
