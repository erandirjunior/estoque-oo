<?php
/**
 * Created by PhpStorm.
 * User: erandir
 * Date: 13/07/17
 * Time: 19:18
 */

namespace Core\Model;


/**
 * Class Conn
 * @package Core\Model
 */
class Conn
{
    /**
     * Recebe a conexão com banco de dados.
     * @var
     */
    private static $instance;

    /**
     * Tornando o construtor privado para que a classe não possa ser instânciada.
     *
     * Conn constructor.
     */
    private function __construct()
    {
        
    }

    /**
     * Retorna as informações do arquivo de configuração.
     *
     * @return mixed
     */
    private static function getConf()
    {
        if (file_exists("../config.json")) {
            return json_decode(file_get_contents('../config.json'), true);
        }
    }

    /**
     * Faz e retorna a conexão com o banco de dados.
     *
     * @return mixed
     */
    public static function getConnection()
    {
        if (self::$instance === null) {
            $con = self::getConf();

            self::$instance = new \PDO("mysql:host={$con['HOST']};dbname={$con['DBNAME']}", $con['USER'], $con['PASSWORD']);
            self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        return self::$instance;
    }
}