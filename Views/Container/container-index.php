<?php
spl_autoload_register(function ($class_name) {
    include '..\\..\\'.$class_name . '.php';
});
?>

<?php include '..\header.php'; ?>

<h4>Containers</h4>
<a href="container-create.php" class="btn btn-primary btn-small">Novo Cliente</a>
<table class="table table-striped" style="margin-top: 5px">
    <tr><th>ID</th><th>Numero do Container</th><th>Avarias</th><th>Navio</th><th>Cliente</th><th></th><th></th></tr>
    <?php
    use Db\Persiste;
    use Models\container;
    $clientes = Persiste::GetAll('Models\Container');
   
    //echo($navio);

    foreach($clientes as $p){
         $naviozin = Persiste::GetById('Models\Navio', $p->getID_NAVIO);
         $cliente = Persiste::GetById('Models\Cliente', $p->getID_CLIENTE);
         echo "<tr><td>$p->getID</td><td>$p->getNUM_CTNR</td><td>$p->getAVARIAS</td> <td>$naviozin->getNOME</td> <td>$cliente->getNOME</td>"
            ."<td><a href='container-edit.php?id=$p->getID' class='btn btn-primary btn-small'>Editar</a></td>"
            ."<td><a href='container-delete.php?id=$p->getID' class='btn btn-primary btn-small'>Excluir</a></td></tr>";
    }

    ?>
</table>

<?php include '..\footer.php'; ?>
