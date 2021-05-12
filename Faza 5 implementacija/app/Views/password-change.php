<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Lazar">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel='stylesheet' type = 'text/css' href='../css/style.css'>   
    <link href="../img/sta_se_nudi_ico.ico" rel="shortcut icon" type="image/x-icon"/>   
    <title>Šta se nudi - Promena lozinke</title>
</head>
<body>
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
    <div id='password-change' class="content">
        <h2>Promena lozinke naloga</h2><br><br>
        <form action="" method="">
            <table>
                <tr>
                    <td class="password-change-td">Stara lozinka*</td>
                    <td class="password-change-td"> <input type="password" size = "27%" placeholder="Unesite staru lozinku"></td>
                </tr>
                <tr>
                    <td class="password-change-td">Nova lozinka*</td>
                    <td class="password-change-td"> <input type="password" size = "27%" placeholder="Unesite novu lozinku"></td>
                </tr>
                <tr>
                    <td class="password-change-td">Potvrdite novu lozinku*</td>
                    <td class="password-change-td"> <input type="password" size = "27%" placeholder="Potvrdite novu lozinku"></td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        <br>
                        <input type="submit" class="btn btn-success" value="Potvrdi" name="Potvrdi">&nbsp;
                        <input type="reset" class="btn btn-secondary" value="Poništi" name="Nazad">
                    </td>
                </tr>
            </table>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-danger alert-dismissable">
                        <!--<button class="close" data-dismiss="alert">&times;</button>-->
                        Neka polja nisu ispravno popunjena ili su prazna. Pokušajte ponovo.
                    </div>
                </div>
            </div>
        </form>        
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