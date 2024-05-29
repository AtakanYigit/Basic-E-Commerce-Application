<?php include("config.php"); ?>

<!DOCTYPE html> 
<html lang = "tr"> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="viewport"             content="width=device-width, initial-scale=1.0 , minimum-scale=1"> 
        <meta name="author"               content="Atakan Yigit Cengeloglu"> 
        <meta name="description"          content="Welcome to Yigit's Store">
        <title>Yigit's Shop</title> 
        <link rel="icon"                  href="favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel = "stylesheet" integrity = "sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin = "anonymous">
        <link rel="stylesheet preload"    type="text/css"    href="stylesheets/about.css" as="style">
    </head>
    <body>
        <?php include("navbar.php"); ?>
        
        <main role="main">
            <section class="aboutUs">
                <h1>Who are We?</h1>
                <p>Yigit's Shop is your one-stop shop for unexpected treasures! We're a team of passionate curators who scour the globe (well, virtually!) to bring you a unique selection of items across various categories. Whether you're a seasoned collector or just browsing for that special something, we offer a delightful mix of vintage finds, handcrafted delights, and everything in between.</p>
            </section>

            <section class="paint">
                <h2><em>The Yigit's Shop Difference</em></h2>
                <p>We believe that shopping should be an adventure, a chance to discover something new and exciting.  That's why we handpick every item in our store, ensuring you won't find the same old mass-produced goods.  We prioritize quality, craftsmanship, and a touch of the unexpected.  Our goal is to help you find items that spark joy, ignite your creativity, or simply add a touch of personality to your life.</p>
            </section>

            <section class="story">
                <h2><em>The Yigit's Shop Journey</em></h2>
                <p>Yigit's Shop started as a [describe the origin - a childhood hobby, a treasure hunt trip, etc.]. Founder, Yigit, has always had a keen eye for [mention Yigit's passion - unique finds, handcrafted pieces, etc.].  Driven by a desire to share this passion and make these discoveries accessible to everyone, Yigit's Shop was born.  Today, it's a thriving online marketplace that brings together a community of curious shoppers and passionate artisans from around the world.</p>
            </section>
        </main>
        <?php include("footer.php"); ?>
        <script src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity = "sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin = "anonymous"></script>
        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity = "sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin = "anonymous"></script>
    </body>
</html>

