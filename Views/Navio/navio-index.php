<?php
spl_autoload_register(function ($class_name) {
    include '..\\..\\'.$class_name . '.php';
});
?>

<?php include '..\header.php'; ?>

<h4>Navios</h4>
<a href="navio-create.php" class="btn btn-primary btn-small">Novo Navio</a>
<table class="table table-striped" style="margin-top: 5px">
    <tr><th>ID</th><th>Nome do Navio</th><th>Viagem do Navio</th><th></th><th></th></tr>
    <?php
    use Db\Persiste;
    use Models\Navio;
    $navios = Persiste::GetAll('Models\Navio');


    foreach($navios as $p){
        echo "<tr><td>$p->getID</td><td>$p->getNOME</td><td>$p->getNUM_VIAGEM</td>"
            ."<td><a href='navio-edit.php?id=$p->getID' class='btn btn-primary btn-small'>Editar</a></td>"
            ."<td><a href='navio-delete.php?id=$p->getID' class='btn btn-primary btn-small'>Excluir</a></td></tr>";
    }

    ?>
</table>

<?php include '..\footer.php'; ?>
