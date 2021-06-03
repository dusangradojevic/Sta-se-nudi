<!DOCTYPE html>
<html lang="sr">
<head>
    <meta name="author" content="Dobrosav">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost:8080/css/style.css">
    <link href="http://localhost:8080/img/sta_se_nudi_ico.ico" rel="shortcut icon" type="image/x-icon"/>
    <title>Šta se nudi - Vasi oglasi</title>
</head>
<body>
      <div id='menu'>
        <table>
            <tr>
                <td align="left">
                    &nbsp;
                    <select id="menu-list">
                        <option selected>Sve kategorije</option>
                        <option>Kućni ljubimci</option>
                        <option>Odeća</option>
                        <option>Tehnologija</option>
                    </select>
                    <select id="menu-list">
                        <option selected>Svi tipovi</option>
                        <option>Razmena</option>
                        <option>Poklanjanje</option>
                    </select>
                    <select id="menu-list">
                        <option selected>Sve države</option>
                        <option >Srbija</option>
                        <option>Crna Gora</option>
                        <option>Makedonija</option>
                        <option >Bosna i Hercegovina</option>
                        <option>Hrvatska</option>
                    </select>                 
                </td>
                <td align="center" style="padding-top: 2px;">
                    <form method="POST" action="<?= site_url("Pretraga") ?>">
                        <input name="pretraga" type="text" size="55" placeholder="Pretraži oglase...">
                        <button class="btn-dark" type="submit" style="padding: 2px;">Pretraži</button>
                    </form>
                </td>
                <td align="right">
                    <a href="Announcements">Obaveštenja</a>
                    &nbsp;
                </td>
            </tr>
        </table>        
    </div>
    <div class="content" style="padding-top: 30px;">
        <br><br>
        <div class="row">
            <div class="col-sm-3">&nbsp;</div>
            <div class="col-sm-6"><h3>Vasi Oglasi</h3></div>
            <div class="col-sm-3">&nbsp;</div>
        </div>
        <?php
            foreach ($pets as $pet){
                echo "<div class='row'>";
                echo "<div class='col-sm-3'>&nbsp;</div>";
                echo "<div class='col-sm-6 border border-dark'><h5>{$pet->getTitle()}</h5> </br> {$pet->getText()}</br><img class='ad' src='{$pet->getImgurl()}'/> </div>";
                echo "<div class='col-sm-3'>".anchor("Profile/remove/{$pet->getIdo()}","Obrisi Oglas")." ".anchor("Profile/editRequest/{$pet->getIdo()}","Izmeni oglas")."</div></div>";
            }
        ?>
    </div>
   <div id='footer'>
        <a href="Support">Kontakt</a>
        &nbsp;|&nbsp;
        <a href="">Uputstva</a>
        &nbsp;|&nbsp;
        <a href="">O nama</a>
        &nbsp;|&nbsp;
        <a href="">Pravila korišćenja</a>
        &nbsp;|&nbsp;
        <a href="Support">Podrška</a>
    </div>
</body>
</html>