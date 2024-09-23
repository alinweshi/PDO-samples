<?php
include "connection.php";
$stmt = $pdo->query("SELECT `id`, `username`, `password`, `permission` FROM `users` WHERE `id` BETWEEN '1' AND '3'");
$stmt->execute();
foreach ($stmt as $bit) {
    echo "<pre>";
    print_r($bit);
    echo "</pre>";
}


