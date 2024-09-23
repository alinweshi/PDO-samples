<?php

require_once '../connections/connection.php';
session_start();
// echo"<pre>";
// var_dump($_GET);
// echo"<br>";
// var_dump($_GET['id']);
// echo"<br>";
// var_dump($_SESSION['id']);
// echo"<br>";
// var_dump(isset($_GET['id']));
// echo"<br>";
// var_dump(!empty($_GET['id']));
// echo"<br>";
// die();
if(isset($_GET['id']) && ($_GET['id']) !== '' && !empty($_GET['id'])) {
    if(preg_match("/^[0-9]+" . "$/", $_GET['id'])) {
        $stmt = $pdo->prepare("SELECT * FROM posts WHERE id=:id");
        $stmt->execute([
            ':id' => $_GET['id']
        ]);
        if($stmt->rowCount() == 1) {
            // var_dump((int)$_GET['id']);
            // echo"<br>";
            // var_dump($_SESSION['id']);
            // echo"<br>";
            // die();
            if((int)$_GET['id']/*post_id*/ === (int)$_SESSION['id']/*user_id*/) {
                header("refresh:0,url=../views/edit_post.php");

            } else {
                $_SESSION['auth_error'] = 'you are not authorized to this post';
                header("refresh:0,url=../views/index.php");
            }
        } else {
            $_SESSION['id_not_found_error'] = 'no such id';
            header("refresh:0,url=../views/index.php");
        }
    } else {
        $_SESSION['id_format_error'] = 'id must be a number';
        header("refresh:0,url=../views/index.php");
    }
} else {
    $_SESSION['id_error'] = 'id can not be empty';
    header("refresh:0,url=../views/index.php");
}
