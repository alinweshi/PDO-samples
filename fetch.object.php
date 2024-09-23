<?php
include "connection.php";
class user
{
    public $car, $username;
    public function __construct($car, $username)
    {
        $this->car = $car;
        $this->username = $username;
    }
}

$stmt1 = $pdo->prepare("SELECT * FROM users");
$stmt1 ->execute();
$stmt2 = $pdo->prepare("SELECT * FROM users");
$stmt2 ->execute();
$stmt3 = $pdo->prepare("SELECT * FROM users");
$stmt3->execute();
$result1 = $stmt1->fetchObject("user", ["toyota", "ahmed"]);
$result2 = $stmt2->fetchall(PDO::FETCH_CLASS,"user",["toyta","saeed"]);
$stmt3->setFetchMode(PDO::FETCH_CLASS,"user",["toyta","saeed"]);
$result3=$stmt3->fetch();
echo $result3->car."<br>";
echo $result2[0]->car."<br>";
echo $result2->car."<br>";


echo "<pre>";
print_r($result3);
echo "</pre>"."<hr>";
echo "<pre>";
print_r($result1);
echo "</pre>";
echo '<hr>';
echo "<pre>";
print_r($result2);
echo "</pre>";
