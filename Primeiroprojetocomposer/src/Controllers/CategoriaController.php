<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\CategoriaDAO;
use Php\Primeiroprojeto\Models\Domain\Categoria;

class CategoriaController{

    public function inserir($params){
        require_once("../src/Views/categoria/inserir_categoria.html");
    }

    public function novo($params){
        $categoria = new Categoria(0, $_POST['descricao']);
        $categoriaDAO = new CategoriaDAO();
        if ($categoriaDAO->inserir($categoria)){
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }

}
