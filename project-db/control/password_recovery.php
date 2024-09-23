<?php
include '../connections/connection.php';

if (isset($_GET['email']) && !empty($_GET['Token']) && !empty($_GET['email'])) {
    $pattern = '/^[a-f0-9]{40}[a-f0-9]{40}$/i';
    if (preg_match($pattern, $_GET['Token'])) {
        if (filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email AND Token=:Token");
            $stmt->execute([
                ":email" => $_GET['email'],
                'Token' => $_GET['Token'],
            ]);
            if ($stmt->rowCount() > 0) {
                ?>
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>create your new password</title>
                    </head>
                    <body><div class="card-body">
                        <form action=""method="POST">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope fa"></i></span>
                            </div>
                            <input type="text" class="form-control" name="password"`id="password"
                                placeholder="Enter your New password" />
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope fa"></i></span>
                            </div>
                            <input type="text" class="form-control" name="confirm_password" id="confirm_password"
                                placeholder="confirm your password" />
                        </div>
                        <div class="form-group">
                            <input type="submit" value="reset password" name="reset_password"
                                class="btn float-right login_btn">
                        </div><div class="card-footer">
                        </form>
                    </body>
                    </html>
                    <?php
function test_input($data)
                {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
                if (isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['reset_password']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])) {
                    $password = test_input($_POST['password']);
                    $confirm_password = test_input($_POST['confirm_password']);
                    $uppercase = preg_match('@[A-Z]@', $password);
                    $lowercase = preg_match('@[a-z]@', $password);
                    $number = preg_match('@[0-9]@', $password);
                    $specialChars = preg_match('@[^\w]@', $password);
                    if ($uppercase && $lowercase && $number && $specialChars && strlen($password) >= 8) {
                        if ($password === $confirm_password) {
                            $password = password_hash($password,PASSWORD_DEFAULT,['cost'=>12]);
                            $stmt = $pdo->prepare("UPDATE users SET password=:password WHERE email=:email AND Token=:Token");
                            $stmt->execute([
                                ":email" => $_GET['email'],
                                'Token' => $_GET['Token'],
                                ":password" => $password,
                            ]);
                            if ($stmt->rowcount() > 0) {
                                echo "password changed successfully";
                            } else {
                                echo "password not changed";
                            }

                        } else {
                            echo "password and confirm password must be same";
                        }
                    } else {
                        echo "password must contain at least one lowercase letter, one uppercase letter, one number and one special character and at least 8 characters";
                    }

                } else {
                    echo "plz,enter your password";
                }

            } else {
                echo " invalid token or email ";
            }
        } else {
            echo "email is not in a valid format";
        }
        // The input string is a valid SHA-1 hash
    } else {
        echo "token is not in a valid format";
        // The input string is not a valid SHA-1 hash
    }
} else {
    echo "plz,fill up your form ";
}
