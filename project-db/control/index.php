<?php
session_start();
require_once '../connections/connection.php';
$stmt = $pdo->prepare('SELECT * FROM posts');
$stmt->execute();
if ($stmt->rowCount() > 0) {
    $_SESSION['posts'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header("refresh:0,url=../views/index.php");
} else {
}
