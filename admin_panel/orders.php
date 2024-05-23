<?php include("config.php");?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <title>Orders</title>
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
        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel = "stylesheet" integrity = "sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin = "anonymous">
    </head>

    <body>
        <?php include('top_bar.php'); ?>
        <?php include('left_sidebar.php'); ?>

        <div id="login-container">
            <div id="addProduct">
                <h1 class = "mt-5 mb-3">Orders</h1>
                <?php foreach(query_parser("SELECT * FROM orders") as $order) { ?>
                    <div class="card mb-4 card-body d-flex flex-row justify-content-between p-5 pt-3 pb-3 align-items-center" action = "update_category_service.php?id=<?php echo $category["id"]; ?>" method = "POST">
                        <div class="d-flex flex-row gap-3 align-items-center">
                            <h2 class="card-text"><?php echo $order["id"]; ?>- </h2>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <script src="admin_template/Theme/js/libs/jquery-1.9.1.min.js"></script>
        <script src="admin_template/Theme/js/libs/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="admin_template/Theme/js/libs/bootstrap.min.js"></script>
        <script src="admin_template/Theme/js/App.js"></script>
        <script src="admin_template/Theme/js/Login.js"></script>
        <script src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity = "sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin = "anonymous"></script>
        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity = "sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin = "anonymous"></script>
        <?php include('footer.php'); ?>
    </body>
</html>