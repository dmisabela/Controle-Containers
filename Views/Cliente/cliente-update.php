<?php
header('location: cliente-index.php'); // redireciona para o local indicado

spl_autoload_register(function ($class_name) {
    include '..\\..\\'.$class_name . '.php';
});

use Models\Cliente;
use Db\Persiste;

if ( isset($_POST['id']) && isset($_POST['nomeCliente']) && isset($_POST['cnpjCliente'])) {

    // id foi colocado 0 pois será gerado automaticamente pelo banco de dados
    $n = new Cliente($_POST['id'], $_POST['nomeCliente'], $_POST['cnpjCliente']);
   
   Persiste::Update($n);
}
?>