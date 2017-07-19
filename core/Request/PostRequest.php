<?php
namespace Core\Request;

use Core\Request\Request;

/**
 * Class PostRequest
 * @package App\Helpers
 */
class PostRequest implements Request
{
    /**
     * Atributo para receber os dados.
     *
     * @var
     */
    private static $post;

    /**
     * Adiciona os dados da requisição ao atributo $post.
     *
     * @param array $data
     */
    public static function add(array $data)
    {
        self::$post[] = $data;
    }

    /**
     * Retorna todos os dados da requisição.
     *
     * @return mixed
     */
    public static function all()
    {
        $post = self::$post[0];
        return $post;
    }

    /**
     * Retorna um dado especifico da requisição.
     *
     * @param $input
     *
     * @return mixed
     */
    public static function input($input)
    {
        $post = self::$post[0];
        return $post[$input];
    }
}