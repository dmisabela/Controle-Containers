<?php
namespace Models; // agrupamento de classes (caminho)

// Classe (ou Tipo) de Objeto
// obs.: Atividade implementa a interface Idados, significando que implementa todos os métodos definidos pela interface
class Produto implements Idados{
    // Propriedades
    protected $ID;
    protected $NOME;
    protected $QUANTIDADE;
    protected $ID_CTNR;
    // obs.: propriedades protected são acessíveis por subclasses (extend)

    // Método construtor.
    public function __construct($id,$nome,$quantidade,$id_ctnr){
        $this->ID = $id;
        $this->NOME = $nome;
        $this->QUANTIDADE = $quantidade;
        $this->ID_CTNR = $id_ctnr;
    }

    // Método obrigatório pois é definido na interface
    public function toString(){
        return $this->ID. ' '. $this->NOME.' '.$this->QUANTIDADE.' '.$this->ID_CTNR;
    }

    // Método obrigatório pois é definido na interface
    public function toJson() {
        return json_encode($this->toArray());
        // json_encode converte vetor em string json
    }

    // Método que retorna vetor associativo contendo os valores das propriedades
    public function toArray() {
        return ['id'=>$this->ID, 'nome'=>$this->nome,'detalhe'=>$this->quantidade, 'idcntr'=>$this->ID_CTNR];
    }

    // Inclui o conteúdo do Trait
    use trait__get;
}
?>