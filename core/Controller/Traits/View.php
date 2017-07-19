<?php
namespace Core\Controller\Traits;

/**
 * Trait View
 * @package Core\Controller\Traits
 */
trait View
{
    /**
     * Faz o carragamento de arquivos de visualização.
     *
     * @param      $view
     * @param null $data
     */
    public function template($view, $data = null)
    {
        try {
            if (!is_null($data)) {
                extract($data);
            }

            if (file_exists("../app/Views/" . $view . ".php")) {
                require_once "../app/Views/" . $view . ".php";
            } else {
                throw new \Exception("view {$view} não encontrada");
            }
        } catch (\Exception $e) {
            $error = new \Core\Error\Error();
            $error->errorMessage($e);
        }

    }
}