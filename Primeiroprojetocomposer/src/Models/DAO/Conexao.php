<?php

namespace Php\Primeiroprojeto\Models\DAO;

use PDO;

class Conexao{

    private $conexao;

    public function __construct(){
        $this->conexao = 
            new PDO("mysql:host=localhost; dbname=mydb", "root", "");
    }

    public function getConexao(){
        return $this->conexao;
    }

}