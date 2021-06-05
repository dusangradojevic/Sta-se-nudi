<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Dusan">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel='stylesheet' type = 'text/css' href='/assets/css/style.css'>
    <link href="/assets/img/sta_se_nudi_ico.ico" rel="shortcut icon" type="image/x-icon"/>  
    <script src="/assets/js/java.js"></script>
    <title>Šta se nudi - Zaboravljena lozinka</title> 
</head>
<body onload="loading2()">
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
</body>
</html>