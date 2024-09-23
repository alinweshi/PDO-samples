<?php
//(database_type:host=host_name,dbname=database_name,user,password)
$dsn = ("mysql:host=localhost;port=3307;dbname=pdo");
try {
    $pdo = new PDO($dsn, "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    
} catch (PDOException $e) {
    echo $e->getMessage();
}

// echo "<pre>";
// print_r($stmt);
// echo "</pre>";
// var_dump($stmt);
