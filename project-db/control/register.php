<?php
include('../connections/connection.php');
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['register'])) {
        if(!empty($_POST['username'])) {
            $username = test_input($_POST['username']);
            if(preg_match("/^[A-Z][a-z]*$/", $username)) {
                if(!empty($_POST['email'])) {
                    $email = test_input($_POST['email']);
                    if(preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) {
                        filter_var($email, FILTER_VALIDATE_EMAIL);
                        $stmt=$pdo->prepare("SELECT * FROM users WHERE  username=:username  ");
                        $stmt->bindparam(':username',$username,PDO::PARAM_STR);
                        $stmt->execute();
                        if($stmt->rowCount()>0){
                            die("username  is already exist");
                        }
                        $stmt=$pdo->prepare("SELECT * FROM users WHERE   email=:email ");
                        $stmt->bindparam(':email',$email,PDO::PARAM_STR);
                        $stmt->execute();
                        if($stmt->rowCount()>0){
                            die("email is already exist");
                        }
                        if(!empty($_POST['password'])){
                            $password = test_input($_POST['password']);
                            $uppercase = preg_match('@[A-Z]@', $password);
                            $lowercase = preg_match('@[a-z]@', $password);
                            $number    = preg_match('@[0-9]@', $password);
                            $specialChars = preg_match('@[^\w]@', $password);
                            if($uppercase && $lowercase &&$number && $specialChars && strlen($password) >= 8){
                                if(!empty($_POST['confirm'])){
                                    $confirm=test_input($_POST['confirm']);
                                    if($password==$confirm){
                                        $password=password_hash($password, PASSWORD_DEFAULT,["cost"=>12]);
                                        $stmt=$pdo->prepare("INSERT INTO users (username,email,password) VALUES(:username,:email,:password)");
                                        $stmt->bindParam(':username',$username,PDO::PARAM_STR);
                                        $stmt->bindParam(':email',$email,PDO::PARAM_STR);
                                        $stmt->bindParam(':password',$password,PDO::PARAM_STR);
                                        $stmt->execute();
                                        echo"registeration is completed successfully <br>";
                                        if($stmt->rowcount()>0){
                                            $stmt=$pdo->prepare("SELECT * FROM users WHERE username=:username");
                                            $stmt->bindParam(':username',$username,PDO::PARAM_STR);
                                            $stmt->execute();
                                            $result=$stmt->fetch(PDO::FETCH_ASSOC);
                                            echo "welcome user : ". $result["username"]."<br> "." plz, go to login";
                                            header("location:../views/login.php");
                                        }
                                    }else{
                                         echo 
                                         $message=" password and confirm password not match";
                                    }
                                }else{
                                    echo"plz,enter your confirmation password";
                                }
                            }else{
                                echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
                            }
                        }else{
                             echo $message="plz,enter your password";

                        }
                    }else{
                        echo"Email is not in valid a valid form ";
                    }
                }else{
                    echo "plz,enter your email";
                } 
            } else {
                echo "Only alphabets and whitespace are allowed,make sure that the first letter is capital";            }
        }else{
            echo "plz,enter username";

        }
    }
}
