<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="insert.css">
        <title>insert data</title>
</head>
<body>
    <form method="POST" action="">
        <label for="username">username<label>
        <input id="username" name="username" ><br>
        <label for="password">password<label>
        <input id="password" name="password" ><br>
        <label for="permission">permission<label>
        <input id="permission" name="permission" ><br>
        <input type="submit" value="submit">
    </form>
<?php
include "connection.php";
$username=$_POST['username'];
$password=($_POST['password']);
$password=password_hash($password, PASSWORD_DEFAULT,['cost'=>12]);
$permission=$_POST['permission'];
try{
    for($i = 0;$i<=3;$i++) {
        $stmt = $pdo->prepare("INSERT INTO users (`username`,`password`,`permission`) VALUES('$username','$password','$permission')");
        $stmt->execute();
    }
}catch(EXCEPTION $e) {
    echo $e->getMessage();
}
$stmt=$pdo->prepare("SELECT * FROM users ");
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_OBJ);
echo "<pre>";
print_r($result);
echo "</pre>";
// foreach ($stmt as $bit) {
//     echo "<pre>";
//     print_r($bit);
//     echo "</pre>";
// }
?>
</body>
</html>

