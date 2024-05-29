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
        <link rel = "stylesheet preload"    type = "text/css"    href = "stylesheets/payment.css" as = "style"> 
    </head>
    <body>
        <?php include("navbar.php"); ?>
            <div class = "paymentArea">
                <div class="payment">
                    <div class="bgPayment"></div>
                    <form class="cardPayment" action = "payment_info_save_service.php" method = "POST" autocomplete="off">
                        <img src="https://img.icons8.com/plasticine/100/000000/sim-card-chip.png" class="chip"/>
                        <div class="logo"></div>
                        <div class = "smtn">
                            <div class="inputBox">
                                <span>Card Number</span>
                                <input type="text" placeholder="0123 456 78901 2345" maxlength="19" required autocomplete="off" name = "card_number" value = "<?php echo $_SESSION["payment_info"]["card_number"] ?? "" ?>">
                            </div>
                            <div class="inputBox">
                                <span>Card Holder</span>
                                <input type="text" placeholder="Yigit" required autocomplete="off" name = "card_holder" value = "<?php echo $_SESSION["payment_info"]["card_holder"] ?? "" ?>">
                            </div>
                            <div class="group">
                                <div class="inputBox">
                                    <span>Valid Thru</span>
                                    <div class = "d-flex flex-row gap-1 align-items-center justify-content-center">
                                        <input type="text" placeholder="MM" maxlength="2" required autocomplete="off" style = "width: 32px" required name = "valid_month" value = "<?php echo $_SESSION["payment_info"]["valid_month"] ?? "" ?>">
                                        /
                                        <input type="text" placeholder="YY" maxlength="2" required autocomplete="off" style = "width: 32px" required name = "valid_year" value = "<?php echo $_SESSION["payment_info"]["valid_year"] ?? "" ?>">
                                    </div>
                                </div>
                                <div class="inputBox">
                                    <span>CCV</span>
                                    <input type="password" placeholder="***" maxlength="3" required autocomplete="one-time-code" name = "ccv">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btnCard" >Confirm & Pay</button>
                </form>
            </div>
        </div>
        
        <script src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity = "sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin = "anonymous"></script>
        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity = "sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin = "anonymous"></script>
        <?php include("footer.php"); ?>
    </body>
</html>
