<?php
namespace Models; // agrupamento de classes (caminho)

// Classe (ou Tipo) de Objeto
// obs.: Atividade implementa a interface Idados, significando que implementa todos os métodos definidos pela interface
class Cliente implements Idados{
    // Propriedades
    protected $nome;
    protected $cnpj;
    // obs.: propriedades protected são acessíveis por subclasses (extend)

    // Método construtor.
    public function __construct($nome,$cnpj){
        $this->nome=$nome;
        $this->cnpj=$cnpj;
    }

    // Método obrigatório pois é definido na interface
    public function toString(){
        return $this->nome.' '.$this->cnpj;
    }

    // Método obrigatório pois é definido na interface
    public function toJson() {
        return json_encode($this->toArray());
        // json_encode converte vetor em string json
    }

    // Método que retorna vetor associativo contendo os valores das propriedades
    public function toArray() {
        return ['nome'=>$this->nome,'detalhe'=>$this->cnpj];
    }

    // Inclui o conteúdo do Trait
    use trait__get;
}
?>