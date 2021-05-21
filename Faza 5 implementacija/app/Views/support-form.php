<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Lazar">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='../css/style.css'> </link>
    <link href="../img/sta_se_nudi_ico.ico" rel="shortcut icon" type="image/x-icon"/>
    <title>Šta se nudi - Podrška (forma)</title>
</head>
<body>

    </div>
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
                    <input type="text" size="55" placeholder="Pretraži oglase..."> 
                    <button class="btn-dark" type="button" style="padding: 2px;">Pretraži</button>
                </td>
                <td align="right">
                    <a href="announcements.html">Obaveštenja</a>
                    &nbsp;
                </td>
            </tr>
        </table>        
    </div>
    <div id='support' class="content">
        <h2>Pomozite nam da poboljšamo Šta se nudi?</h2><br><br>
        <?php if(isset($poruka)) echo "<font color='red'>$poruka</font><br>"; ?>&nbsp; <br>
        <form action="<?= site_url("SlanjePoruke/posalji") ?>" method="POST">
            <table>
                <tr>
                    <td colspan="2" style="text-align: center;"><b>Unesite tekst komentara/pitanje:</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <textarea name="msg" rows="10" cols="80"></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="left">
                        <input type="file" multiple accept="image/*">
                    </td>
                    <td align="right">                        
                        <input type="submit" class="btn btn-success" value="Pošalji">
                        <input type="reset" class="btn btn-secondary" value="Poništi">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div id='footer'>
        <a href="support-form.html">Kontakt</a>
        &nbsp;|&nbsp;
        <a href="">Uputstva</a>
        &nbsp;|&nbsp;
        <a href="">O nama</a>
        &nbsp;|&nbsp;
        <a href="">Pravila korišćenja</a>
        &nbsp;|&nbsp;
        <a href="support.html">Podrška</a>
    </div>
</body>
</html>