<?php
try {
        $db = new PDO('mysql:host=localhost;dbname=cafesadettin_yenidb', 'cafesadettin_user', 'Mwb&=RRryfCq');
   } catch ( PDOException $e ){
        print $e->getMessage();
   }
   
   $kullanici = $_POST['user'];
   $sifre = $_POST['pass'];
   
   $login = $db->prepare('SELECT * FROM tbl_user WHERE kullanici_adi=? AND sifre=?');
   $login->execute(array($kullanici, $sifre));
   if ($login->rowCount())
   {

    echo"<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='preconnect' href='https://fonts.googleapis.com'>
        <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
        <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;400&display=swap' rel='stylesheet'>
        <link rel='stylesheet' href='font-awesome-4.7.0/css/font-awesome.min.css'>
        <link rel='stylesheet' href='style.css'>
        <title>Sadettin Cafe</title>
    </head>
    <body>
        
        <section class='sub-header'>
            <nav>
                <a href='index.html'><img src='images/logoo.png'></a>
                <div class='nav-links' id='navLinks'>
                    <i class='fa fa-close' onclick='hideMenu()'></i>
                    <ul>
                        <li><a href='index.html'>Ana Sayfa</a></li>
                        <li><a href='hakkimizda.html'>Hakkımızda</a></li>
                        <li><a href='urunler.html'>Ürünler</a></li>
                        <li><a href='iletisim.html'>İletişim</a></li>
                        <a class='hero-btn lgn' href='login.html'>$kullanici</a>
                    </ul>
                </div>
                <i class='fa fa-bars' onclick='showMenu()' aria-hidden='true'></i>
            </nav>
            <h1 style='font-size : 50px;'>$kullanici</h1>
        </section>
    
        <section class='contact-us'>
        <div class='row'>
            <div class='contact-col'>
                <h1>Hoşgeldiniz $kullanici</h1>
                <p class='echo'>Sayın $kullanici cafemizi daha iyi tanımak için sayfamıza bir göz atın.<br>
                Bizler hakkında şikeyet ve dilekleriniz için <a class='echolnk' href='iletisim.html'>İletişim</a> sayfasında<br>
                bizlere geri dönüş yapabilirsiniz. Aynı zamanda cafemizin tanıtımı olan siteyi daha iyi incelemek
                için <a class='echolnk' href='index.html'>Ana Sayfa</a>'yı ziyaret edeblirsiniz.<br>
                Siz değerli müşterilerimize sunduğumuz en taze ve en kaliteli ürünleri incelemek için de
                <a class='echolnk' href='urunler.html'>Ürünler</a> sayfamızı ziyaret edebilirsiniz. Sadettin Cafe<br>
                olarak bizleri ziyaret edip tercih ettiğiniz için teşekkür ederiz.</p>
                <a class='hero-btn echo' href='urunler.html'>Göz At</a>
            </div>
            <div class='contact-col'>
                <img src='images/echo.png' alt=''>
            </div>
        </div>
        </section>
    
        <section class='footer'>
            <h4>Sadettin Cafe</h4>
            <p>Sadettin Cafe olarak siz değerli müşterilerimize en iyi şekilde en kaliteli hizmeti sunmayı verdiğimiz
                 <br>ürünlerin kalitesini en yüksekte tutmayı kendimize misyon edinmekten gurur duyuyoruz.
            </p>
            <div class='icons'>
                <i class='fa fa-facebook'></i>
                <i class='fa fa-twitter'></i>
                <i class='fa fa-instagram'></i>
                <i class='fa fa-linkedin'></i>
            </div>
            <p> Copyright © 2024 Sadettin Cafe</p>
        </section>
    
        <script>
            var navLinks = document.getElementById('navLinks');
            function showMenu(){
                navLinks.style.right = '0';
            }
            function hideMenu(){
                navLinks.style.right = '-250px';
            }
        </script>
    </body>
    </html>";
   }
   else
   {
        echo"<script> alert('Kullanıcı adı veya şifre hatalı');</script>";
   }
   ?>