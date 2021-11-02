<?php
header('location: cliente-index.php');
spl_autoload_register(function ($class_name) {
    include '..\\..\\'.$class_name . '.php';
});
use Models\Cliente;
use Db\Persiste;
if ( isset($_POST['nomeCliente']) && isset($_POST['cnpjCliente']))
{
    // id foi colocado 0 pois será gerado automaticamente pelo banco de dados
    $novocliente = new Cliente(0,$_POST['nomeCliente'],$_POST['cnpjCliente']);
    Persiste::Add($novocliente);
}
?>
