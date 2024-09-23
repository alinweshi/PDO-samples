
<?php
include("connection.php");

$stmt2=$pdo->prepare("SELECT * FROM `users` ");
$stmt2->execute();
class ahmed{
    public $username,$vehicle,$type,$entry;
    // public function __construct($username,$vehicle,$type ){
    //     $this->username=$username;
    //     $this->vehicle=$vehicle;
    //     $this->type=$type;  
    // }
}
$stmt1=$pdo->prepare("SELECT `username`,users.* FROM `users`  ");
$stmt1->execute();
$stmt1->setfetchMode(PDO::FETCH_CLASS|PDO::FETCH_CLASSTYPE);//setfetchmode to be used with fetch and overriding
// $stmt2->setfetchMode(PDO::FETCH_CLASS,"user",["khaled","car","toyota"]);//setfetchmode to be used with fetch and overriding
$result1=$stmt1->fetch();
// $result2=$stmt2->fetch();
echo "<pre>";
print_r($result1);
echo "</pre>";

// echo "<pre>";
// print_r($result2);
// echo "</pre>";

?>

