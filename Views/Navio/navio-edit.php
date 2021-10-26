<?php include '..\header.php'; ?>

<?php
spl_autoload_register(function ($class_name) {
    include '..\\..\\'.$class_name . '.php';
});

use Models\Navio;
use Db\Persiste;

$p = Persiste::GetById('Models\Navio',$_GET['id']);

?>

<h3>Editar Pessoa</h3>
<div class=container>
    <div class="row">
        <div class="col-sm-6">
            <form action="navio-update.php" method="post">
                <input type="hidden" name="id" value="<?= $p->getID?>">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" value="<?= $p->getNOME?>" name="nomeNavio" class="form-control" maxlength="100" required />
                </div>
                <div class="form-group">
                    <label for="telefone">Numero da viagem</label>
                    <input type="text" value="<?= $p->getNUM_VIAGEM?>" name="numeroViagem" class="form-control" maxlength="20" required/>
                </div>
                <div class="form-group">
                    <input type="submit" value="Salvar" class="btn btn-primary btn-small"/>
                    <a href="navio-index.php" class="btn btn-primary btn-small">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '..\footer.php'; ?>

