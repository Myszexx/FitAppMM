<?php

 session_start();
 
 if(!isset($_SESSION['logged'])) {
 
  header('Location: login.php');
  
  exit;
  
 }
 
?>

<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8" />
  <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Anton">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="icon" href="https://image.flaticon.com/icons/png/512/763/763812.png"/>
  <link href="formularz.css" rel="stylesheet"/>
  
  
  
  <title>MMFit - strona treningowa</title>

  <style>

      .container {

            width:100vw;
            background: rgb(104,180,222);
            background: linear-gradient(0deg, rgba(104,180,222,1) 72%, rgba(253,187,45,0) 100%);
            border-radius:5vw 5vw;
            padding:2vw;
      }
      .textSuper {

            font-size:35px;
            font-weight:bold;
      }
      .textRegular {

            font-size:25px;

      }

      .card-img-top {

            padding:0.5vw;
      }

  </style>
  
 </head>
 <body>

  <div>
  <?php
  
  if(isset($_SESSION['logged'])):

?>


<div class="background1">




<div class="container-fluid navContainer align-items-center">
      <div class="row headerRow d-flex justify-content-start align-items-center">
            <div class="col-auto d-flex justify-content-center align-items-center">
                  <a class="logo align-text-center justify-text-center" href="../home.php">MMFit</a>
            </div>
            <div class="col-auto">     
                  <div class="menuItem d-flex justify-content-center align-items-center">
                        <a class="btn log-btn" href="../profile/profile.php">Profil</a>
                  </div>
            </div>  
            <div class="col-auto">
                  <div class="menuItem d-flex justify-content-center align-items-center">
                        <a class="btn log-btn" href="../logout.php">Wyloguj się</a>
                  </div>
            </div>
      </div>
</div>


<div class="spacer300"></div>

<div class="container">
      <div class="row d-flex justify-content-center">
            <div class="col-auto"> 
                  <p class="textSuper text-break text-center"> Witaj ponownie <?php if($jest == true){echo $fname . " " . $lname;}else echo $_SESSION['username'];  ?></p>
            </div>
      </div>
      <div class="row d-flex justify-content-center"> 
            <div class="col-10">
                  <p class="textRegular text-center text-break">Poniżej znajdują się odnośniki do artykułów którę pozwolą na poszerzenie twojej wiedzy o sporcie i polepszenie swoich wyników.</p>
            </div>
      </div>
      <div class="white_line"></div>
      <div class="spacer100"></div>
      <div class="row d-flex justify-content-center">
            <div class="col cardcol">     
                  <div class="card" style="width: 18rem;">
                        <img src="img/home_backgroudn.jpg" class="card-img-top" alt="biegacz">
                        <div class="card-body">
                              <h5 class="card-title">Co daje bieganie?</h5>
                              <p class="card-text">W tym artykule dowiesz się jakie korzyści możesz czerpać z regularnego treningu biegackiego.</p>
                              <a href="https://treningbiegacza.pl/artykul/co-daje-bieganie-kompendium-wiedzy" class="btn log-btn">Dowiedz się więcej</a>
                        </div>
                  </div>
            </div>   
            <div class="col cardcol">   
                  <div class="card" style="width: 18rem;">
                        <img src="img/salad.jpg" class="card-img-top" alt="saładka">
                        <div class="card-body">
                              <h5 class="card-title">Odżywianie w sporcie</h5>
                              <p class="card-text">Jeżeli chcesz rozszerzać swoją wiedzę na temat poprawnego odżywiania zapraszamy cię serdecznie do zapoznania się z tymi artykułami.</p>
                              <a href="https://wiem-co-jem.pl/kategoria/dietetyka-sportowa/" class="btn log-btn">Dowiedz się więcej</a>
                        </div>
                  </div>
            </div>  
            <div class="col cardcol">    
                  <div class="card" style="width: 18rem;">
                        <img src="img/bike.jpg" class="card-img-top" alt="rower">
                        <div class="card-body">
                              <h5 class="card-title">Rowerem do pracy</h5>
                              <p class="card-text">W tym artykule poznasz 5 rad dla osób które chcą się zdecydować na dojazd do pracy na rowerze.</p>
                              <a href="https://jakosiagaccele.com/dojezdzanie-rowerem-do-pracy/" class="btn log-btn">Dowiedz się więcej</a>
                        </div>
                  </div>
            </div>       
      </div>
</div>

</div>


  <?php endif; ?>
  
 </body>
</html>