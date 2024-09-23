<?php
session_start();
include '../connections/connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        if (!empty($_POST["username"])) {
            $username = $_POST["username"];
            if (!empty($_POST["password"])) {
                $password = $_POST["password"];
                $stmt = $pdo->prepare("SELECT * FROM users WHERE `username`=:username ");
                // $stmt->bindparam(":username",$username,PDO::PARAM_STR);
                // $stmt->bindparam(":password",$password,PDO::PARAM_STR);
                $stmt->execute([
                    ":username" => $username,
                ]);
                if ($stmt->rowCount() > 0) {
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($result['username'] === $username && password_verify($password, $result['password'])) {
                        echo "you are logged in successfully";
                        $_SESSION["logged_in"] = true;
                        $_SESSION["username"] = $result['username'];
                        $_SESSION["id"] = (int)$result['id'];
                        $_SESSION["email"] = $result['email'];
                        $_SESSION["password"] = $result['password'];
                        $_SESSION["nickname"] =($result['nickname']===NULL)?$_SESSION["username"] : $result['nickname'];
                        // $_SESSION["nickname"] = ($result['nickname'] === null) ? $_SESSION["username"] : $result['nickname'];
                        $_SESSION["last_login"] = $result['last_login'];
                        $_SESSION["privil"] = $result['privil'];
                        $stmt = $pdo->prepare("UPDATE users SET last_login=:last_login WHERE username=:username");
                        $stmt->execute([
                            ':username' => $_SESSION["username"],
                            ':last_login' =>
                            date("Y-m-d H:i:s"),
                        ]);
                        header("refresh:0,url=../control/index.php");
                        exit();
                    } else {
                        echo "incorrect username or incorrect password";
                    }
                }
            } else {
                echo "enter yor password";
            }
        } else {
            echo "plz,enter your username";
        }
    } else {
        echo "press login";
    }
} else {
    echo "request method is not post";
}
