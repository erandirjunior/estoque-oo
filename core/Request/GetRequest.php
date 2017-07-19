<?php
namespace Core\Request;

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
        self::$get = $data['REQUEST_URI'];
    }

    /**
     * Retorna todos os dados da requisição.
     *
     * @return mixed
     */
    public static function all()
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
        $data = explode("/", self::$get);
        var_dump($data);
        return $data[$input];
    }
}