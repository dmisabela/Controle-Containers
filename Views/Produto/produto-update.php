<?php
header('location: produto-index.php'); // redireciona para o local indicado

spl_autoload_register(function ($class_name) {
    include '..\\..\\' . $class_name . '.php';
});

use Models\Produto;
use Db\Persiste;

if (isset($_POST['id']) && isset($_POST['nomeProduto']) && isset($_POST['quantidade']) && isset($_POST['container'])) {

    // id foi colocado 0 pois será gerado automaticamente pelo banco de dados
    $novoProduto = new Produto($_POST['id'], $_POST['nomeProduto'], $_POST['quantidade'], $_POST['container']);
    Persiste::Update($novoProduto);
}
