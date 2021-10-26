<?php include '../header.php'; ?>
<div class=container>
    <div class="row">
        <div class="col-sm-6">
            <h3 class="">Criar Navio</h3>
            <form action="navio-store.php" method="post">
                <div class="form-group">
                    <label for="nome">Nome do Navio</label>
                    <label>
                        <input type="text" name="nomeNavio" class="form-control" maxlength="150" required />
                    </label>
                </div>
                <div class="form-group">
                    <label for="telefone">Número da viagem</label>
                    <label>
                        <input type="text" name="numeroViagem" class="form-control" maxlength="20" required/>
                    </label>
                </div>
                <div class="form-group">
                    <input type="submit" value="Salvar" class="btn btn-primary btn-small"/>
                    <a href="navio-index.php" class="btn btn-primary btn-small">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../footer.php'; ?>
