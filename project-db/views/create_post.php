<?php
require_once 'navbar.php';
if (!isset($_SESSION['logged_in']) && empty($_SESSION['logged_in'])) {
    header("refresh:.5,url=login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href="./"></a>
    <title>Document</title>
</head>
<body>


    <div class="container">
        <?php
if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
    ?>
    <div>
       <center class="alert-danger" >+
        <?php
     echo $_SESSION['error'];
    ?>
    </center>
    </div>
    <?php
}
    unset($_SESSION['error']);
    ?>
        <?php
if (isset($_SESSION['successful']) && !empty($_SESSION['successful'])) {
    ?>
    <div>
       <center class="alert-alert-success" >
        <?php
     echo $_SESSION['successful'];
    ?>
    </center>
    </div>
    <?php
}
    unset($_SESSION['successful']);
    ?>
<form action="../control/create_post.php" method="POST">
    <div class="form-group">
        <label for="title" >Post title</label>
        <input type="text" name="title"  style="width: 100%;height: 100%;"  placeholder="post title" class="form-control">
        <?php
if (isset($_SESSION['error_title']) && !empty($_SESSION['error_title'])) {
    ?>
    <div>
       <center class="alert-danger" >
        <?php
     echo $_SESSION['error_title'];
    ?>
    </center>
    </div>
    <?php
}
    unset($_SESSION['error_title']);
    ?>
    </div>
    <div class="form-group">
    <label for="body" >Post body</label>
     <textarea type="text" name="body" placeholder="Post body" class="form-control" style="width: 100%;height: 100%;"></textarea>
     <?php
if (isset($_SESSION['error_body']) && !empty($_SESSION['error_body'])) {
    ?>
    <div>
       <center class="alert-danger" >
        <?php
     echo $_SESSION['error_body'];
    ?>
    </center>
    </div>
    <?php
}
    unset($_SESSION['error_body']);
    ?>
    </div>
    <div class="form-group">
    <input type="submit" name="submit" value="create post"  class="btn-btn btn-primary">
    </div>

</div>

</form>
</body>
</html>
