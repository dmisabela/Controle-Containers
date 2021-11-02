<?php
namespace Models; // agrupamento de classes (caminho)

// Classe (ou Tipo) de Objeto
// obs.: Atividade implementa a interface Idados, significando que implementa todos os métodos definidos pela interface
class Cliente implements Idados{
    // Propriedades
    protected $ID;
    protected $NOME;
    protected $CNPJ;
    // obs.: propriedades protected são acessíveis por subclasses (extend)

    // Método construtor.
    public function __construct($id,$nome,$cnpj){
        $this->ID = $id;
        $this->NOME=$nome;
        $this->CNPJ=$cnpj;
    }

    // Método obrigatório pois é definido na interface
    public function toString(){
        return  this->ID. ' '. $this->NOME.' '.$this->CNPJ;
    }

    // Método obrigatório pois é definido na interface
    public function toJson() {
        return json_encode($this->toArray());
        // json_encode converte vetor em string json
    }

    // Método que retorna vetor associativo contendo os valores das propriedades
    public function toArray() {
        return ['ID'=>$this->ID, 'NOME'=>$this->NOME,'CNPJ'=>$this->CNPJ];
    }

    // Inclui o conteúdo do Trait
    use trait__get;
}
?>