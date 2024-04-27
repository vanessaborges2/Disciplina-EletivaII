<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\CategoriaDAO;
use Php\Primeiroprojeto\Models\Domain\Categoria;

class CategoriaController{

    public function index($params){
        $categoriaDAO = new CategoriaDAO();
        $resultado = $categoriaDAO->consultarTodos();
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";
        if($acao == "inserir" && $status == "true")
            $mensagem = "Registro inserido com sucesso!";
        elseif($acao == "inserir" && $status == "false")
            $mensagem = "Erro ao inserir!";
        else 
            $mensagem = "";
        require_once("../src/Views/categoria/categoria.php");
    }
    
    public function inserir($params){
        require_once("../src/Views/categoria/inserir_categoria.html");
    }

    public function novo($params){
        $categoria = new Categoria(0, $_POST['descricao']);
        $categoriaDAO = new CategoriaDAO();
        if ($categoriaDAO->inserir($categoria)){
            header("location: /categoria/inserir/true");
        } else {
            header("location: /categoria/inserir/false");
        }
    }

}
