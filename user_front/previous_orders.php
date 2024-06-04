<?php include("config.php");?>

<!DOCTYPE html>
<html class="no-js">
    <head>
        <title>Previous Orders</title>
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
        <?php include('navbar.php'); ?>
        <?php if (!isset($_SESSION["previous_orders"]) || count($_SESSION["previous_orders"]) == 0) { ?>
            <h1 class = "mt-5" style = "height: 79vh; text-align:center">You have no previous orders!</h1>
        <?php }else{ ?>
        
            <div class="d-flex flex-column justify-content-center align-items-center gap-5 mt-5">
                <?php foreach(query_parser("SELECT * FROM orders WHERE id IN (" . implode(",", $_SESSION["previous_orders"]) . ")") as $order) { ?>
                    <div class="card mb-4 card-body d-flex flex-column justify-content-between p-2 pt-2 pb-2 align-items-center w-50" action = "update_category_service.php?id=<?php echo $category["id"]; ?>" method = "POST">
                        <p><span style = "font-weight: 700">Order ID:</span> <?php echo $order["id"]; ?></p>
                        <p><span style = "font-weight: 700">Order Date:</span> <?php echo $order["created_at"]; ?></p>
                        <p><span style = "font-weight: 700">Total Price: </span>
                            <?php 
                                $total_price = 0;
                                foreach(query_parser("SELECT products.id as product_id, products.image as product_image, products.name as product_name, products.price as product_price, order_products.quantity as product_quantity FROM order_products INNER JOIN products ON order_products.product_id = products.id WHERE order_products.order_id = " . $order["id"]) as $product) {
                                    $total_price += $product["product_price"] * $product["product_quantity"];
                                }
                                echo "$" . $total_price;
                            ?>
                        </p>
                        <p><span style = "font-weight: 700">Shipping Info:</span>
                        <br/>
                            <?php 
                                $shipment_info = query_parser("SELECT * FROM shipment_infos WHERE id = " . $order["shipment_info"])[0];
                                echo $shipment_info["name"] . " " . $shipment_info["surname"] . "<br/>" . "Address: " . $shipment_info["address"] . "<br/>" . $shipment_info["telephone"] . "<br/>" . $shipment_info["status"];                                 
                            ?>
                        </p>
                        <p class = "mt-3" style = "text-decoration: none"><span style = "font-weight: 700">Products:</span></p>
                        <div class = "d-flex flex-column mt-3 gap-3" style = "text-decoration: none">
                            <?php foreach(query_parser("SELECT products.id as product_id, products.image as product_image, products.name as product_name, products.price as product_price, order_products.quantity as product_quantity FROM order_products INNER JOIN products ON order_products.product_id = products.id WHERE order_products.order_id = " . $order["id"]) as $product) { ?>
                                <a href = "/Basic-E-Commerce-Application/user_front/product_details.php?id=<?php echo $product["product_id"]; ?>" class = "card" style = "text-decoration: none">
                                    <div class = "card-body">
                                        <div class = "d-flex flex-row justify-content-start gap-5">
                                            <img src = "data:image/png;base64, <?php echo base64_encode($product["product_image"]); ?>" style = "width: 160px">
                                            <div>
                                                <p class = "card-text" style = "text-decoration: none">Product: <?php echo $product["product_name"]; ?></p>
                                                <p class = "card-text" style = "text-decoration: none">Price: $<?php echo $product["product_price"]; ?></p>
                                                <p class = "card-text" style = "text-decoration: none">Quantity: <?php echo $product["product_quantity"]; ?></p>
                                                <p class = "card-text" style = "text-decoration: none">Total Price: $<?php echo $product["product_price"] * $product["product_quantity"]; ?></p>
                                                <p class = "card-text" style = "text-decoration: none">Each: $<?php echo $product["product_price"]?></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>

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