<?php
session_start();
include '../connections/connection.php';
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['save']) && !empty($_POST['email'] && $_POST['password'])) {
        $password = test_input($_POST['password']);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        if($uppercase && $lowercase &&$number && $specialChars && strlen($password) >= 8){
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username=:username");
            $stmt->execute(array(":username" => $_SESSION['username']));
            if ($stmt->rowCount() == 1) {
                foreach ($result=$stmt->fetchAll() as $row){
                    // echo"<pre>";
                    // print_r($row);
                    // echo"</pre>";
                    // echo"<pre>";
                    // print_r($result);
                    // echo"</pre>";
                    // echo $row['id'];
                    // echo $row['password'];
                    if (password_verify($_POST['password'], $row['password'])) {
                        filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                        $stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email");
                        $stmt->execute(array(":email" => $_POST['email']));
                    if ($stmt->rowCount()) {
                        echo "email is already taken,pick another one";
                    } else {
                        $result=$stmt->fetch(PDO::FETCH_ASSOC);
                        var_dump($result);
                        $stmt=$pdo->prepare("UPDATE users SET email=:email WHERE username=:username");
                        $stmt->execute(array(":email" => $_POST['email'], ":username" => $_SESSION['username']));
                        if ($stmt->rowcount() == 1) {
                            echo " your email has been changed";
                            header("location:../views/dashboard.html");
                        }
                    } 
                }else {
                    echo "password is incorrect";
                }
            }
        } else {
            echo "plz,fill tp your informations";
        }
        }

} else {
    echo "you have to login first ";
    header("location:login.html");
}
}
