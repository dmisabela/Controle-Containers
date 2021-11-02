<?php include '../header.php'; ?>
<div class=container>
    <div class="row">
        <div class="col-sm-6">
            <h3 class="">Criar Cliente</h3>
            <form action="cliente-store.php" method="post">
                <div class="form-group">
                    <label for="nome">Nome do Cliente</label>
                    <label>
                        <input type="text" name="nomeCliente" class="form-control" maxlength="150" required />
                    </label>
                </div>
                <div class="form-group">
                    <label for="telefone">CNPJ</label>
                    <label>
                        <input type="text" name="cnpjCliente" class="form-control" maxlength="20" required/>
                    </label>
                </div>
                <div class="form-group">
                    <input type="submit" value="Salvar" class="btn btn-primary btn-small"/>
                    <a href="cliente-index.php" class="btn btn-primary btn-small">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../footer.php'; ?>
