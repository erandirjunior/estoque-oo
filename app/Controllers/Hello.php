<?php
namespace App\Controllers;

use App\Helpers\Requests;
use App\Models\Produto;
use Core\Controller\Controller;

class Hello extends Controller
{
    public function index()
    {
        echo "<pre>";
        var_dump(Produto::all());
        echo "</pre>";

        return $this->template('index');
    }

    public function cadastro()
    {
        return $this->template('cadastro');
    }

    public function cadastrar()
    {
        $nome       = Requests::postInput('nome');
        $valor      = Requests::postInput('valor');
        $descricao  = Requests::postInput('descricao');
        $pessoa     = Requests::postInput('pessoa');
        $categoria  = Requests::postInput('categoria');

        echo $nome;

        Produto::insert(['nome_prod' => $nome, 'valor_prod' => $valor, 'desc_prod' => $descricao, 'id_pessoa' => $pessoa, 'id_categoria' => $categoria]);

        header("Location: /");

        //var_dump(Requests::postAll());
    }
}