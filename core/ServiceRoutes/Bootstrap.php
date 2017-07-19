<?php

namespace Core\ServiceRoutes;

use Core\Error\Error;

class Bootstrap
{
    private $routes;

    private $urlError;

    public function __construct()
    {
        $this->routes[] = Route::run();
        $this->index($this->getUrl());
    }

    public function index(string $url)
    {
        try {
            array_walk($this->routes[0], function ($route) use ($url) {

                if (strpos($route[0], "@")) {
                    //$rotaLimpa = substr($route[0], 0, strpos($route[0], "@"));
                    $rotaTratada = str_replace("@", '', $route[0]);

                    // obtendo quantos caracteres tem na rota
                    $tamanhoDaRota = strlen($rotaTratada);

                    // obtendo quantos caracteres tem na url
                    $tamanhoDaUrl = strlen($url);

                    // verifica se a quantidade de caracteres da url é maior que a quantidade de caracteres da rota
                    if ($tamanhoDaUrl > $tamanhoDaRota) {

                        // cortando a url pelo tamanho da rota
                        $url = substr($url, 0, $tamanhoDaRota);

                        // compara se o vlaor da $url é igual ao valor da $rotaTratada
                        if (strcmp($url, $rotaTratada) === 0) {
                            // substituindo o valor da rota pelo valor da url
                            $route[0] = str_replace($route[0], $url, $route[0]);

                            $this->run($url, $route);
                            exit();
                        }
                    }

                    $this->urlError++;
                } else {
                    $this->run($url, $route);
                }

                $this->countError($this->routes[0]);
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
        if ($url == $route[0]) {
            $class = "App\\Controllers\\" . ucfirst($route[1]);

            if (!class_exists($class)) {
                throw new \Exception("Error: Classe $class não existe. Verifique seu arquivo web.php ou na pasta App/Controllers.");
            }

            $instance = new $class;
            $action = $route[2];

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