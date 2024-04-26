<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\CategoriaDAO;
use Php\Primeiroprojeto\Models\Domain\Categoria;

class CategoriaController{

    public function index($params){
        $categoriaDAO = new CategoriaDAO();
        $resultado = $categoriaDAO->consultarTodos();
        if (isset($_GET['inserir'])){
            $inserir = $_GET['inserir'];
            if ($inserir == "true"){
                $inserir_sucesso="";
                $inserir_erro="hidden";
            } else if ($inserir == "false"){
                $inserir_erro="";
                $inserir_sucesso="hidden";
            }
        }
        require_once("../src/Views/categoria/categoria.php");
    }
    
    public function inserir($params){
        require_once("../src/Views/categoria/inserir_categoria.html");
    }

    public function novo($params){
        $categoria = new Categoria(0, $_POST['descricao']);
        $categoriaDAO = new CategoriaDAO();
        if ($categoriaDAO->inserir($categoria)){
            header("location: /categoria?inserir=true");
        } else {
            header("location: /categoria?inserir=false");
        }
    }

}
