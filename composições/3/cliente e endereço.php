<?php

popen('cls || clear','w');

class Endereco{
    private $dados_enderecias;
    protected $keysValidas;
    public function __construct($endereco){
        //$rua, $bairo, $cidade, estado, $n_de_residencia, $cep){
        foreach ($endereco as $key => $value) {
            $this->$keysValidas = [
                "rua", "bairro", "cidade", "estado", "n residencial", "cep",
                "Rua", "Bairro", "Cidade", "Estado", "n Residencial", "CEP",
                "N residencial", "N Residencial"
            ];
            $this->dados_enderecias[$key] = $endereco[$key];
        }
    }
    private function check_key($key){
        $result = false
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

}

//test

$endereco = new Endereco(
    [
    "rua"=>                  "Av. Nevaldo Rocha",
    "Bairro"=>               "Tirol",
    "cidade"=>               "Natal",
    "Estado"=>               "Rio grande do norte",
    "n residencial"=>         "3775",
    "CEP"=>                  "59015-450",
    ]
);

echo $endereco->mostrarEndereco();