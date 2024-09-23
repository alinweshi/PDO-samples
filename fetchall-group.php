
<?php 
include("connection.php");
$stmt=$pdo->prepare("SELECT username, users.* FROM `users` ");
$stmt->execute();
$result=$stmt->fetchall(PDO::FETCH_GROUP|PDO::FETCH_ASSOC);
echo"<pre>";
print_r($result);
echo"</pre>";

