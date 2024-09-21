<?php

popen('cls || clear','w');

$tabela_de_log = [];
function show_log(){
    global $tabela_de_log;
    foreach ($tabela_de_log as $key => $value) {
        echo "\n $value \n";
    }
}



trait registro{
    protected function registrar_acao($msm){
        global $tabela_de_log;
        $tabela_de_log[] = "Acao registrada: [$msm]";
    }
}

class pedido{
    use registro;
    public function __construct($title = 'none', $price = 0.00){
        $this->title = $title;
        $this->price = $price;

        $this->registrar_acao("o pedido de $title de preco $price foi criado");
    }
}

class entrega{
    use registro;
    public function __construct(string $local_da_entrega, pedido $pedido){
        $this->local_da_entrega = $local_da_entrega;
        $this->pedido = $pedido;

        $this->registrar_acao("uma entrega de ". $this->pedido->title ." para $local_da_entrega foi criada");
    }
    public function fazer_entrega(){

        $this->registrar_acao("a entrega de ". $this->pedido->title ." para $this->local_da_entrega  esta completa");
    }
}

$pedido1 = new pedido("1000 air fryes") ;
$entrega1 = new entrega("new york city", $pedido1) ;
$entrega1->fazer_entrega();

show_log();