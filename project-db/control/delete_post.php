<?php 
require_once '../connections/connection.php';
// var_dump($id);
// echo"<br>";
// var_dump($_SESSION['id']);
// die();
// var_dump($_SERVER['REQUEST_METHOD']);
if($_SERVER['REQUEST_METHOD']==='POST'){
    session_start();
    if (isset($_POST['delete']) && isset($_GET['id']) && !empty($_GET['id'])){
        $id=$_GET['id'];
        if(preg_match('/^[0-9]+$/',$_GET['id'])){
            $stmt=$pdo->prepare("SELECT * FROM posts WHERE id=:id");
            $stmt->execute([
                ":id"=>$_GET['id']
            ]);
            if($stmt->rowCount()>0){
                $row=$stmt->fetch();
                if($row['user_id']===(int)$_SESSION['id']/*user_id*/){
                        $stmt=$pdo->prepare("DELETE FROM posts WHERE id=:id");
                        $stmt->bindParam(':id',$_GET['id']);
                        $stmt->execute();
                        $_SESSION['deleted_success'] = 'post deleted successfully'; 
                        header('refresh:0,url=../control/index.php');
                    }else{
                        $_SESSION['delete_auth_error'] = 'you can not delete this post';
                        header('refresh:0,url=../views/index.php');
                    }
            }else{
                    $_SESSION['delete_no_post'] = 'no post found';
                    header('refresh:0,url=../views/index.php');
            }

            }else{
                $_SESSION['delete_invalid_id_error'] = 'invalid id format';
                header('refresh:0,url=../views/index.php');
            }
        }
}else{
    $_SESSION['POST_METHOD_ERROR'] = 'request method is not post';
    header('refresh:0,url=../views/index.php');
}
