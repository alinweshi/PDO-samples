<?php
include "connection.php";
$stmt = $pdo->query("SELECT * FROM `users`");
echo "Number of rows: " . $stmt->rowCount() . "<br>";