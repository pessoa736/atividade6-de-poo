<?php

popen('cls || clear','w');

class Endereco{
    private $dados_enderecias;
    protected $keysValidas;
    public function __construct($endereco){
        //$rua, $bairo, $cidade, estado, $n_de_residencia, $cep){
        $this->keysValidas = [
                "rua", "bairro", "cidade", "estado", "n residencial", "cep",
                "Rua", "Bairro", "Cidade", "Estado", "n Residencial", "CEP",
                "N residencial", "N Residencial"
        ];
        foreach ($endereco as $key => $value) {
            $this->dados_enderecias[$key] = $endereco[$key];
        }
    }
    private function check_key($key){
        foreach ($this->keysValidas as $_key=>$value){
            if ($value == $key) {
                return true;
            }
        }
        return false;
    }

    public function MostrarEndereco() {
        $str = "ENDEREÇO: ";
        foreach ($this->dados_enderecias as $key => $value) {
            if ($this->check_key($key)) {
                $str .= "\n\t".$key .": ". $value;
            }
        }
        return $str."\n";
    }
}

class Cliente{
    public $nome;
    private $endereco;
    
    public function __construct(string $nome,Endereco $endereco){
        $this->nome = $nome;
        $this->endereco = $endereco;
    }

    public function MostraInformacoes(){
        $str = "Cliente: \n";
        $str .= "\tnome: $this->nome\n";
        $str .= $this->endereco->MostrarEndereco()."\n";

        return $str;
    }
}

//test

$cliente = new Cliente(
    "michael json", 
    new Endereco(
     [
            "Rua"=>                  "Av. Nevaldo Rocha",
            "Bairro"=>               "Tirol",
            "Cidade"=>               "Natal",
            "Estado"=>               "Rio grande do norte",
            "N residencial"=>         "3775",
            "CEP"=>                  "59015-450",
            "informação que não vai aparecer" => "aaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
        ]
    )
);

echo $cliente->MostraInformacoes();