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
    <title>Šta se nudi - Podrška</title>
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
    <div id='support' class="content">
        <div>
             <h1>Šta se nudi - Podrška</h1>
             <h2>Mi smo tu za vas!</h2><br>
        </div>
        <div>
            <h3>Dajte nam sugestiju:</h3><br>
            <ul style="list-style: disc;">
                <a href="support-form.php"><li>Utisci o radu i izgledu sajta</li></a>
                <a href="support-form.php"><li>Predlog za novo mesto/grad</li></a>
                <a href="support-form.php"><li>Predlog za novu kategoriju</li></a>
                <a href="support-form.php"><li>Predlog za poboljšanje</li></a>
            </ul><br><br>

            <h3>Prijavite problem:</h3><br>
            <ul style="list-style: disc;">
                <a href="support-form.php"><li>Greška na sajtu</li></a>
                <a href="support-form.php"><li>Problem</li></a>
                <a href="support-form.php"><li>Žalba na korisnika</li></a>
            </ul><br><br>
            
            <h3>Ostalo:</h3><br>
            <ul style="list-style: disc;">
                <a href="support-form.php"><li>Komentar</li></a>
                <a href="support-form.php"><li>Pitanje</li></a>
                <a href="support-form.php"><li>Pohvala</li></a>
             </ul><br><br>           
        </div>
    </div>
    <div id='footer'>
        <a href="support-form.php">Kontakt</a>
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