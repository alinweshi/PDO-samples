<?php 
require_once'navbar.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>change nick name Page</title>
    <!--Made with love by Mutiullah Samim -->


</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>change nick name</h3>
                </div>

                <div class="card-body">
                    <form action="../control/change_nickname.php" method="POST">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope fa"></i></span>
                            </div>
                            <input type="text" class="form-control" name="nickname" id="nickname"
                                placeholder="Enter your new nickname " />
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope fa"></i></span>
                            </div>
                            <input type="text" class="form-control" name="password" id="password"
                                placeholder="Enter your password" />
                        </div>

                        <div class="form-group">
                            <input type="submit" value="update" name="change_nickname"
                                class="btn float-right login_btn">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>