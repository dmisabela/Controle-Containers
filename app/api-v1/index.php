<?php 

    include('../helpers/connect.php');
    
    $queryParams = Array();
    parse_str($_SERVER['QUERY_STRING'], $queryParams);

    if($_SERVER['REQUEST_METHOD'] == 'GET' && array_key_exists('path', $queryParams)) {
        $allowedPaths = Array("navios", "containers", "produtos", "clientes");

        $path = $queryParams["path"];

        if(in_array($path, $allowedPaths)) {
            $pdo = new PDO(hostDb,usuario,senha);
            echo($path);
            $data =  $total = $pdo->query('
            SELECT
                *
            FROM ' .
                $path)->fetchAll();
        
        http_response_code(200);

        echo json_encode($data);
        } else {
            $paths = implode(", ", $allowedPaths);
            echo "'<h1 style='color:red;text-align:center'>Path não permitido! Tente: ' $paths '</h1>";
        }
        
    } else {
        echo "<h1 style='color:red;text-align:center'>Informar no query params o PATH que você quer requisitar! <br> ex (adicionar no final da URL): ?path=navios </h1>";
    }

?>