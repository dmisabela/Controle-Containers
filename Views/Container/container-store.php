<?php
header('location: container-index.php');
spl_autoload_register(function ($class_name) {
    include '..\\..\\' . $class_name . '.php';
});

use Models\Container;
use Db\Persiste;

if (isset($_POST['numeroContainer']) && isset($_POST['avariasContainer']) && isset($_POST['navio']) && isset($_POST['cliente'])) {
    // id foi colocado 0 pois será gerado automaticamente pelo banco de dados
    $novoContainer = new Container(0, $_POST['numeroContainer'], $_POST['avariasContainer'], $_POST['navio'], $_POST['cliente']);
    Persiste::Add($novoContainer);
}
