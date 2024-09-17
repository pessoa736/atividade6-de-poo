<?php
use Vtiful\Kernel\Format;

popen('cls || clear','w');

$debug = false;

trait system{
    public function log(string $mensage){
        global $debug;
        if ($debug){
            echo "\n".$mensage;
        }
    }
}
function format($number){
    return "R$ ".number_format($number,2,",",".");
}


class produtos{
    use system;
    public function __construct(string $nome, float $preco = 0.00){
        $this->nome = $nome;
        $this->preco = $preco;

        $this->log("o produto $nome de preço ".format($preco)." foi criado \n");
    }
    public function get_preco(){
        return $this->preco;
    }
    
}

class Pedido{
    protected $produtos_no_carrinho;
    use system;
    public function __construct(){
        $this->produtos_no_carrinho = [];

        $this->log("pedido criado");
    }

    public function add_produtos_no_carrinho(produtos $produto){

        $this->produtos_no_carrinho[] = $produto;
        $this->log("foi adicionado ao carrinho o " . $produto->nome ."\n");
    }

    public function calcular_total(){
        $sum = 0;
        foreach($this->produtos_no_carrinho as $produto){
            $sum += $produto->preco;
        }
        return format($sum);
    }
    public function show_produtos_no_carrinho(){
        $str = "produtos";
        $i=1;
        foreach ($this->produtos_no_carrinho as $produtos){
            $str .= "\n\tproduto$i: ". $produtos->nome ."\n\tvalor: ". format($produtos->preco)."\n";
            $i++;
        }
        return $str;
    }
} 


$pedido = new Pedido();

$pedido->add_produtos_no_carrinho(
    new Produtos(
        "2200 robux",
        275.00
    )
);

$pedido->add_produtos_no_carrinho(
    new Produtos(
        "RTX 4090 TI super",
        12500.00
    )
);

$pedido->add_produtos_no_carrinho(
    new Produtos(
        "Ryzen 9 7900X",
        22500.00
    )
);
echo $pedido->show_produtos_no_carrinho()."\n";
echo "valor no total: ".$pedido->calcular_total() . "\n\n\n";