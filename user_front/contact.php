<?php include("config.php"); ?>
<!DOCTYPE html> 
<html lang = "tr"> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="viewport"             content="width=device-width, initial-scale=1.0 , minimum-scale=1"> 
        <meta name="author"               content="Atakan Yigit Cengeloglu"> 
        <meta name="description"          content="Welcome to Yigit's Store">
        <title>Yigit's Shop | Contact</title> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon"                  href="favicon.ico">
        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel = "stylesheet" integrity = "sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin = "anonymous">
        <link rel="stylesheet preload"    type="text/css"    href="stylesheets/contact.css" as="style">
    </head>
    <body>
        <?php include("navbar.php"); ?>
        <!-- <a id = "languageButton" href=""><p id = "languageButtonText" href = "">En</p></a> -->        
        
        <main role="main">
            <section id = "map">
                <div class = "gmap_canvas">
                    <iframe id="gmaps" src="https://maps.google.com/maps?q=Yigit's Shop%20teknik&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" allowfullscreen></iframe>
                </div>
            </section>
            <section class = "container">
                <div class = "contactInfo">
                    <i class="fa fa-phone fa-lg"></i>
                    <a  href = "tel:+905545978881">+90 554 597 88 81</a>
                </div>
                <div class = "contactInfo phone2">
                    <i class="fa fa-phone fa-lg"></i>
                    <a  href = "tel:+905545978882">+90 554 597 88 82</a>
                </div>
                <div class = "contactInfo">
                    <i class="fa fa-envelope fa-lg"></i>
                    <a  href = "mailto:atakanyigit72@gmail.com">atakanyigit72@gmail.com</a>
                </div>
                <div class = "contactInfo adress">
                    <i class="fa fa-home fa-lg"></i>
                    <a id="adress" href = "https://goo.gl/maps/HVyUDn9opKHwWP27A">Maltepe Üniversity<br>Maltepe/İstanbul</a>
                </div>
            </section>
        </main>
        <?php include("footer.php"); ?>
        <script src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity = "sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin = "anonymous"></script>
        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity = "sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin = "anonymous"></script>
    </body>
</html>