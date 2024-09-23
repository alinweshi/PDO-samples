

<?php 
include("connection.php");
$stmt=$pdo->prepare("SELECT * FROM `users` ");
$stmt->execute();
$result=$stmt->fetchall(PDO::FETCH_UNIQUE);
echo"<pre>";
print_r($result);
echo"</pre>";
