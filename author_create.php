

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>authors_create</title>
    <link rel="stylesheet" type="text/css" href="authors_form.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>

<?php
require "connection_authors.php";
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$permission_error = "please fill permission field correctly";
$password_error = "please fill password field correctly";
$username_error = "please fill username field correctly";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST["username"]) && isset($_POST["username"])) {
        if (!empty($_POST["password"]) && isset($_POST["password"])) {
            if (!empty($_POST["permission"]) && isset($_POST["permission"])) {
                $username = test_input($_POST["username"]);
                $password = test_input(password_hash($_POST["password"], PASSWORD_DEFAULT, ["cost" => 12]));
                $permission = test_input($_POST["permission"]);
                $stmt = $pdo->prepare("INSERT INTO users(username,password,permission) VALUES(:username,:password,:permission)");
                // $stmt=$pdo->prepare("SELECT * FROM users ");
                $stmt->bindparam(':username', $username, PDO::PARAM_STR);
                $stmt->bindparam(':password', $password, PDO::PARAM_STR);
                $stmt->bindparam(':permission', $permission, PDO::PARAM_INT);
                $stmt->execute();
                $stmt = $pdo->prepare("SELECT * FROM users WHERE username='$username' ");
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    echo " it is okay ";
                    $result = $stmt->fetchAll();
                    echo "<pre>";
                    print_r($result);
                    echo "</pre>";
                } else {
                    echo "not rowcount";
                }
            } else {
                $permission_error;
            }
        } else {
            $password_error;

        }
    } else {
        $username_error;

    }
}

?>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
  <div class="form-group">
    <label for="username">Username</label>
    <div>
      <input type="text" id="username" name="username" class="form-control">
      <small class="error-message"><?php echo $username_error; ?></small>
    </div>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <div>
      <input type="password" id="password" name="password" class="form-control">
      <small class="error-message"><?php echo $password_error; ?></small>
    </div>
  </div>
  <div class="form-group">
    <label for="permission">Permission</label>
    <div>
      <input type="text" id="permission" name="permission" class="form-control">
      <small class="error-message"><?php echo $permission_error; ?></small>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>

