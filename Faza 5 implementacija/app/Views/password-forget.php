<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Dusan">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href="img/sta_se_nudi_ico.ico" rel="shortcut icon" type="image/x-icon"/>
    <title>Šta se nudi - Zaboravljena lozinka</title>  
    <script src="../js/java.js"></script>  
</head>
<body onload="loading2()">
    <div id='header'>
        <table width="100%" style="table-layout: fixed;">
            <tr>
                <td align="left"><a href="Home"><img src="img/logoMali.png" width=80px height=80px alt="Logo"/></a></td>
                <td align="center" id="header-caption"><h1><a href="Home">Šta se nudi</a></h1></td>
                <td align="right">
                    <a href="SignIn"><button class="btn btn-success" type="button">&nbsp; Uloguj se &nbsp;</button></a>
                    <a href="Register"><button class="btn btn-danger" type="button">Registruj se</button></a>&nbsp;
                </td>
            </tr>
        </table>     
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
    <div id="password-forget" class="content"> 
        <table>
            <tr>
                <td colspan="2" align="center">
                    <h2>Resetovanje zaboravljene lozinke</h2><br>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>Unesite e-mail adresu Vašeg naloga na koju će Vam biti prosleđen link ka formi za resetovanje lozinke.</p>
                </td>
            </tr>
            <tr>
                <td class="password-forget-td" align="right">
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    E-mail
                </td>
                <td class="password-forget-td" align="center">
                    <br>
                    <input id="email" type="email" size="50%" placeholder="Unesite e-mail">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                    <br>
                    <input type="button" onclick="reset()" class="btn btn-success" value="Pošalji" name="Pošalji">&nbsp;
                    <input type="button" class="btn btn-secondary" value="Nazad" name="Nazad">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="alert" class="alert alert-danger alert-dismissable">
                    <!--<button class="close" data-dismiss="alert">&times;</button>-->
                    Neka polja nisu ispravno popunjena ili su prazna. Pokušajte ponovo.
                </div>
                </td>
            </tr>
        </table>
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