<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
require "connection_authors.php";
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$password_error = "Password is required";
$username_error = "Username is required";
try{
    $pdo->begintransaction();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['username_sender']) && !empty($_POST['password']) && !empty($_POST['username_reciever']) && !empty($_POST['amount_to_transact'])) {
            if (isset($_POST['username_sender']) && isset($_POST['password']) && isset($_POST['username_reciever']) && isset($_POST['amount_to_transact'])) {
                $username_sender = test_input($_POST['username_sender']);
                $password = test_input($_POST["password"]);
                $username_reciever = test_input($_POST['username_reciever']);
                $amount_to_transact = $_POST['amount_to_transact'];
                $stmt = $pdo->prepare("SELECT * FROM users WHERE username=:username AND password=:password");
                $stmt->execute([
                    ':username' => $username_sender,
                    ':password' => $password,
                ]);
                if ($stmt->rowCount() > 0) {
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($amount_to_transact > 0 && $user["credit"] >= $amount_to_transact) {
                        $stmt = $pdo->prepare("UPDATE users SET credit = credit - :amount_to_transact WHERE username = :username_sender ");
                        $stmt->execute([
                            ':amount_to_transact' => $amount_to_transact,
                            ':username_sender' => $username_sender,
                        ]);
                        if ($stmt->rowCount() > 0) {
                            $stmt = $pdo->prepare("UPDATE users SET credit = credit + :amount_to_transact WHERE username = :username_reciever");
                            $stmt->execute([
                                ':amount_to_transact' => $amount_to_transact,
                                ':username_reciever' => $username_reciever,
                            ]);
                            echo "transaction completed successfully";
                        }
                    }else{
                        echo "Insufficient funds";
                    }
    
                }
            }
        } else {
            echo "All fields are required";
        }
    }
    $pdo->commit();
}catch(PDOException $e){
    echo 'error : '. $e->getmessage();
}


?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <label for="username_sender">Username_sender:</label>
    <input type="text" id="username_sender" name="username_sender" value="">
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" value="">
    <br>
    <label for="username_reciever">Username_reciever:</label>
    <input type="text" id="username_reciever" name="username_reciever" value="">
    <br>
    <label for="amount_to_transact">amount_to_transact:</label>
    <input type="text" id="amount_to_transact" name="amount_to_transact" value="">
    <button type="submit">login</button>
</form>

</body>
</html>
