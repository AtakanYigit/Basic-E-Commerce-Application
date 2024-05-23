<?php include("config.php");?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <title>Add Admin</title>
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

    <?php include('top_bar.php'); ?>
    <?php include('left_sidebar.php'); ?>
    <body>
        
        <div id="login-container">
            <div id="logo">
                <a href="admin_template/Theme/login.html">
                    <img src="admin_template/Theme/img/logos/logo-login.png" alt="Logo" />
                </a>
            </div>

            <div id="addProduct">
                <h3>Add New Admin</h3>
                <form action="add_admin_service.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Admin Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputType" class="form-label">Admin Surname</label>
                        <input type="text" name="surname"  class="form-control" id="exampleInputType">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDescription" class="form-label">User Name</label>
                        <input type="text" name="userName" class="form-control" id="exampleInputDescription">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputQuantity" class="form-label">Password</label>
                        <input type="text" name="password" class="form-control" id="exampleInputQuantity">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <?php include('footer.php'); ?>


        <script src="admin_template/Theme/js/libs/jquery-1.9.1.min.js"></script>
        <script src="admin_template/Theme/js/libs/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="admin_template/Theme/js/libs/bootstrap.min.js"></script>
        <script src="admin_template/Theme/js/App.js"></script>
        <script src="admin_template/Theme/js/Login.js"></script>
    </body>
</html>