<?php include("config.php");?>

<?php 
    $url = $_SERVER['REQUEST_URI'];
    $parsedUrl = parse_url($url);

    if (isset($parsedUrl['query'])) {
        parse_str($parsedUrl['query'], $queryParams);
        if (isset($queryParams['id'])) {
            $admin_id = $queryParams['id'];
        }else{
            echo "ID not found in the URL";
        }
    }else{
        echo "No query string found in the URL";
    }

    $admin = query_parser("SELECT * FROM admin_table WHERE admin_id = $admin_id")[0];
    
    $admin_name = $admin['admin_name'];
    $admin_surname = $admin['admin_surname'];
    $admin_username = $admin['admin_username'];
    $admin_pass = $admin['admin_pass'];
?>

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
        <div id="login-container" style = "min-height: 85vh">
            <div id="addProduct">
                <h1>Edit Admin: <?php echo $admin_name ?></h1>
                <form action="edit_admin_service.php/?id=<?php echo $admin_id ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Admin Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputType" value = "<?php echo $admin_name ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputType" class="form-label">Admin Surname</label>
                        <input type="text" name="surname"  class="form-control" id="exampleInputDescription" value = "<?php echo $admin_surname ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDescription" class="form-label">User Name</label>
                        <input type="text" name="userName" class="form-control" id="exampleInputQuantity" value = "<?php echo $admin_username?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputQuantity" class="form-label">Password</label>
                        <input type="text" name="password" class="form-control" id="exampleInputPrice" value = "<?php echo $admin_pass?>">
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