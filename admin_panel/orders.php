<?php include("config.php");?>
<!DOCTYPE html>
<html class="no-js">
    <head>
    <meta charset = "UTF-8"> 
        <meta name = "viewport"             content = "width=device-width, initial-scale=1.0 , minimum-scale=1"> 
        <meta name = "author"               content = "Atakan Yigit Cengeloglu"> 
        <meta name = "description"          content = "Welcome to Yigit's Store">
        <title>Orders</title> 
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

        <div id="login-container" style = "min-height: 85vh">
            <div id="addProduct">
                <h1 class = "mt-5 mb-3" style = "color:white">Orders</h1>
                <?php foreach(query_parser("SELECT * FROM orders") as $order) { ?>
                    <div class="card mb-4 card-body d-flex flex-column justify-content-between p-3 pt-3 pb-3 align-items-center" action = "update_category_service.php?id=<?php echo $category["id"]; ?>" method = "POST" style = "background-color: #595959">
                        <p style = "color: white"><span style = "font-weight: 700">Order ID:</span> <?php echo $order["id"]; ?></p>
                        <p style = "color: white"><span style = "font-weight: 700">Order Date:</span> <?php echo $order["created_at"]; ?></p>
                        <p style = "color: white"><span style = "font-weight: 700">Total Price: </span>
                            <?php 
                                $total_price = 0;
                                foreach(query_parser("SELECT products.id as product_id, products.image as product_image, products.name as product_name, products.price as product_price, order_products.quantity as product_quantity FROM order_products INNER JOIN products ON order_products.product_id = products.id WHERE order_products.order_id = " . $order["id"]) as $product) {
                                    $total_price += $product["product_price"] * $product["product_quantity"];
                                }
                                echo "$" . $total_price;
                            ?>
                        </p>
                        <p style = "color: white"><span style = "font-weight: 700">Shipping Info:</span>
                        <br/>
                            <?php 
                                $shipment_info = query_parser("SELECT * FROM shipment_infos WHERE id = " . $order["shipment_info"])[0];
                                echo $shipment_info["name"] . " " . $shipment_info["surname"] . "<br/>" . "Address: " . $shipment_info["address"] . "<br/>" . $shipment_info["telephone"];                                    
                            ?>
                        </p>
                        <p style = "color: white"><span style = "font-weight: 700">Billing Info:</span>
                        <br/>
                            <?php 
                                $billing_info = query_parser("SELECT * FROM billing_infos WHERE id = " . $order["billing_info"])[0];
                                echo $billing_info["card_number"] . "<br/>" . 
                                $billing_info["card_holder"] . "<br/>" . 
                                $billing_info["valid_month"] . "/" . $billing_info["valid_year"];                                    
                            ?>
                        </p>
                        <p class = "mt-3" style = "text-decoration: none; color: white"><span style = "font-weight: 700">Products:</span></p>
                        <div class = "d-flex flex-column mt-3 gap-3 w-100" style = "text-decoration: none">
                            <?php foreach(query_parser("SELECT products.id as product_id, products.image as product_image, products.name as product_name, products.price as product_price, order_products.quantity as product_quantity FROM order_products INNER JOIN products ON order_products.product_id = products.id WHERE order_products.order_id = " . $order["id"]) as $product) { ?>
                                <a href = "/Basic-E-Commerce-Application/user_front/product_details.php?id=<?php echo $product["product_id"]; ?>" class = "card" style = "text-decoration: none; background-color: #cbcbcb">
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