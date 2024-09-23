
<?php 
include("connection.php");
$stmt=$pdo->prepare("SELECT `username`,`password` FROM `users` ");
$stmt->execute();
$result=$stmt->fetchall(PDO::FETCH_KEY_PAIR);
echo"<pre>";
print_r($result);
echo"</pre>";
