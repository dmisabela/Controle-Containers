<!--
  Metadados dos arquivos que foram transferidos para o servidor são armazenados no vetor $_FILES. Este arquivo terá uma posição (ou célula) para cada arquivo transferido. Cada posição (ou célula) conterá um vetor interno com os metadados: name; type; tmp_name; error e size.

  name: nome original do arquivo (como na máquina do usuário).
  type: tipo do arquivo.
  tmp_name: caminho temporáriono no servidor (pasta) e nome temporário do arquivo.
  error: código de erro (0 e OK)
  size: tamanho do arquivo

  Neste exemplo, temos dois "input" tipo "file" com os nomes "arq1" e "arq2". Portanto, o vetor $_FILES terá duas posição (ou células) com índices "arq1" e "arq2". Dentro de cada posição (ou célula) haverá um vetor com os metadados.

  $_FILES corresponderá array([arq1]=>array(...), [arq2]=>array(...))

  Se quisermos atribuir à variável $N2 o nome do 2o arquivo transferido, deveremos fazer conforme a seguir.

  $N2 = $_FILES["arq2"]["name"]; 

  1) A primeira operação deste código copia o arquivo da pasta temporária para um local definitivo (pasta ExemploUpload/arquivo) com o mesmo nome que tinha na máquina do usuário.

  2) A segunda operação lê os dados do arquivo e os insere na tabela Mysql (ver descrição em FormUpload.php)

--> 

<?php

  $erro = array();

  if ($_FILES) { 

    $c = mysqli_connect("localhost","root","","controle_containers"); 

    if ($_FILES["arq1"]["tmp_name"] != null) {
      $ps=mysqli_prepare($c,"insert into navios values(?,?,?)"); 
      mysqli_stmt_bind_param($ps,"iss",$ID,$MN,$NV);
  
      $status = move_uploaded_file(  
        $_FILES["arq1"]["tmp_name"],
        "arquivo/".$_FILES["arq1"]["name"]); 
  
      if ($status) {       
        $a = fopen("arquivo/".$_FILES["arq1"]["name"],"r");
        if ($a) { 
          $lin = fgetcsv($a,100,";");
          $lin = fgetcsv($a,100,";");
          while($lin!=null) {            
            $ID = $lin[0];
            $MN = $lin[1];
            $NV = $lin[2];         
            if (!mysqli_stmt_execute($ps)) {
              $erro[count($erro)]="Linha ID={$lin[0]} não inserida";
            }
            $lin = fgetcsv($a,100,";");
          }
          fclose($a);
        }      
      }      
    }

    if ($_FILES["arq2"]["tmp_name"] != null) {
      $ps=mysqli_prepare($c,"insert into clientes values(?,?,?)"); 
      mysqli_stmt_bind_param($ps,"iss",$ID,$MN,$CNPJ);
  
      $status = move_uploaded_file(  
        $_FILES["arq2"]["tmp_name"],
        "arquivo/".$_FILES["arq2"]["name"]); 
  
      if ($status) {       
        $a = fopen("arquivo/".$_FILES["arq2"]["name"],"r");
        if ($a) { 
          $lin = fgetcsv($a,100,";");
          $lin = fgetcsv($a,100,";");
          while($lin!=null) {            
            $ID = $lin[0];
            $MN = $lin[1];
            $CNPJ = $lin[2];         
            if (!mysqli_stmt_execute($ps)) {
              $erro[count($erro)]="Linha ID={$lin[0]} não inserida";
            }
            $lin = fgetcsv($a,100,";");
          }
          fclose($a);
        }      
      }      
    }

    if ($_FILES["arq3"]["tmp_name"] != null) {
      $ps=mysqli_prepare($c,"insert into containers values(?,?,?,?,?)"); 
      mysqli_stmt_bind_param($ps,"issss",$ID,$NC,$AV,$IN,$IC);
  
      $status = move_uploaded_file(  
        $_FILES["arq3"]["tmp_name"],
        "arquivo/".$_FILES["arq3"]["name"]); 
  
      if ($status) {       
        $a = fopen("arquivo/".$_FILES["arq3"]["name"],"r");
        if ($a) { 
          $lin = fgetcsv($a,100,";");
          $lin = fgetcsv($a,100,";");
          while($lin!=null) {            
            $ID = $lin[0];
            $NC = $lin[1];
            $AV = $lin[2];    
            $IN = $lin[3];  
            $IC = $lin[4];     
            if (!mysqli_stmt_execute($ps)) {
              $erro[count($erro)]="Linha ID={$lin[0]} não inserida";
            }
            $lin = fgetcsv($a,100,";");
          }
          fclose($a);
        }      
      }      
    }

    if ($_FILES["arq4"]["tmp_name"] != null) {
      $ps=mysqli_prepare($c,"insert into produtos values(?,?,?,?)"); 
      mysqli_stmt_bind_param($ps,"isss",$ID,$MN,$QT,$IC);
  
      $status = move_uploaded_file(  
        $_FILES["arq4"]["tmp_name"],
        "arquivo/".$_FILES["arq4"]["name"]); 
  
      if ($status) {       
        $a = fopen("arquivo/".$_FILES["arq4"]["name"],"r");
        if ($a) { 
          $lin = fgetcsv($a,100,";");
          $lin = fgetcsv($a,100,";");
          while($lin!=null) {            
            $ID = $lin[0];
            $MN = $lin[1];
            $QT = $lin[2];    
            $IC = $lin[3];       
            if (!mysqli_stmt_execute($ps)) {
              $erro[count($erro)]="Linha ID={$lin[0]} não inserida";
            }
            $lin = fgetcsv($a,100,";");
          }
          fclose($a);
        }      
      }      
    } 


  }

?>
<!DOCTYPE html>
<html lang="pt_BR">
  <head>
    <title>Upload</title>  
  </head>
  <body>
  <?php include '..\header.php'; ?>
    <h3>Arquivo Carregado</h3>
    <h3>
      <?php
        foreach($erro as $i=>$v) {
          echo $v."<br/>";
        }
      ?>
    </h3>
  </body>
</html>