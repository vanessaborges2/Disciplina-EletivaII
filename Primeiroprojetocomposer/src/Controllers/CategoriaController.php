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
        elseif($acao == "alterar" && $status == "true")
            $mensagem = "Registro alterado com sucesso!";
        elseif($acao == "alterar" && $status == "false")
            $mensagem = "Erro ao alterar!";
        elseif($acao == "excluir" && $status == "true")
            $mensagem = "Registro excluído com sucesso!";
        elseif($acao == "excluir" && $status == "false")
            $mensagem = "Erro ao excluir!";
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

    public function alterar($params){
        $categoriaDAO = new CategoriaDAO();
        $resultado = $categoriaDAO->consultar($params[1]);
        require_once("../src/Views/categoria/alterar_categoria.php");
    }

    public function excluir($params){
        $categoriaDAO = new CategoriaDAO();
        $resultado = $categoriaDAO->consultar($params[1]);
        require_once("../src/Views/categoria/excluir_categoria.php");
    }

    public function editar($params){
        $categoria = new Categoria($_POST['id'], $_POST['descricao']);
        $categoriaDAO = new CategoriaDAO();
        if ($categoriaDAO->alterar($categoria)) {
            header("location: /categoria/alterar/true");
        } else {
            header("location: /categoria/alterar/false");
        }
    }

    public function deletar($params){
        $categoriaDAO = new CategoriaDAO();
        if ($categoriaDAO->excluir($_POST['id'])){
            header("location: /categoria/excluir/true");
        } else {
            header("location: /categoria/excluir/false");
        }
    }

}
