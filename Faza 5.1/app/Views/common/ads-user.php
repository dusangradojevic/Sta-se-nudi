<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Aleksandra">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel='stylesheet' type = 'text/css' href='/assets/css/style.css'>
    <link href="/assets/img/sta_se_nudi_ico.ico" rel="shortcut icon" type="image/x-icon"/> 
    <title>Šta se nudi - Svi oglasi korisnika</title>
    <script src="/assets/js/java.js"></script>
</head>
<body onload="loading()">
    <div id='user-ads' class="content">
        <?php if ($userId != 'admin') { ?>
            <h1>Oglasi korisnika <?= $username ?>:</h1>
        <?php } ?>
        <?php if ($userId == 'admin') { ?>
            <h1>Neodobreni oglasi:</h1>
        <?php } ?>
        <br>
        <table id='userAds'>
        <?php
            foreach ($ads as $ad) {
                echo "<tr><td align='center'><h2>".anchor("$controller/getAd/{$ad->idO}", "$ad->title")."</h2></td></tr>";
                echo "<tr><td align='center'><p id='ad'>$ad->text</p></td></tr>";
                //echo "<tr><td align='right'><input onclick='deleteads()' class='btn btn-danger' type='button' value='Obriši oglas'>&nbsp;<input onclick='change()' class='btn btn-info' type='button' value='Izmeni'></td></tr>";
            }
        ?>
        </table>
        <br>
        <div id="inputads">
            <textarea id="ad1" cols="30" rows="10"></textarea><br>
            <button onclick="change2()" class="btn btn-success" type="button">Izmeni</button>
            <button type="button" class="btn btn-secondary" onclick="odbaci()">Odbaci</button>
        </div>
    </div>
</body>
</html>

<?php
/*
        if (!empty($searched)) {
            echo "<h4>Rezultati pretrage $searched:</h4>";
        }
        else {
            echo "<h1>Svi oglasi</h1>";
        }    
        foreach ($ads as $ad) {
            echo "<h2>".anchor("$controller/getAd/{$ad->IdO}", "$ad->title")."</h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p>$ad->text</p><br>";
        }*/
    ?>
