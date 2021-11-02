<?php
namespace Models; // agrupamento de classes (caminho)

// Classe (ou Tipo) de Objeto
// obs.: Atividade implementa a interface Idados, significando que implementa todos os métodos definidos pela interface
class Container implements Idados{
    // Propriedades
    protected $ID;
    protected $NUM_CTNR;
    protected $AVARIAS;
    protected $ID_NAVIO;
    protected $ID_CLIENTE;
    // obs.: propriedades protected são acessíveis por subclasses (extend)

    // Método construtor.
    public function __construct($id,$numCtn,$avarias, $idNavio, $idCliente){
        $this->ID = $id;
        $this->NUM_CTNR=$numCtn;
        $this->AVARIAS=$avarias;
        $this->ID_NAVIO=$idNavio;
        $this->ID_CLIENTE=$idCliente;
    }

    // Método obrigatório pois é definido na interface
    public function toString(){
        return $this->NUM_CTNR.' '.$this->AVARIAS. ' '.$this->ID_NAVIO.' '.$this->ID_CLIENTE;
    }

    // Método obrigatório pois é definido na interface
    public function toJson() {
        return json_encode($this->toArray());
        // json_encode converte vetor em string json
    }

    // Método que retorna vetor associativo contendo os valores das propriedades
    public function toArray() {
        return ['id'=>$this->id, 'nome'=>$this->numCtn,'avarias'=>$this->avarias, 'idNavio'=>$this->idNavio, 'idCliente'=>$this->idCliente];
    }

    // Inclui o conteúdo do Trait
    use trait__get;
}
