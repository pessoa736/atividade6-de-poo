<?php

class produtos{
    public function __construct($nome, $valor){
        $this->$nome = $nome;
        $this->$valor = $valor;
    }
    
}

class Pedido{
    public function __construct(){

    }
} 
