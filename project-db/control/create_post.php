<?php
session_start();
require_once '../connections/connection.php';
if (isset($_POST['submit']) && isset($_POST['title']) && isset($_POST['body']) && !empty($_POST['title']) && !empty($_POST['body'])) {
    if (ctype_alpha($_POST['title'])) {
        if (preg_match("/^[a-zA-Z0-9\s.,!?@#$%^&*()-_+=|\[\]{}<>:;'\"\/~`]+$/", $_POST['body'])) {
            $stmt = $pdo->prepare("INSERT INTO posts (user_id,username,title,body) VALUES (:user_id,:username,:title,:body)");
            $stmt->execute([
                ':user_id' => (int)$_SESSION['id'],
                ':username' => $_SESSION['username'],
                'title' => $_POST['title'],
                ':body' => $_POST['body'],
            ]);
            if($stmt->rowCount() > 0) {
                $_SESSION['successful'] = "data has been inserted successfully";
                header('refresh:.2,url=../control/index.php');
            }
        } else{
            $_SESSION['error_body'] = "body should contain only alphabets and white spaces";
            header('refresh:.2,url=../views/create_post.php');
        }

    } else {
        $_SESSION['error_title'] = "Title should only contain letters ";
        header('refresh:.2,url=../views/create_post.php');
    }

} else {
    $_SESSION['error'] = "Title and Body fields are required";
    header('refresh:.2,url=../views/create_post.php');
}
