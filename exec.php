<?php
include "connection.php";
$stmt = $pdo->exec("DELETE  FROM `users` where id BETWEEN '20' AND '50'");
var_dump($stmt);
echo "Number of rows: " . $stmt . "<br>";

