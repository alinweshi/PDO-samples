<?php
require_once '../connections/connection.php';
session_start();
// var_dump(isset($_POST['submit']));
// echo"<br>";
// var_dump(isset($_POST['title']));
// echo"<br>";
// var_dump(isset($_POST['body']));
// echo"<br>";
// var_dump(isset($_POST['password']));
// echo"<br>";
// var_dump(!empty($_POST['title']) );
// echo"<br>";
// var_dump(!empty($_POST['body']));
// echo"<br>";
// var_dump(!empty($_POST['password']));
// echo"<br>";
// die();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['submit']) && isset($_POST['title']) && isset($_POST['body']) && isset($_POST['password']) && !empty($_POST['title']) && !empty($_POST['body']) && !empty($_POST['password'])) {
        if (preg_match('/^[\p{L} ]+$/u', $_POST['title'])) {
            if (preg_match("/^[a-zA-Z0-9\s.,!?@#$%^&*()-_+=|\[\]{}<>:;'\"\/~`]+$/", $_POST['body'])) {
                if (password_verify($_POST['password'], $_SESSION['password'])) {
                    $stmt=$pdo->prepare("UPDATE posts SET title=:title, body=:body ,updated_at=:updated_at WHERE id=:id");
                    $stmt->bindParam(':title', $_POST['title']);
                    $stmt->bindParam(':body', $_POST['body']);
                    $date = new DateTime();
                    // $updated_at=date_default_timezone_set("Africa/Cairo");
                    $updated_at=$date->format('Y-m-d H:i:s');
                    $stmt->bindParam(':updated_at',$updated_at );
                    $stmt->bindParam(':id', $_SESSION['id']);
                    $stmt->execute();
                    if($stmt->rowCount()>0){
                        
                        $_SESSION['success'] = 'post updated';
                        header("refresh:0,url=../control/index.php");
                    }
                    } else {
                    $_SESSION['password_error'] = 'incorrect password';
                    header("refresh:0,url=../views/edit_post.php");
                }
            } else {
                $_SESSION['body_error'] = 'unknown letters '; //
                header("refresh:0,url=../views/edit_post.php");

            }
        } else {
            $_SESSION['error_title'] = 'only letters and alphabets are allowed';
            header("refresh:0,url=../views/edit_post.php");

        }

    } else {
        $_SESSION['inputs_error'] = 'plz,fill all the inputs';
        header("refresh:0,url=../views/edit_post.php");

    }
}
