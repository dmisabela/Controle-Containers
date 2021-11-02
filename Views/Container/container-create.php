<?php
spl_autoload_register(function ($class_name) {
    include '..\\..\\' . $class_name . '.php';
});
?>
<?php include '../header.php'; ?>
<div class=container>
    <div class="row">
        <div class="col-sm-6">
            <h3 class="">Criar Container</h3>
            <form action="container-store.php" method="post">
                <div class="form-group">
                    <label for="nome">Numero do Container</label>
                    <label>
                        <input type="text" name="numeroContainer" class="form-control" maxlength="150" required />
                    </label>
                </div>
                <div class="form-group">
                    <label for="avarias">Avarias</label>
                    <label>
                        <input type="text" name="avariasContainer" class="form-control" maxlength="20" required />
                    </label>
                </div>

                <?php

                use Db\Persiste;
                use Models\Container;
                use Models\Navios;
                ?>

                <label for="sel1">Navio</label>
                <select class="form-control" id="sel1" name="navio">
                    <option>Selecione o Navio</option>
                    <?php
                    $navios = Persiste::GetAll('Models\Navio');
                    foreach ($navios as $n) {

                        echo ("<option value=$n->getID>$n->getNOME</option>");
                    }
                    ?>
                </select>

                <label for="sel2">Cliente</label>
                <select class="form-control" id="sel2" name="cliente">
                    <option>Selecione o Cliente</option>
                    <?php
                    $clientes = Persiste::GetAll('Models\Cliente');
                    foreach ($clientes as $c) {

                        echo ("<option value=$c->getID>$c->getNOME</option>");
                    }
                    ?>
                </select>







                <div class="form-group">
                    <input type="submit" value="Salvar" class="btn btn-primary btn-small" />
                    <a href="container-index.php" class="btn btn-primary btn-small">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../footer.php'; ?>