<?php
namespace Models; // agrupamento de classes (caminho)

// Classe (ou Tipo) de Objeto
// obs.: Atividade implementa a interface Idados, significando que implementa todos os métodos definidos pela interface
class Produto implements Idados{
    // Propriedades
    protected $nome;
    protected $quantidade;
    // obs.: propriedades protected são acessíveis por subclasses (extend)

    // Método construtor.
    public function __construct($nome,$quantidade){
        $this->nome=$nome;
        $this->quantidade=$quantidade;
    }

    // Método obrigatório pois é definido na interface
    public function toString(){
        return $this->nome.' '.$this->quantidade;
    }

    // Método obrigatório pois é definido na interface
    public function toJson() {
        return json_encode($this->toArray());
        // json_encode converte vetor em string json
    }

    // Método que retorna vetor associativo contendo os valores das propriedades
    public function toArray() {
        return ['nome'=>$this->nome,'detalhe'=>$this->quantidade];
    }

    // Inclui o conteúdo do Trait
    use trait__get;
}
?>