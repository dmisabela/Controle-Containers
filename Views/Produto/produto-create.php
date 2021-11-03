<?php
spl_autoload_register(function ($class_name) {
    include '..\\..\\' . $class_name . '.php';
});
?>
<?php include '../header.php'; ?>
<div class=container>
    <div class="row">
        <div class="col-sm-6">
            <h3 class="">Criar Produto</h3>
            <form action="produto-store.php" method="post">
                <div class="form-group">
                    <label for="nome">Nome do Produto</label>
                    <label>
                        <input type="text" name="nomeProduto" class="form-control" maxlength="150" required />
                    </label>
                </div>
                <div class="form-group">
                    <label for="avarias">Quantidade</label>
                    <label>
                        <input type="number" name="quantidade" class="form-control" maxlength="20" required />
                    </label>
                </div>

                <?php

                use Db\Persiste;
                use Models\Produto;
                use Models\Container;
                ?>

                <label for="sel1">Container</label>
                <select class="form-control" id="sel1" name="container">
                    <option>Selecione o Container</option>
                    <?php
                    $containers = Persiste::GetAll('Models\Container');
                    foreach ($containers as $c) {

                        echo ("<option value=$c->getID>$c->getNUM_CTNR</option>");
                    }
                    ?>
                </select>

               







                <div class="form-group">
                    <input type="submit" value="Salvar" class="btn btn-primary btn-small" />
                    <a href="produto-index.php" class="btn btn-primary btn-small">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../footer.php'; ?>