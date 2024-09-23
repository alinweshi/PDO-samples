<?php
include("connection.php");
$stmt1=$pdo->prepare("SELECT * FROM `users`  ");
$stmt1->execute();
$stmt2=$pdo->prepare("SELECT * FROM `users` ");
$stmt2->execute();
class user{
    public $username,$vehicle,$type,$entry;
    public function __construct($username,$vehicle,$type ){
        $this->username=$username;
        $this->vehicle=$vehicle;
        $this->type=$type;  
        $this->entry="username is: ".$username." and his vehicle is: ".$vehicle." and his car type is ". $type;
    }
}
$stmt1->setfetchMode(PDO::FETCH_CLASS,"user",["khaled","car","toyota"]);//setfetchmode to be used with fetch and overriding
$stmt2->setfetchMode(PDO::FETCH_CLASS,"user",["khaled","car","toyota"]);//setfetchmode to be used with fetch and overriding
$result1=$stmt1->fetchall();
$result2=$stmt2->fetch();
echo "<pre>";
print_r($result1);
echo "</pre>";
foreach($result1 as $value){
    echo $value->entry."<br>";
}
echo "<pre>";
print_r($result2);
echo "</pre>";
print_r ($result2->entry."<br>");

?>

