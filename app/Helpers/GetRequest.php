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
 * Class GetRequest
 * @package App\Helpers
 */
class GetRequest implements Request
{
    /**
     * Atributo para receber os dados.
     *
     * @var
     */
    private static $get;

    /**
     * Adiciona os dados da requisição ao atributo $get.
     *
     * @param array $data
     */
    public static function add(array $data)
    {
        self::$get = $data;
    }

    /**
     * Retorna todos os dados da requisição.
     *
     * @return mixed
     */
    public function all()
    {
        return self::$get;
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
        return self::$get[$input];
    }
}