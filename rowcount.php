<?php
require "connection_authors.php";
try{
    $pdo->begintransaction();
    $stmt=$pdo->prepare("SELECT * FROM users");
    $stmt->execute();
    $stmt->fetchAll();
    $result =$stmt->rowCount();
    var_dump($result); 
    $pdo->commit();
}catch(PDOException $e){
    $pdo->rollback();
    echo $e->getMessage();
}


?>