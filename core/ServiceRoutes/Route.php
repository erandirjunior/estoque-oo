<?php
namespace Core\ServiceRoutes;

use Core\Request\GetRequest;
use Core\Request\PostRequest;


/**
 * Class Route
 * @package Core\ServiceRoutes
 */
class Route
{
    /**
     * Recebe as requisições post.
     *
     * @param array $post
     */
    public static function post($routes, $class, $method)
    {
        PostRequest::add($_POST);
        Bootstrap::setRoutes($routes, $class, $method);
    }

    /**
     * Recebe as requisições get.
     *
     * @param array $get
     */
    public static function get($route, $class, $method)
    {
        GetRequest::add($_SERVER);
        Bootstrap::setRoutes($route, $class, $method);
    }
}