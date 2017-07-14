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
     * Atributo que recebe as rotas.
     *
     * @var
     */
    private static $routes;

    /**
     * Adiciona as rotas ao atibuto $routes.
     *
     * @param array $route
     */
    private static function add(array $route)
    {
        self::$routes[] = $route;
    }

    /**
     * Recebe as requisições post.
     *
     * @param array $post
     */
    public static function post(array $post)
    {
        PostRequest::add($_POST);
        //var_dump(PostRequest::all());
        self::add($post);
    }

    /**
     * Recebe as requisições get.
     *
     * @param array $get
     */
    public static function get(array $get)
    {
        GetRequest::add($_GET);
        //echo "<pre>";
        //var_dump(GetRequest::all());
        self::add($get);
    }

    /**
     * Retorna todas as rotas.
     *
     * @return mixed
     */
    public static function run()
    {
        return self::$routes;
    }
}