<?php
/**
 * Set basic routing pattern
 */
Routing:: $routing = array(
    '/(.*?)\/(.*?)\/(.*)/' => '\1/\2/\3',
    '/(.*?)\/(.*?)/' => '\1/\2',
    '/(.*?)/' => '/\1'
);

Routing::$defaultController = 'card';


