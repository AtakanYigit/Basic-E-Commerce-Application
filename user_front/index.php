<?php 
    ini_set("display_errors", "1"); // 1 is on, 0 is off
    ini_set("display_startup_errors", "1"); // 1 is on, 0 is off
    error_reporting(E_ALL);
    ?>

<?php include("config.php"); ?>

<!DOCTYPE html> 
<html lang = "en"> 
    <head> 
        <meta charset = "UTF-8"> 
        <meta name = "viewport"             content = "width=device-width, initial-scale=1.0 , minimum-scale=1"> 
        <meta name = "author"               content = "Atakan Yigit Cengeloglu"> 
        <meta name = "description"          content = "Welcome to Yigit's Store">
        <title>Yigit's Store</title> 
        <link rel = "icon"                  href = "favicon.ico">
        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel = "stylesheet" integrity = "sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin = "anonymous">
        <link rel="stylesheet" href="/Basic-E-Commerce-Application/admin_panel/admin_template/Theme/css/font-awesome.min.css" type="text/css" />     
        <link rel = "stylesheet preload"    type = "text/css"    href = "style.css" as = "style"> 
    </head>
    <body>

        <script>
            const handle_add_to_cart_click = (e, id, count) =>{
                e.preventDefault();
                fetch("add_to_cart_service.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "id=" + id + "&count=" + count
                })
                    .then(response => {
                        if (response.ok) {
                            console.log(response);
                            location.reload();
                        } else {
                            throw new Error("Failed to add product to cart");
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        alert("Failed to add product to cart")
                    });
                }
        </script>
        <?php include("navbar.php"); ?>

        <main class = "px-5 pt-3">
            <h1>Welcome to Yigit's Store</h1>
            <p class = "mb-4">
                Ditch the traditional store experience! Yigit's Store isn't about aisles and products - we're all about awesome online courses to level you up.
                Our courses are designed to empower you. 
                Whether you're yearning to land your dream job and take your career to the next level, seeking to master a new hobby and ignite a hidden passion, or looking to boost your creative skills and unlock hidden talents, we have the course for you.
                At Yigit's Store, we believe that learning should be accessible and enriching, and our courses provide a springboard for personal and professional growth, all at your own pace and convenience.
            </p>
            <div class = "d-flex flex-row justify-content-center gap-5 w-100">
                <div class = "d-flex justify-content-start gap-5 flex-wrap mb-5" style = "width: 100%">
                    <?php if(count(query_parser("SELECT * FROM products")) == 0) echo'<h2>No products found</h2>';?>
                    <?php foreach(query_parser("SELECT * FROM products") as $product) { ?>
                        <?php if($product["quantity"] <= 0) continue; ?>
                        <?php if($product["is_hidden"] == 1) continue; ?>
                        <form class = "card rounded" style = "width: 20%;" action = "direct_order.php?id=<?php echo $product["id"]; ?>" method = "POST">
                            <a href = "product_details.php?id=<?php echo $product["id"]; ?>" class = "card-img-top justify-content-center align-items-start d-flex overflow-hidden" style = "height: 200px;">
                                <img src = "data:image/png;base64, <?php echo base64_encode($product["image"]); ?>" style = "max-width: 100%" alt = "<?php echo $product["name"]; ?>">
                            </a>
                            <div class = "card-body">
                                <h5 class = "card-title"><?php echo $product["name"]; ?></h5>
                                <p class = "card-text"><?php echo $product["description"]; ?></p>
                                <p class = "card-text"><?php echo $product["price"]; ?>$</p>
                                <div class = "d-flex flex-row gap-3">
                                    <input type="number" name="count_to_buy_for_<?php echo $product["id"]?>" class="form-control w-50" id="exampleInputName" value="1" min = "1" max = "<?php echo $product["quantity"]; ?>">
                                    <button class="btn btn-secondary w-50" style = "white-space:nowrap" type="button" onclick = "handle_add_to_cart_click(event, <?php echo $product['id']; ?>, document.querySelector('input[name=count_to_buy_for_<?php echo $product['id']; ?>').value)">Add to Cart</button>
                                </div>
                                <div class = "d-flex flex-row gap-3 mt-2 gap-3 align-items-center w-100">
                                    <input type = "submit" class = "btn btn-primary w-50" value = "Buy Now"/>
                                    <a class = "btn btn-secondary w-50" href = "product_details.php?id=<?php echo $product["id"]; ?>">Details</a>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </main>
        <script src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity = "sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin = "anonymous"></script>
        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity = "sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin = "anonymous"></script>
        <?php include("footer.php"); ?>
    </body>
</html>
