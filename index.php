<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Anton">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.css" type="text/css" media="screen" />
    <link href="formularz.css" rel="stylesheet"/>
    <link rel="icon" href="https://image.flaticon.com/icons/png/512/763/763812.png"/>
    <title>MMFit - strona treningowa</title>

    <style>
    .container {
        width:100vw;
        height:auto;
        background: rgb(104,180,222);
        background: linear-gradient(0deg, rgba(104,180,222,1) 72%, rgba(253,187,45,0) 100%);
        border-radius:5vw 5vw;
        padding:2.5vw;
    }

    </style>
</head>
<body>

<div class="background1"  style="overflow:hidden">

<div class="container-fluid navContainer align-items-center">
      <div class="row headerRow d-flex justify-content-center align-items-center">
            <div class="col-auto">
                  <a class="logo align-text-center justify-text-center" style="text-decoration:none;" href="../index.php">MMFit</a>
            </div>
      </div>
</div>



<div class="spacer300"></div>
    
    
<div class="container">
    <div class="row d-flex justify-content-center justify-text-center">
        <div class="col-10">
            <h1 class="text-break text-center" style="text-decoration: none;" >Witaj na stronie treningowej</h1>
        </div>
    </div>
    <div class="row d-flex justify-content-center justify-text-center">
        <div class="col-10">
            <p class="fs-4 text-center">Nasza strona zajmuje się archiwizowaniem treningów i codziennych wyzwań kroków.
            Zapraszmy do stworzenia konta oraz korzystanie z tej wspaniałej strony.</p>
        </div>    
    </div>
    <div class="white_line"></div>
    <div class="spacer100"></div>
    <div class="row d-flex justify-content-center">
        <div class="col cardcol">     
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Rejestracja</h5>
                    <p class="card-text">Klikając w poniższy przycisk możesz utworzyć swoje konto na portalu treningowym.</p>
                    <a class="btn log-btn" href="registration.php" role="button">Rejestracja</a>
                </div>
            </div>
        </div>
        <div class="col cardcol">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Logowanie</h5>
                    <p class="card-text">Jeżeli już posiadasz konto klikając w ten przycisk możesz się zalogować.</p>
                    <a class="btn log-btn" href="login.php" role="button">Logowanie</a>
                </div>
            </div>
        </div>
    </div>
    </div>
<div class="spacer300"></div>
</div>
</body>
</html>