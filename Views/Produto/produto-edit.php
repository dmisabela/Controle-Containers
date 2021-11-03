<?php include '..\header.php'; ?>

<?php
spl_autoload_register(function ($class_name) {
    include '..\\..\\' . $class_name . '.php';
});

use Models\Produto;
use Models\Container;
use Db\Persiste;

$p = Persiste::GetById('Models\Produto', $_GET['id']);

?>

<h3>Editar Produto</h3>
<div class=container>
    <div class="row">
        <div class="col-sm-6">
            <form action="produto-update.php" method="post">
                <input type="hidden" name="id" value="<?= $p->getID ?>">
                <div class="form-group">
                    <label for="nome">Nome do Produto</label>
                    <input type="text" value="<?= $p->getNOME ?>" name="nomeProduto" class="form-control" maxlength="100" required />
                </div>
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" value="<?= $p->getQUANTIDADE ?>" name="quantidade" class="form-control" maxlength="20" required />
                </div>

                <?php $container = Persiste::GetById('Models\Container', $p->getID_CTNR); ?>
                <label for="sel1">Container</label>
                <select class="form-control" id="sel1" name="container">
                  
                    <option value="<?= $container->getID ?>" selected><?= $container->getNUM_CTNR ?></option>
                    <?php
                    $containers = Persiste::GetAll('Models\Container');
                    foreach ($containers as $c) {

                        echo ("<option value=$c->getID>$c->getNUM_CTNR</option>");
                    }
                    ?>
                </select>
                <div class=" form-group">
                    <input type="submit" value="Salvar" class="btn btn-primary btn-small" />
                    <a href="produto-index.php" class="btn btn-primary btn-small">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '..\footer.php'; ?>