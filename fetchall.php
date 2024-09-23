<?php 
include("connection.php");
$stmt=$pdo->prepare("SELECT * FROM `users` WHERE (`username` ='ali01')");
$stmt->execute();
$result=$stmt->fetchall(PDO::FETCH_OBJ);
$result01=$stmt->fetchall(PDO::FETCH_NUM);
echo"<pre>";
print_r($result);
echo"</pre>";
