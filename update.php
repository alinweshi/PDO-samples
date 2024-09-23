<?php
include "connection.php";
$stmt = $pdo->query("UPDATE `users` SET `username`='saeed',`permission`='1' WHERE `id`='12'");
$stmt = $pdo->query("SELECT * FROM users WHERE (`id`='12')");

$stmt->execute();
foreach ($stmt as $bit) {
    echo "<pre>";
    print_r($bit);
    echo "</pre>";
}
