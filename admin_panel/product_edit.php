<?php include("config.php");?>

<?php 
    $url = $_SERVER['REQUEST_URI'];
    $parsedUrl = parse_url($url);

    if (isset($parsedUrl['query'])) {
        parse_str($parsedUrl['query'], $queryParams);
        if (isset($queryParams['id'])) {
            $product_id = $queryParams['id'];
        }else{
            echo "ID not found in the URL";
        }
    }else{
        echo "No query string found in the URL";
    }

    $product    = query_parser("SELECT * FROM products WHERE id = $product_id")[0];
    $categories = query_parser("SELECT categories.id FROM categories INNER JOIN product_categories ON categories.id = product_categories.category_id WHERE product_categories.product_id = " . $product["id"]);
    $category_ids = "";
    $category_ids_string = "";
    foreach ($categories as $index => $category) {
        $category_ids .= $category["id"] . ($index == count($categories) - 1 ? "" : ", ");
        $category_ids_string .= $category["id"] . ($index == count($categories) - 1 ? "" : ", ");
    }
?>

<!DOCTYPE html>
<html class="no-js">
    <head>
        <title>Helin Default Admin Add Product</title>
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
        <?php include('top_bar.php'); ?>
        <?php include('left_sidebar.php'); ?>
        <div id="login-container" style = "min-height: 85vh">
            <div id="addProduct">
                <h3 style = "color: white">Add Product</h3>
                <form action="product_edit_service.php?id=<?php echo $product_id; ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label" style = "color: white">Product Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName" value = "<?php echo $product["name"]; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputType" class="form-label" style = "color: white">Category ids (Comma Seperated)</label>
                        <input type="text" name="category_id"  class="form-control" id="exampleInputType" value = "<?php echo $category_ids?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDescription" class="form-label" style = "color: white">Description</label>
                        <input type="text" name="description" class="form-control" id="exampleInputDescription" value = "<?php echo $product["description"]; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputQuantity" class="form-label" style = "color: white">Quantity</label>
                        <input type="number" name="quantity" class="form-control" id="exampleInputQuantity" value = "<?php echo $product["quantity"]; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPrice" class="form-label" style = "color: white">Price</label>
                        <input type="Number" name="price" class="form-control" id="exampleInputPrice" value = "<?php echo $product["price"]; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label" style = "color: white">Image</label>
                        <input type="file" name="image" style = "color: white"/>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <script src="admin_template/Theme/js/libs/jquery-1.9.1.min.js"></script>
        <script src="admin_template/Theme/js/libs/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="admin_template/Theme/js/libs/bootstrap.min.js"></script>
        <script src="admin_template/Theme/js/App.js"></script>
        <script src="admin_template/Theme/js/Login.js"></script>

        <?php include('footer.php'); ?>
    </body>
</html>