
<?php
require_once 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>index</title>

</head>
<?php
if (isset($_SESSION['POST_METHOD_ERROR']) && !empty($_SESSION['POST_METHOD_ERROR'])) {
    ?>
    <div>
        <center class="alert-danger">
            <?php echo $_SESSION['POST_METHOD_ERROR'] ?>
        </center>
    </div>
    <?php
unset($_SESSION['POST_METHOD_ERROR']);
}
?>
<?php
if (isset($_SESSION['deleted_success']) && !empty($_SESSION['deleted_success'])) {
    ?>
    <div>
        <center class="alert-success">
            <?php echo $_SESSION['deleted_success'] ?>
        </center>
    </div>
    <?php
unset($_SESSION['deleted_success']);
}
?>
<?php
if (isset($_SESSION['delete_no_post']) && !empty($_SESSION['delete_no_post'])) {
    ?>
    <div>
        <center class="alert-success">
            <?php echo $_SESSION['delete_no_post'] ?>
        </center>
    </div>
    <?php
unset($_SESSION['delete_no_post']);
}
?>
<?php
if (isset($_SESSION['delete_auth_error']) && !empty($_SESSION['delete_auth_error'])) {
    ?>
    <div>
        <center class="alert-success">
            <?php echo $_SESSION['delete_auth_error'] ?>
        </center>
    </div>
    <?php
unset($_SESSION['delete_auth_error']);
}
?>
<?php
if (isset($_SESSION['delete_invalid_id_error']) && !empty($_SESSION['delete_invalid_id_error'])) {
    ?>
    <div>
        <center class="alert-success">
            <?php echo $_SESSION['delete_invalid_id_error'] ?>
        </center>
    </div>
    <?php
unset($_SESSION['delete_invalid_id_error']);
}
?>
<?php
if (isset($_SESSION['success']) && !empty($_SESSION['success'])) {
    ?>
    <div>
        <center class="alert-success">
            <?php echo $_SESSION['success'] ?>
        </center>
    </div>
    <?php
unset($_SESSION['success']);
}
?>
<?php
if (isset($_SESSION['auth_error']) && !empty($_SESSION['auth_error'])) {
    ?>
    <div>
        <center class="alert-danger">
            <?php echo $_SESSION['auth_error'] ?>
        </center>
    </div>
    <?php
unset($_SESSION['auth_error']);
}
?>
<?php
if (isset($_SESSION['id_not_found_error']) && !empty($_SESSION['id_not_found_error'])) {
    ?>
    <div>
        <center class="alert-danger">
            <?php echo $_SESSION['id_not_found_error'] ?>
        </center>
    </div>
    <?php
unset($_SESSION['id_not_found_error']);
}
?>
<?php
if (isset($_SESSION['id_format_error']) && !empty($_SESSION['id_format_error'])) {
    ?>
    <div>
        <center class="alert-danger">
            <?php echo $_SESSION['id_format_error'] ?>
        </center>
    </div>
    <?php
unset($_SESSION['id_format_error']);
}
?>
<?php
if (isset($_SESSION['id_error']) && !empty($_SESSION['id_error'])) {
    ?>
    <div>
        <center class="alert-danger">
            <?php echo $_SESSION['id_error'] ?>
        </center>
    </div>
    <?php
unset($_SESSION['id_error']);
}
?>

    <?php
if (isset($_SESSION['posts']) && !empty($_SESSION['posts'])) {
    ?>
<table class="table">
<thead>
<tr>
    <th scope="col">Id</th>
    <th scope="col">title</th>
    <th scope="col">body</th>
    <th scope="col">status</th>
    <th scope="col">Edit post</th>
    <th scope="col">Delete post</th>
</tr>
</thead>
<?php
foreach ($_SESSION['posts'] as $post) {
        ?>
    <tr>
    <td><?php echo $post['id'] ?></td>
    <td><?php echo $post['title'] ?></td>
    <td><?php echo $post['body'] ?></td>
    <td><?php echo ($post['approved']) === 0 ? 'not approved' : 'approved' ?></td>
    <td><a href="../control/edit_post.php?id=<?php echo ($post['id']) ?>" ><button class="btn-btn-primary">edit</button></a></td>
    <td><form method="POST" action="../control/delete_post.php?id=<?php echo ((int)$post['id']) ?>">
        <button type="submit"  name="delete" class="btn-danger">delete</button>
        </form>
    </td>
    </tr>
        <?php
}?>
</tbody>
</table>

<?php
} else {
    echo "no posts to view";
}
?>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <!-- Bootstrap 4 JS -->
</body>
</html>