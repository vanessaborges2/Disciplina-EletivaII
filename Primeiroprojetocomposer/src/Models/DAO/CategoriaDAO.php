<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Categoria;

class CategoriaDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Categoria $categoria){
        try{
            $sql = "INSERT INTO categoria (descricao) VALUES (:descricao)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":descricao", $categoria->getDescricao());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

}