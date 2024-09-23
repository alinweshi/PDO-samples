<?php
include "connection.php";
$stmt = $pdo->query(" FROM `users` ");
$stmt->execute();
foreach ($stmt as $bit) {
    echo "<pre>";
    print_r($bit);
    echo "</pre>";
}

