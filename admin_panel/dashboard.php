<?php include("config.php"); ?>
<?php include("logged_in_check.php"); ?>

<!DOCTYPE html> 
<html lang = "en"> 
    <head> 
        <meta charset = "UTF-8"> 
        <meta name = "viewport"             content = "width=device-width, initial-scale=1.0 , minimum-scale=1"> 
        <meta name = "author"               content = "Atakan Yigit Cengeloglu"> 
        <meta name = "description"          content = "Welcome to Yigit's Store">
        <title>Dashboard</title> 
        <link rel = "icon"                  href = "favicon.ico">
        <link rel = "stylesheet preload"    type = "text/css"    href = "style.css" as = "style"> 
        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel = "stylesheet" integrity = "sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin = "anonymous">
        <link rel="stylesheet" href="admin_template/Theme/css/font-awesome.min.css" type="text/css" />     
        <link rel="stylesheet" href="admin_template/Theme/css/bootstrap.min.css" type="text/css" />    
        <link rel="stylesheet" href="admin_template/Theme/js/libs/css/ui-lightness/jquery-ui-1.9.2.custom.css" type="text/css" />  
        <link rel="stylesheet" href="admin_template/Theme/css/App.css" type="text/css" />
        <link rel="stylesheet" href="admin_template/Theme/css/Login.css" type="text/css" />
        <link rel="stylesheet" href="admin_template/Theme/css/custom.css" type="text/css" />
    </head>
    <body>
        <?php include('top_bar.php'); ?>
        <?php include('left_sidebar.php'); ?>

        <div id="login-container" style = "min-height: 85vh; min-width: 50vw">
            <h1 style = "color: white; margin-top:32px">Welcome, <?php echo $_SESSION['admin_username']; ?></h1>
            <h3 style = "color: white">Products</h3>
            <?php 
                $product_count = count(query_parser("SELECT * FROM products"));
                if($product_count == 0) echo "<h4 style = 'color: white'>No products found</h4>";
                else echo "<h4 style = 'color: white'>Total Products: $product_count</h4>";
            ?>
            <div class = "d-flex flex-row justify-content-center gap-5" style = "width: 800px; min-height:72vh">
                <div class = "d-flex justify-content-start gap-5 flex-wrap mb-5" style = "width: 100%">
                    <?php foreach(query_parser("SELECT * FROM products") as $product) { ?>
                        <div class = "card rounded" style = "width: 45%;" action = "direct_order.php?id=<?php echo $product["id"]; ?>" method = "POST">
                            <a href = "/Basic-E-Commerce-Application/user_front/product_details.php?id=<?php echo $product["id"]; ?>" class = "card-img-top justify-content-center align-items-start d-flex overflow-hidden" style = "height: 200px;">
                                <img src = "data:image/png;base64, <?php echo base64_encode($product["image"]); ?>" style = "max-width: 100%" alt = "<?php echo $product["name"]; ?>">
                            </a>
                            <div class = "card-body">
                                <h5 class = "card-title"><?php echo $product["name"]; ?></h5>
                                <p class = "card-text"><?php echo substr($product["description"], 0, 150); if(strlen($product["description"]) > 150) echo "..."; ?></p>
                                <p class = "card-text"><?php echo $product["price"]; ?>$</p>
                                <div class = "d-flex flex-row gap-3 justify-content-between align-items-center w-100">
                                    <a class = "btn btn-warning" href = "product_edit.php?id=<?php echo $product["id"]; ?>">Edit</a>
                                    <a class = "btn btn-danger" href = "product_delete_service.php?id=<?php echo $product["id"]; ?>">Delete</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>

        <script src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity = "sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin = "anonymous"></script>
        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity = "sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin = "anonymous"></script>
    </body>
</html>