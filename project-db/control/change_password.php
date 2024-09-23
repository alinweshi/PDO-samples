<?php
session_start();
include '../connections/connection.php';
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    if (isset($_POST['password']) && isset($_POST['new-password']) && isset($_POST['confirm-new-password']) && isset($_POST['save'])
        && !empty($_POST['password'] && $_POST['new-password'] && $_POST['confirm-new-password'])) {
        $password = test_input($_POST['password']);
        $new_password = test_input($_POST['new-password']);
        $confirm_new_password = test_input($_POST['confirm-new-password']);
        $specialChars_password = preg_match('@[^\w]@', $password);
        $specialChars_new_password = preg_match('@[^\w]@', $new_password);
        $specialChars_confirm_new_password = preg_match('@[^\w]@', $confirm_new_password);
        if ($specialChars_password && $specialChars_new_password && $specialChars_confirm_new_password && strlen($password) >= 8 && strlen($new_password) >= 8 && strlen($confirm_new_password) >= 8) {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username=:username");
            $stmt->execute(array(":username" => $_SESSION['username']));
            if ($stmt->rowCount() == 1) {
                foreach ($result = $stmt->fetchAll() as $row) {
                    if (password_verify($password, $row['password'])) {
                        if (!password_verify($password, $new_password)) {
                            if ($new_password === $confirm_new_password) {
                                $stmt = $pdo->prepare("UPDATE users SET password=:new_password WHERE username=:username");
                                $stmt->execute(array(":new_password" => password_hash($new_password, PASSWORD_DEFAULT, ["cost" => 12]), ":username" => $_SESSION['username']));
                                $message = "Your password has been changed";
                                header("location:../views/login.html?message=" . urlencode($message));
                                exit();
                            } else {
                                echo "password doesnot match";
                            }

                        } else {
                            echo "you can not enter a previous used password";
                        }

                    } else {
                        echo "password is incorrect";
                    }
                }
            }
        }else{
            echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
        }

    } else {
        echo "plz,fill tp your information";
    }
} else {
    header("location:../views/login.html");
    $_SESSION['message'] = "your have to login first";

}
