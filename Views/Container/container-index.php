<?php
spl_autoload_register(function ($class_name) {
    include '..\\..\\'.$class_name . '.php';
});
?>

<?php include '..\header.php'; ?>

<h4>Containers</h4>
<a href="container-create.php" class="btn btn-primary btn-small">Novo Container</a>

<?php
use Db\Persiste;
use Models\Navio;
$navios = Persiste::GetAll('Models\Container');

try {

    $pdo = new PDO(hostDb,usuario,senha);

    // Configura o comportamento no caso de erros: levanta exceção.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Não emula comandos preparados, usa nativo do driver do banco
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);

    $total = $pdo->query('
        SELECT
            COUNT(*)
        FROM
            containers
    ')->fetchColumn();

    $limit = 3;
    $pages = ceil($total / $limit);

    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
        'options' => array(
            'default'   => 1,
            'min_range' => 1,
        ),
    )));

    $offset = ($page - 1)  * $limit;

    $start = $offset + 1;
    $end = min(($offset + $limit), $total);

    $prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

    $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';


    $stmt = $pdo->prepare('
        SELECT
            c.id as ID,
            c.num_ctnr as NUM_CTNR,
            c.avarias AS AVARIAS,
            n.NOME as NOME_NAVIO, 
            cl.NOME as NOME_CLIENTE
        FROM
            containers c
        INNER JOIN navios n ON (c.ID_NAVIO = n.ID)
        INNER JOIN clientes cl ON (c.ID_CLIENTE = cl.ID)
        ORDER BY
            id
        LIMIT
            :limit     
        OFFSET
            :offset
    ');

    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    $iterator = "";

    if ($stmt->rowCount() > 0) {

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $iterator = new IteratorIterator($stmt);

    } 

} catch (Exception $e) {
    echo '<p>', $e->getMessage(), '</p>';
}

?>

<table class="table table-striped" style="margin-top: 5px">
<th>ID</th>
        <th>Numero do Container</th>
        <th>Avarias</th>
        <th>Navio</th>
        <th>Cliente</th>
        <th></th>
        <th></th>
    <?php

    if ($iterator != null) {

        foreach($iterator as $table){

            $id = $table['ID'];
            $num_ctnr = $table['NUM_CTNR'];
            $avarias = $table['AVARIAS'];
            $navio = $table['NOME_NAVIO'];
            $cliente = $table['NOME_CLIENTE'];
    
            echo "<tr><td>$id</td><td>$num_ctnr</td><td>$avarias</td> <td>$navio</td> <td>$cliente</td>"
            . "<td><a href='container-edit.php?id=$id' class='btn btn-primary btn-small'>Editar</a></td>"
            . "<td><a href='container-delete.php?id=$id' class='btn btn-primary btn-small'>Excluir</a></td></tr>";
        }
        echo '<div style="text-align:center"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></div>';
    }    
    ?>
</table>

<?php

?>

<?php include '..\footer.php'; ?>


