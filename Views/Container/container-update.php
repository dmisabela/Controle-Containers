<?php
header('location: container-index.php'); // redireciona para o local indicado

spl_autoload_register(function ($class_name) {
    include '..\\..\\' . $class_name . '.php';
});

use Models\Container;
use Db\Persiste;

if (isset($_POST['id']) && isset($_POST['numeroContainer']) && isset($_POST['avariasContainer']) && isset($_POST['navio']) && isset($_POST['cliente'])) {

    // id foi colocado 0 pois será gerado automaticamente pelo banco de dados
    $novoContainer = new Container($_POST['id'], $_POST['numeroContainer'], $_POST['avariasContainer'], $_POST['navio'], $_POST['cliente']);
    var_dump($novoContainer);
    Persiste::Update($novoContainer);
}
