<?php 
    namespace App;
    use \PDO;

    include('connect.php');

    class Repository { 
        
        public static function GetAllDataPaginated($page, $pageSize, $entity) {
            try {

                $pdo = new PDO(hostDb,usuario,senha);

                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);

                $total = $pdo->query('
                    SELECT
                     COUNT(*)
                        FROM ' . 
                    $entity 
                 )->fetchColumn();
            
                 
                $limit = $pageSize;
                $offset = ($page - 1)  * $limit;

                $start = $offset + 1;
                $end = min(($offset + $limit), $total);
                
                $stmt = $pdo->prepare('
                SELECT
                    *
                FROM
                    ' . $entity .'
                ORDER BY
                    id
                LIMIT
                    :limit
                OFFSET
                    :offset
                ');
        
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
                $stmt->execute();

                http_response_code(200);

                echo json_encode($stmt);
                
            } catch (\Throwable $th) {
                echo "erro";
            }
        }
    }
    

?>
