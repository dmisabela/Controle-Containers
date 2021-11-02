<?php include '..\header.php'; ?>

<?php
spl_autoload_register(function ($class_name) {
    include '..\\..\\' . $class_name . '.php';
});

use Models\Container;
use Models\Navio;
use Models\Cliente;
use Db\Persiste;

$p = Persiste::GetById('Models\Container', $_GET['id']);

?>

<h3>Editar Container</h3>
<div class=container>
    <div class="row">
        <div class="col-sm-6">
            <form action="container-update.php" method="post">
                <input type="hidden" name="id" value="<?= $p->getID ?>">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" value="<?= $p->getNUM_CTNR ?>" name="numeroContainer" class="form-control" maxlength="100" required />
                </div>
                <div class="form-group">
                    <label for="Avarias">Avarias</label>
                    <input type="text" value="<?= $p->getAVARIAS ?>" name="avariasContainer" class="form-control" maxlength="20" required />
                </div>

                <?php $navio = Persiste::GetById('Models\Navio', $p->getID_NAVIO); ?>
                <label for="sel1">Navio</label>
                <select class="form-control" id="sel1" name="navio">
                    <option value="<?= $navio->getID ?>" selected><?= $navio->getNOME ?></option>
                    <?php

                    $navios = Persiste::GetAll('Models\Navio');
                    foreach ($navios as $n) {

                        echo ("<option value=$n->getID>$n->getNOME</option>");
                    }
                    ?>
                </select>

                <?php $cliente = Persiste::GetById('Models\Cliente', $p->getID_CLIENTE); ?>
                <label for="sel1">Cliente</label>
                <select class="form-control" id="sel1" name="cliente">
                    <option value="<?= $cliente->getID ?>" selected><?= $cliente->getNOME ?></option>
                    <?php

                    $clientes = Persiste::GetAll('Models\Cliente');
                    foreach ($clientes as $c) {

                        echo ("<option value=$c->getID>$c->getNOME</option>");
                    }
                    ?>
                </select>


                <div class=" form-group">
                    <input type="submit" value="Salvar" class="btn btn-primary btn-small" />
                    <a href="container-index.php" class="btn btn-primary btn-small">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '..\footer.php'; ?>