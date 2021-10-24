<?php
header('location: navio-index.php');
spl_autoload_register(function ($class_name) {
    include '..\\..\\'.$class_name . '.php';
});

use Models\Navio;
use Db\Persiste;

if ( isset($_POST['nomeNavio']) && isset($_POST['numeroVaigem']))
{
    // id foi colocado 0 pois será gerado automaticamente pelo banco de dados
    $novoNavio = new Navio(0,$_POST['nomeNavio'],$_POST['numeroVaigem']);
    Persiste::Add($novoNavio);
}
?>
