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
        <link rel="stylesheet preload"    type="text/css"    href="style.css" as="style"> 
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
                    <img src = "Media/ContactPage/Phone Icon.png" alt = "Phone Icon">
                    <a  href = "tel:+902166712200">+90 (216) 671 22 00 pbx</a>
                </div>
                <div class = "contactInfo phone2">
                    <img src = "Media/ContactPage/Phone Icon.png" alt = "Phone Icon">
                    <a  href = "tel:+905352221406">+90 (535) 222 14 06 - Kerem Atamer</a>
                </div>
                <div class = "contactInfo">
                    <img src = "Media/ContactPage/Mail Icon.png" alt = "Mail Icon">
                    <a  href = "mailto:k.atamer@promaksteknik.com">b.cengeloglu@promaksteknik.com</a>
                </div>
                <div class = "contactInfo adress">
                    <img src = "Media/ContactPage/Home Icon.png" alt = "Adress Icon">
                    <a id="adress" href = "https://goo.gl/maps/HVyUDn9opKHwWP27A">Küçükyalı İş Merkezi<br> Girne Mah. Irmaklar Sok. G35 <br>Maltepe/İstanbul</a>
                </div>
            </section>
        </main>
        
        <footer>
            <div class = "footerSection">
                <div>
                    <img class = "footerLogo" src = "Media/LogoWhite.png" alt = "Yigit's Shop Logo White">
                    <h6  class = "footerLogoText">Yigit's Shop TEKNİK MAKİNE SAN. TİC. LTD. ŞTİ.</h6>
                </div>
                <p class = "footerText">Elektrostatik toz boya makineleri, tribo tabanca, corona tabanca, boya merkezi, toz boya robotları, toz boya pompa, yüzey işlem nozulları, plastik kabin, siglon filtre hücresi, yedek parça.</p>
            </div>

            <div class = "footerSection footerMenuSection">
                <h6>Menü</h6>
                <a href = "aboutUs.html">Hakkımızda</a>
                <a href = "products.html">Ürünler</a>
                <a href = "documents.html">Dökümanlar</a>
                <a href = "contact.html">İletişim</a>
            </div>

            <div class = "footerSection footerContactSection">
                <div>
                    <img class = "footerIcon"         src = "Media/MainPage/FooterCallIcon.png"    alt = "Telefon">
                    <a   class = "footerContactInfo"  href = "tel:+902166712200">+90 (216) 671 22 00</a>
                </div>
                <div>
                    <img class="footerIcon"         src = "Media/MainPage/FooterMailIcon.png"      alt = "E-Mail">
                    <a   class="footerContactInfo"  href = "mailto:k.atamer@promaksteknik.com">k.atamer@promaksteknik.com</a>
                </div>
                <div>
                    <img class="footerIcon"         src = "Media/MainPage/FooterAdressIcon.png"    alt = "Adres">
                    <a   class="footerContactInfo"  href = "https://goo.gl/maps/HVyUDn9opKHwWP27A" target =  "_blank">Girne Mah. Küçükyalı İş Mrk. Irmaklar Sok. G35  Maltepe/İstanbul</a>
                </div>
            </div>
        </footer>
        <script defer src = "script.js"></script>
    </body>
</html>