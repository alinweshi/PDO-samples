<?php
require "connection_authors.php";
$stmt=$pdo->prepare("SELECT username,password,permission FROM users");
$stmt->execute();
$stmt->bindcolumn(1,$username);
$stmt->bindcolumn(2,$password);
$stmt->bindcolumn(3,$permission);
$result=$stmt->fetchall();
foreach($result as $row){
    echo "your name is : ".$username." and yor password is : ".$password." and you have permission : ".$permission."<br>";

}
    // echo "your name is : ".$username." and yor password is : ".$password." and you have permission : ".$permission."<br>";
?>
