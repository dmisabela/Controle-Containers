<?php
header('location: produto-index.php');
spl_autoload_register(function ($class_name) {
    include '..\\..\\' . $class_name . '.php';
});

use Models\Produto;
use Db\Persiste;

if (isset($_POST['nomeProduto']) && isset($_POST['quantidade']) && isset($_POST['container'])) {
    // id foi colocado 0 pois será gerado automaticamente pelo banco de dados
    $novoproduto = new Produto(0, $_POST['nomeProduto'], $_POST['quantidade'], $_POST['container']);
    Persiste::Add($novoproduto);
}
