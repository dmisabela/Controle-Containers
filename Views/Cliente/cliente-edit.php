<?php include '..\header.php'; ?>

<?php
spl_autoload_register(function ($class_name) {
    include '..\\..\\' . $class_name . '.php';
});

use Models\Navio;
use Db\Persiste;

$p = Persiste::GetById('Models\Cliente', $_GET['id']);

?>

<h3>Editar Cliente</h3>
<div class=container>
    <div class="row">
        <div class="col-sm-6">
            <form action="cliente-update.php" method="post">
                <input type="hidden" name="id" value="<?= $p->getID ?>">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" value="<?= $p->getNOME ?>" name="nomeCliente" class="form-control" maxlength="100" required />
                </div>
                <div class="form-group">
                    <label for="telefone">Cnpj</label>
                    <input type="text" value="<?= $p->getCNPJ ?>" name="cnpjCliente" class="form-control" maxlength="20" required />
                </div>
                <div class="form-group">
                    <input type="submit" value="Salvar" class="btn btn-primary btn-small" />
                    <a href="cliente-index.php" class="btn btn-primary btn-small">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '..\footer.php'; ?>