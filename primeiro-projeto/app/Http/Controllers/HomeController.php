<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function mostrarMensagem($mensagem){
        $nome = 'Vanessa';
        return view("mensagem", compact('mensagem', 'nome'));
    }
    
}
