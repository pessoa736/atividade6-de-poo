<?php

popen('cls || clear','w');

trait saudacao{
    public function saudar_usuario($obj){
        echo "\nOla, $obj->nome \n";
    }
}

class Cliente {
    use saudacao;
    public function __construct($nome){
        $this->nome = $nome;
    }
    public function saudar($pessoa){
        $this->saudar_usuario($pessoa);
    }
}
class funcionario {
    use saudacao;
    public function __construct($nome){
        $this->nome = $nome;
    }
    public function saudar($pessoa){
        $this->saudar_usuario($pessoa);
    }
}

$client = new Cliente("walter white");
$funcionario = new funcionario("michael jackson");

$client->saudar($funcionario);
$funcionario->saudar($client);
