<?php 

include("config.php");

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>

    <title>Berk Hoca Default Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="" />

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,800italic,400,600,800" type="text/css">
    <link rel="stylesheet" href="admin_template/Theme/css/font-awesome.min.css" type="text/css" />     
    <link rel="stylesheet" href="admin_template/Theme/css/bootstrap.min.css" type="text/css" />    
    <link rel="stylesheet" href="admin_template/Theme/js/libs/css/ui-lightness/jquery-ui-1.9.2.custom.css" type="text/css" />  
    
    <link rel="stylesheet" href="admin_template/Theme/css/App.css" type="text/css" />
    <link rel="stylesheet" href="admin_template/Theme/css/Login.css" type="text/css" />

    <link rel="stylesheet" href="admin_template/Theme/css/custom.css" type="text/css" />
    
</head>

<body>

<div id="login-container">

    <div id="logo">
        <a href="admin_template/Theme/login.html">
            <img src="admin_template/Theme/img/logos/logo-login.png" alt="Logo" />
        </a>
    </div>

    <div id="login">

        <h3>Berk Hoca Default Admin</h3>

        <h5>Please log in to get access</h5>

        <?php 

            if(!empty($_GET['warning']) && $_GET['warning'] == 1) {

        ?>
        <div class="alert alert-danger">
            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
            <strong>Sorry!</strong> You have no permission to login with given informations
        </div>
        <?php 

            }

        ?>

        <form id="login-form" action="auth.php" method="POST" class="form">

            <div class="form-group">
                <label for="login-username">Username</label>
                <input type="text" class="form-control" name="form_username" id="login-username" placeholder="Username">
            </div>

            <div class="form-group">
                <label for="login-password">Password</label>
                <input type="password" class="form-control" name="form_password" id="login-password" placeholder="Password">
            </div>

            <div class="form-group">

                <button type="submit" id="login-btn" class="btn btn-primary btn-block">Signin &nbsp; <i class="fa fa-play-circle"></i></button>

            </div>
        </form>

        <!-- <a href="javascript:;" class="btn btn-default">Forgot Password?</a> -->

    </div> <!-- /#login -->



</div> <!-- /#login-container -->

<script src="admin_template/Theme/js/libs/jquery-1.9.1.min.js"></script>
<script src="admin_template/Theme/js/libs/jquery-ui-1.9.2.custom.min.js"></script>
<script src="admin_template/Theme/js/libs/bootstrap.min.js"></script>

<script src="admin_template/Theme/js/App.js"></script>

<script src="admin_template/Theme/js/Login.js"></script>

</body>
</html>

