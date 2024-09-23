

<?php
include("connection.php");

class user
{
    public $username;
    public $vehicle;
    public $type;
    public $entry;

}
$user=new user;
echo "<pre>";
var_dump($user);
echo "</pre>";
$stmt1=$pdo->prepare("SELECT `username`,users.* FROM `users`  ");
$stmt1->execute();
$stmt1->setfetchMode(PDO::FETCH_INTO,$user);//to update the object 
$result1=$stmt1->fetch();
echo "<pre>";
var_dump($user);
echo "</pre>";
echo "<pre>";
print_r($result1);
echo "</pre>";
echo "<pre>";
var_dump($user);
echo "</pre>";



?>

