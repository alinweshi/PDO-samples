<?php 
require_once'navbar.php';
?>
<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Change your password</h3>
                </div>

                <div class="card-body">
                    <form action="../control/change_password.php" method="POST">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="enter old password">
                        </div>
                        <div class="form-group">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="new-password" class="form-control" placeholder="enter new password">
                        </div>
                        <div class="form-group">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="confirm-new-password" class="form-control" placeholder="confirm new password">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="save" name="save" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>