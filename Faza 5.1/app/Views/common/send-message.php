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
    <script src="/assets/js/java.js"></script>
    <title>Šta se nudi - Pošalji poruku</title>
</head>
<body>
    <div id='message' class="content">
            <img src="../img/defaultUserImage.png" alt="Slika korisnika" width=50px>
            <h1>Ime korisnika</h1>
            <br/><br/><br/>
            <form action="" method="">
                <textarea rows="10" cols="80"></textarea>
                <br/>
                <div id='message-buttons'>                
                    <input type="file" multiple accept="image/*" class='choose-file-messages'>
                    <input type="submit" class="btn btn-success" value="Pošalji">
                    <input type="reset" class="btn btn-secondary" value="Poništi">              
                </div>
            </form>            
    </div>
</body>
</html>