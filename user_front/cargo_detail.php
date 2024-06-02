<?php include("config.php"); ?>
<!DOCTYPE html> 
<html lang = "en"> 
    <head> 
        <meta charset = "UTF-8"> 
        <meta name = "viewport"             content = "width=device-width, initial-scale=1.0 , minimum-scale=1"> 
        <meta name = "author"               content = "Atakan Yigit Cengeloglu"> 
        <meta name = "description"          content = "Welcome to Yigit's Store">
        <title>Cart</title> 
        <link rel = "icon"                  href = "favicon.ico">
        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel = "stylesheet" integrity = "sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin = "anonymous">
        <link rel = "stylesheet preload"    type = "text/css"    href = "style.css" as = "style"> 
    </head>
    <body>
        <?php include("navbar.php"); ?>
            <?php echo "<script>console.log('".json_encode($_SESSION["shipment_info"])."')</script>"; ?>

            <form action = "/Basic-E-Commerce-Application/user_front/shipment_info_save_service.php" method = "POST" class = "p-5 pt-3 d-flex flex-column gap-3" style = "height: 86vh">
                <input type="text" placeholder = "Address" required  class = "form-control" style = "font-size:24px" name = "address" value = "<?php echo $_SESSION["shipment_info"][0]["address"] ?? "" ?>">
                <input type="text" placeholder = "Telephone" required class = "form-control" style = "font-size:24px" name = "telephone" value = "<?php echo $_SESSION["shipment_info"][0]["telephone"] ?? "" ?>">
                <input type="text" placeholder = "Name" required class = "form-control" style = "font-size:24px" name = "name" value = "<?php echo $_SESSION["shipment_info"][0]["name"] ?? "" ?>">
                <input type="text" placeholder = "Surname" required class = "form-control" style = "font-size:24px" name = "surname" value = "<?php echo $_SESSION["shipment_info"][0]["surname"] ?? "" ?>">
                <button class = "btn btn-primary mb-5" style = "font-size:24px">Proceed to Payment</button>
            </form>
            <script src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity = "sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin = "anonymous"></script>
            <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity = "sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin = "anonymous"></script>
        <?php include("footer.php"); ?>
    </body>
</html>