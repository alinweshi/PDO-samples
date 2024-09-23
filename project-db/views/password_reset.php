<?php
require_once 'navbar.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>reset your password Page</title>
    <!--Made with love by Mutiullah Samim -->


</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>reset your password</h3>
                </div>

                <div class="card-body">
                    <form action="../control/password_reset.php" method="POST">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope fa"></i></span>
                            </div>
                            <input type="text" class="form-control" name="email" id="email"
                                placeholder="Enter your New Email" />
                        </div>

                        <div class="form-group">
                            <input type="submit" value="generate password" name="generate_password"
                                class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center">
                        <a href="../views/password_reset.html">Forgot your password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
