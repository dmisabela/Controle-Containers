<?php
spl_autoload_register(function ($class_name) {
    include '..\\..\\'.$class_name . '.php';
});
?>

<?php include '..\header.php'; ?>

<h4>Clientes</h4>
<a href="cliente-create.php" class="btn btn-primary btn-small">Novo Cliente</a>
<table class="table table-striped" style="margin-top: 5px">
    <tr><th>ID</th><th>Nome do Cliente</th><th>CNPJ</th><th></th><th></th></tr>
    <?php
    use Db\Persiste;
    use Models\Navio;
    $clientes = Persiste::GetAll('Models\Cliente');


    foreach($clientes as $p){
        echo "<tr><td>$p->getID</td><td>$p->getNOME</td><td>$p->getCNPJ</td>"
            ."<td><a href='cliente-edit.php?id=$p->getID' class='btn btn-primary btn-small'>Editar</a></td>"
            ."<td><a href='cliente-delete.php?id=$p->getID' class='btn btn-primary btn-small'>Excluir</a></td></tr>";
    }

    ?>
</table>

<?php include '..\footer.php'; ?>
