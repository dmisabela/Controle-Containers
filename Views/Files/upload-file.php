<!--
  O código neste arquivo é responsável por construir formulário HTML para que o usuário selecione dois arquivos para Upload,ou seja, arquivos que serão transferidos para o servidor que hospeda a aplicação. O primeiro arquivo deve ser CSV (arquivo texto com separador de dados, ponto-e-vírgula neste caso) com o conteúdo apresentado a seguir. O segundo arquivo pode ser um qualquer, seus dados não serão tratados pelo código PHP executado no servidor. O código PHP executado no servidor incluirá os dados do 1o arquivo em tabela do MYSQL (criar banco de dados "ESCOLA" e tabela "ALUNO" usando comando a seguir).
  O elemento <input type="file" ... /> implementa interface para o usuário selecionar o arquivo. 

-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Upload CSV</title>
</head>
<body>
<?php include '..\header.php'; ?>
<br/>
  <h3>Formulário Upload</h3>
  <form method="post" enctype="multipart/form-data" action="GravaDados.php">
   <label for="idArq1">Arquivo Navio</label>
   <input type="file" name="arq1" value="" id="idArq1"/>
   <br/>
   <label for="idArq2">Arquivo Clientes</label>
   <input type="file" name="arq2" value="" id="idArq2"/>
   <br/>
   <label for="idArq3">Arquivo Containers</label>
   <input type="file" name="arq3" value="" id="idArq3"/>
   <br/>
   <label for="idArq4">Arquivo Produtos</label>
   <input type="file" name="arq4" value="" id="idArq4"/>
   <br/>
   <input type="submit" name="cmd" value="Carregar" />
  </form>
</body>
</html>