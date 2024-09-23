<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
  <title>Navbar search add on BS 3 - Bootsnipp.com</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <div class="col-sm-3 col-md-3">
        <form class="navbar-form" role="search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="q">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
          </div>
        </form>
      </div>

<ul class="nav navbar-nav navbar-right">
<li class="dropdown">
  
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <?php
session_start();
          if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
              if (isset($_SESSION["nickname"]) && !empty($_SESSION["nickname"])) {
                  echo $_SESSION["nickname"];
                  ?> <b class="caret"></b></a>
  <?php
if (isset($_SESSION["nickname"]) && !empty($_SESSION["nickname"])) {
    switch ($_SESSION['privil']) {
        case 0:
            ?>
    <ul class="dropdown-menu">
    <li><a href="create_post.php">create post</a></li>
    <li><a href="change_email.php">change email</a></li>
    <li><a href="change_password.php">change password</a></li>
    <li><a href="change_nickname.php">update nickname</a></li>
    <li><a href="logout.php">Logout </a></li>
    <li class="divider"></li>
    </ul>
<?php
            break;
        case 1:
            ?>
      <ul class="dropdown-menu">
      <li><a href="create_post.php">create post</a></li>
      <li><a href="list_newest_post.php">list newest post</a></li>
      <li><a href="change_email.php">change email</a></li>
      <li><a href="change_password.php">change password</a></li>
      <li><a href="change_nickname.php">update nickname</a></li>
      <li><a href="logout.php">Logout </a></li>
      <li class="divider"></li>
      </ul>
</li>
 <?php
            break;
        default:
    }

}
                  ?>

    <?php
              }
          } else {
              echo 'hello guest';
              ?>
  <li><a href="login.php">Login</a></li>
  <li><a href="register.php">Register</a></li>
  <?php
          }
          ?>
    </div><!-- /.navbar-collapse -->
  </nav>


          
