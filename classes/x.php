<?php 


function run($sql, $params = NULL)
{
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($params)
    return $stmt; 
}

?>