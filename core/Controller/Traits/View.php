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
        if (file_exists("../app/Views/" . $view . ".php")) {
            require_once "../app/Views/" . $view . ".php";
        } else {
            $error = new \Core\Error\Error();
            $error->errorMessage("error");
        }

    }
}