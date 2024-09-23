<?php
require_once'navbar.php';
?>

  <?php
foreach ($_SESSION['posts'] as $post) {
}
      ?>
<form class="form-group"  method="POST" action="../control/update_post.php?id=<?php echo $post['id']?>" >
      <div class="form-group">
      <label for="title">title</label>
      <input type="text" class="form-control" id="title"  placeholder="Enter title"  name="title" >
    </div>
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


  <div class="form-group">
    <label for="body">body </label>
    <input type="text" class="form-control" id="body"  placeholder="Enter body" name="body" >
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
    <label for="password">Password</label>
    <input type="text" class="form-control" id="password" placeholder="password" name="password" >
    <?php
if (isset($_SESSION['password_error']) && !empty($_SESSION['password_error'])) {
    ?>
    <div>
       <center class="alert-danger" >
        <?php
     echo $_SESSION['password_error'];
    ?>
    </center>
    </div>
    <?php
}
unset($_SESSION['password_error']);
?>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">update</button>
  <input type="hidden" id="id" name="id" value="<?php [$post['id']] ?>" > 
</form>
<?php
if( isset($_SESSION['inputs_error']) && !empty($_SESSION['inputs_error'])) {
    ?>
    <div>
        <center class="alert-danger">
            <?php echo $_SESSION['inputs_error']?>
        </center>
    </div>
    <?php
    unset($_SESSION['inputs_error']);
}
?>
<?php
