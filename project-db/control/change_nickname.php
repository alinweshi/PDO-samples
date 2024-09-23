<?php
session_start();
include '../connections/connection.php';
if ($_SESSION['logged_in'] === true && isset($_SESSION['logged_in'])) {
    if (isset($_POST['nickname']) && isset($_POST['password']) && isset($_POST['change_nickname']) && !empty($_POST['nickname']) && !empty($_POST['password'])) {
        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $nickname = test_input($_POST['nickname']);
        $password = test_input($_POST['password']);
        $stmt=$pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(array('email'=>$_SESSION['email']));
        if($stmt->rowCount()){
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            $lowercase = preg_match('@[a-z]@', $password);
            $uppercase = preg_match('@[A-Z]@', $password);
            $number = preg_match('@[0-9]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);
            if ($uppercase && $lowercase && $number && $specialChars && strlen($password) >= 8){
                    if (password_verify($password, $result['password'])) {
                        $password=password_hash($password,PASSWORD_DEFAULT,['cost'=>12]);
                        $stmt = $pdo->prepare("UPDATE users SET nickname =:nickname WHERE email = :email");
                        $stmt->bindParam(':nickname', $nickname, PDO::PARAM_STR);
                        $stmt->bindParam(':email', $_SESSION['email'], PDO::PARAM_STR);
                        $stmt->execute();
                        if ($stmt->rowCount() > 0) {
                            echo "<script>alert('Password changed successfully');</script>";
                            header("Location: ../views/index.html");
                            exit();
                        }
                    } else {
                        echo "<script>alert('incorrect password');</script>";
                    }
            }

            

        }

    } else {
        echo "<script>alert('Please fill in all fields');</script>";
    }
} else {
    echo "<script>alert('Please login to access this page');</script>";
}
