<?php
/**
 * Created by PhpStorm.
 * User: erandir
 * Date: 14/07/17
 * Time: 09:43
 */

namespace App\Helpers;

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
        self::$post = $data;
    }

    /**
     * Retorna todos os dados da requisição.
     *
     * @return mixed
     */
    public function all()
    {
        return self::$post;
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
        return self::$post[$input];
    }
}