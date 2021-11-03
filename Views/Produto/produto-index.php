<?php
spl_autoload_register(function ($class_name) {
    include '..\\..\\' . $class_name . '.php';
});
?>

<?php include '..\header.php'; ?>

<h4>Produtos</h4>
<a href="produto-create.php" class="btn btn-primary btn-small">Novo Produto</a>
<table class="table table-striped" style="margin-top: 5px">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Quantidade</th>
        <th>Container</th>
        <th></th>
        <th></th>
    </tr>
    <?php

    use Db\Persiste;
    use Models\Produto;

    $produtos = Persiste::GetAll('Models\Produto');
    
    //echo($navio);

    foreach ($produtos as $p) {
        $container = Persiste::GetById('Models\Container', $p->getID_CTNR);
        echo "<tr><td>$p->getID</td><td>$p->getNOME</td><td>$p->getQUANTIDADE</td> <td>$container->getNUM_CTNR</td>"
            . "<td><a href='produto-edit.php?id=$p->getID' class='btn btn-primary btn-small'>Editar</a></td>"
            . "<td><a href='produto-delete.php?id=$p->getID' class='btn btn-primary btn-small'>Excluir</a></td></tr>";
    }

    ?>
</table>

<?php include '..\footer.php'; ?>