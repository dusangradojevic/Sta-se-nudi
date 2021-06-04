<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Aleksandra">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' type = 'text/css' href='/assets/css/style.css'>
    <link href="/assets/img/sta_se_nudi_ico.ico" rel="shortcut icon" type="image/x-icon"/>  
    <script src="/assets/js/java.js"></script>
    <title>Šta se nudi - Profil</title>
</head>
<body>
    <div id='user-profile' class="content">
        <img src="/assets/img/defaultUserImage.png" alt="Slika korisnika" width=30% float=left>
        <div id='user-info'>
            <h1> <?= $name." ".$surname  ?> </h1>
            <h2>Korisničko ime: <?= $username ?></h2>
            <h2>Država: <?= $country ?> </h2>
            <h2>Broj telefona: <?= $num ?> </h2>
            <h3>Član od <?= $date ?></h3>
            <h3>Ocena korisnika: <?= $rating?></h3>
            <?php 
                if ($userId != $userVisitId) 
                {   
                    $string = "$controller/sendMessage/$userId";
                    echo "<form method='POST' action='<?= site_url($string) ?>'>";
                    echo    "<button type='submit' class='btn btn-info' id='message-button'>Pošaljite poruku</button>";
                    echo "</form><br/>";
                    echo anchor("$controller/showUserAds/{$userId}", "Svi aktivni oglasi");
                    echo "<div>";
                    echo    '<span onmouseover="starmark(this)" onclick="result()" id="1one" style="font-size:40px;cursor:pointer;" class="fa fa-star checked"></span>';
                    echo    '<span onmouseover="starmark(this)" onclick="result()" id="2one" style="font-size:40px;cursor:pointer;" class="fa fa-star "></span>';
                    echo    '<span onmouseover="starmark(this)" onclick="result()" id="3one" style="font-size:40px;cursor:pointer;" class="fa fa-star "></span>';
                    echo    '<span onmouseover="starmark(this)" onclick="result()" id="4one" style="font-size:40px;cursor:pointer;" class="fa fa-star"></span>';
                    echo    '<span onmouseover="starmark(this)" onclick="result()" id="5one" style="font-size:40px;cursor:pointer;" class="fa fa-star"></span>';
                    echo    '<span id="rate">4.7</span>';
                    echo '</div>';
                }
                else
                {   
                    echo "<br>";
                    echo anchor("$controller/showUserAds/{$userId}", "Svi aktivni oglasi");
                    echo anchor("$controller/postAd", "Postavi oglas");
                    echo anchor("$controller/changePassword", "Promena lozinke");
                    echo anchor("$controller/accountDelete/", "Obriši nalog");
                }
            ?>
            
            
            <!--<a href="post-upload.html"></a>             
            <a href="password-change.html"></a>
            <a href="acc-delete.html"></a>-->
            
        </div>
    </div>
</body>
</html>