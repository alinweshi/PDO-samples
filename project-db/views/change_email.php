<?php 
require_once'navbar.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <!--Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->

</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Change your email</h3>
                </div>

                <div class="card-body">
                    <form action="../control/change_email.php" method="POST">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope fa"></i></span>
                            </div>
                            <input type="text" class="form-control" name="email" id="email"
                                placeholder="Enter your New Email" />
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="password">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="save" name="save" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center">
                        <a href="../views/password_recovery.html">Forgot your password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>