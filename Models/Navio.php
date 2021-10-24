<?php
namespace Models; // agrupamento de classes (caminho)

// Classe (ou Tipo) de Objeto
// obs.: Atividade implementa a interface Idados, significando que implementa todos os métodos definidos pela interface
class Navio implements Idados{
    // Propriedades
    protected $ID;
    protected $NOME;
    protected $NUM_VIAGEM;
    // obs.: propriedades protected são acessíveis por subclasses (extend)

    // Método construtor.
    public function __construct($id, $nome,$numeroViagem){
        $this->ID = $id;
        $this->NOME=$nome;
        $this->NUM_VIAGEM=$numeroViagem;
    }

    // Método obrigatório pois é definido na interface
    public function toString(){
        return $this->ID.' '.$this->NOME.' '.$this->NUM_VIAGEM;
    }

    // Método obrigatório pois é definido na interface
    public function toJson() {
        return json_encode($this->toArray());
        // json_encode converte vetor em string json
    }

    // Método que retorna vetor associativo contendo os valores das propriedades
    public function toArray() {
        return ['id'=>$this->ID,'nome'=>$this->NOME,'detalhe'=>$this->NUM_VIAGEM];
    }

    // Inclui o conteúdo do Trait
    use trait__get;
}
?>