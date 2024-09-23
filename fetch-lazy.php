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
include("connection.php");
$username=$_POST['username'];
$password=($_POST['password']);
$password=password_hash($password, PASSWORD_DEFAULT,['cost'=>12]);
$permission=$_POST['permission'];
class user
{
    
    public $username;
    public $vehicle;
    public $type;
    public $entry;
}
$user=new user;

$stmt1=$pdo->prepare("INSERT INTO users (username,password,permission) VALUES (:username,:password,:permission)");
$stmt1->execute([':username'=>$username,':password'=>$password,':permission'=>$permission]);
$stmt2=$pdo->prepare("SELECT * FROM `users` WHERE username=:username ");
$stmt2->execute([':username'=>$username]);
$result1=$stmt2->fetch(pdo::FETCH_LAZY);
echo "<pre>";
print_r($result1["username"]);
echo "</pre>";
echo "<pre>";
print_r($result1->username);
echo "</pre>";
