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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.css" type="text/css" media="screen" />
  <link href="../formularz.css" rel="stylesheet"/>
  
  <title>MMFit</title>
<style>

body {

background-color:green;
background-image:none;
}

.profile_img {

height:200px;
width:200px;
border:20px solid white;

}

.container {
  width: 100vw;
}

.profile_name {

font-size:8vw;
color:black;

}

.white_line {

background-color:white;
height:3px;
border-radius:1px;

}

.img_size {

width:65%;
height:65%;

}

.button_text {

color:black;
font-size:3vw;

}

.log-btn {
  background: linear-gradient(282.89deg, #8BEE68 -10.78%, rgba(139, 238, 104, 0) 126.32%);
  filter: drop-shadow(8px 8px 4px rgba(0, 0, 0, 0.50));
  border-radius: 20px;
  width:25vw;
  margin: 20px;
  border: none;
  justify-content: center;
}

.spacer100 {

  width:100vw;
  height:100px;

}

.spacer50 {

  width:100vw;
  height:50px;
}

.kolo {


  width:30vw;
  height:30vw;
  background:grey;
}

</style>
 </head>
 <body>
  
<div class="header"></div>
<div class="logo">MMFit</div>
<div class="spacer100"></div>


<div class="container">
  <div class="row">
    <div class="col">
      <img src="../img/login_background.jpg" class="mx-auto d-block profile_img rounded-circle" alt="">
    </div>
  </div>
  <div class="row">
    <div class="col">
      <p class="text-center profile_name">Myszexx Myszkowski</p>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-8 white_line"></div>
  </div>
  <div class="spacer100"></div>
  <div class="row">
    <div class="col-3 d-flex justify-content-center align-self-center border ">
      <a class="btn log-btn" href="settings.php" role="button">
        <img class="img_size" src="../img/engineering.png">
        <p class="button_text ">Ustawienia</p>   
      </a>
      
    </div>
    <div class="col d-flex justify-content-center border ">
        <div class="kolo rounded-circle">
            
        </div>
    </div>
    <div class="col-3 d-flex justify-content-center align-self-center border ">
      <a class="btn log-btn" href="challenges.php" role="button">
        <img class="img_size" src="../img/graph-bar.png">
        <p class="button_text ">Wyzwania</p>
      </a>
      
    </div>
  </div>
  <div class="spacer100"></div>
  <div class="row justify-content-center">
    <div class="col-8 white_line"></div>
  </div>
  <div class="spacer50"></div>
  <div class="row">
    <div class="col">
        <p class="text-center profile_name">Historia treningów</p>
    </div>
  </div>
</div>




 </body>
</html>