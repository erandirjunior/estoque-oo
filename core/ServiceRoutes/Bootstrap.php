<?php

namespace Core\ServiceRoutes;

use Core\Error\Error;

class Bootstrap
{
    private static $routes;

    private $urlError;

    public function __construct()
    {
        $this->index($this->getUrl());
    }

    /**
     * @param mixed $routes
     */
    public static function setRoutes($routes, $class, $method)
    {
        self::$routes[] = ['r' => $routes, 'c' => $class, 'm' => $method];
    }

    public function index(string $url)
    {
        try {
            array_walk(self::$routes, function ($route) use ($url) {
                if (is_array($route['r'])) {

                } else {
                    if (strpos($route['r'], "@")) {
                        $rotaTratada   = str_replace("@", '', $route['r']);

                        // obtendo quantos caracteres tem na rota
                        $tamanhoDaRota = strlen($rotaTratada);

                        // obtendo quantos caracteres tem na url
                        $tamanhoDaUrl  = strlen($url);

                        if ($tamanhoDaUrl > $tamanhoDaRota) {
                            // cortando a url pelo tamanho da rota
                            $url = substr($url, 0, $tamanhoDaRota);

                            if (strcmp($url, $rotaTratada) === 0) {
                                // substituindo o valor da rota pelo valor da url
                                $k['r'] = str_replace($route['r'], $url, $route['r']);

                                $this->run($url, $route);

                                exit();
                            }
                        }
                    } else {
                        $this->run($url, $route);
                    }
                    $this->countError(self::$routes);
                }
            });
        } catch (\Exception $e) {
            $error = new Error();
            $error->errorMessage($e);
        }
    }

    /**
     * Faz a verificação se a rota é igual com a url atual, caso seja, cria um objeto e executa determinado método do mesmo,
     * que esteja em determinado índice da rota
     *
     * @param  string $url url da página
     * @param  array  $route rotas
     */
    private function run(string $url, array $route)
    {
        if ($url == $route['r']) {
            $class = "App\\Controllers\\" . ucfirst($route['c']);

            if (!class_exists($class)) {
                throw new \Exception("Error: Classe $class não existe. Verifique seu arquivo web.php ou na pasta App/Controllers.");
            }

            $instance = new $class;
            $action   = $route['m'];

            if (method_exists($instance, $action)) {
                $instance->$action();
            } else {
                throw new \Exception("Error: Método $action não existe. Verifique no arquivo web.php ou na sua classe.");
            }
        } else {
            $this->urlError++;
        }
    }

    /**
     * Verifica se o valor do atributo urlError é igual ao número de caminhos que existe no array de rotas
     * caso seja igual, cria uma instância da classe Error, e manda a mensagem de error de caminho não existente
     *
     * @param  int $value caminhos que existe na rota
     */
    private function countError($value)
    {
        if (count($value) == $this->urlError) {
            throw new \Exception("Error: Rota não existe. Verifique no arquivo web.php.");
        }
    }

    /**
     * Retorna o path da uri da página atual, exemplo: /, /exemplo, /exemplo/algumaCoisa
     * @return string path da url
     */
    private function getUrl(): string
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

}