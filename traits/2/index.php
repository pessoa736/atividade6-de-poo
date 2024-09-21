<?php

popen('cls || clear','w');


trait calculosGeometricos{
    protected function areaRetangulo(){
        return $this->w*$this->h;
    }
    protected function areaDoQuadrado (){
        return $this->w^2;
    }
}

class quadrado{
    public $w;
    use calculosGeometricos;
    public function __construct($w){
        $this->w = $w;
        print("um quadrado com os lados de tamanho $w foi adicionado\n");
    }

    public function calcularArea(){
        return $this->areaDoQuadrado();
    }
};

class retangulo{
    public $w;
    public $h;
    use calculosGeometricos;
    public function __construct($w, $h){
        $this->w = $w;
        $this->h = $h;

        print("um retangulo de largura $w e altura $h foi adicionado\n");
    }

    public function calcularArea(){
        return $this->areaRetangulo();
    }
}

$Q = new quadrado(5);
$R = new retangulo(5, 6);

echo "\n";
echo "a area do quadrado e " . $Q->calcularArea() . "\n";
echo "a area do retangulo e " . $R->calcularArea() . "\n";



