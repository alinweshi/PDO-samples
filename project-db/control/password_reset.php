<?php
include '../connections/connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['generate_password']) && isset($_POST['email']) && (!empty($_POST['email']))) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email=?");
            $stmt->execute(array($_POST['email']));
            if ($stmt->rowCount() > 0) {
                function getRandomStringMd5($length = 255)
                {
                    $string = md5(rand());
                    $randomString = substr($string, 0, $length);
                    return $randomString;
                }
                $stmt = $pdo->prepare("UPDATE users SET Token=:Token WHERE email=:email");
                $stmt->execute([
                    ':email' => $_POST['email'],
                    // ':Token' => $access_token = md5(uniqid().rand(0, 1000000000).date("Y-m-d H:i")),
                    ':Token' => $access_token = sha1(uniqid('',true).rand(0, 1000000000)).sha1(date("Y-m-d H:i")),
                ]);
                if ($stmt->rowCount() > 0) {
                    $stmt = $pdo->prepare("SELECT email,Token FROM users WHERE email=?");
                    $stmt->execute(array($_POST['email']));
                    if ($stmt->rowCount() > 0) {
                        foreach ($stmt->fetchAll() as $value) {
                            ?>
                            <a href="password_recovery.php?email=<?=$value['email']?>&&Token=<?=$value['Token']?>">click here to reset your password</a>
                            <?php
                        }
                    } else {}
                } else {}

            } else {
                echo "email does not exist";
            }
        } else {
            echo "plz,provid us a valid email address";
        }
    } else {
        echo "email field is required ";
    }

} else {
    echo " request method is not post";
}
