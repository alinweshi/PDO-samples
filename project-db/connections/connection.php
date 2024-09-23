<?php
$server_name="localhost";
$dbname="project-db";
$username="root";
$password="";
$dsn=("mysql:host=$server_name;dbname=$dbname;charset=utf8;port=3307");
try{
    $pdo=new PDO($dsn,$username,$password,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE=> PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}
?>
