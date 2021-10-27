<?php
//header('location: navio-index.php'); // redireciona para o local indicado

spl_autoload_register(function ($class_name) {
    include '..\\..\\'.$class_name . '.php';
});

use Models\Navio;
use Db\Persiste;

if ( isset($_POST['id']) && isset($_POST['nomeNavio']) && isset($_POST['numeroViagem'])) {

    // id foi colocado 0 pois será gerado automaticamente pelo banco de dados
    $n = new Navio($_POST['id'], $_POST['nomeNavio'], $_POST['numeroViagem']);

    Persiste::Update($n);
  //  Persiste::Update($n);

}
?>
s