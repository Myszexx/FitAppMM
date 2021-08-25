<?php

 session_start();
 
 if(!isset($_SESSION['logged'])) {
 
  header('Location: login.php');
  
  exit;
  
 }
 
 $jest = false;
 $more = false;
 $id = $_SESSION['user_id'];
 $conn = new mysqli("localhost","root","0vIGVk1lw3qv", "mmfit");
 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
 $sql = "SELECT fname, lname FROM settings WHERE users_id='$id'";
 $result = $conn->query($sql);


 if ($result->num_rows > 0) {
  $jest = true;
  while($row = $result->fetch_assoc()) {
    $fname = $row["fname"];
    $lname = $row["lname"];
  }


}

 $train = "SELECT filePath, fileExt FROM tranings WHERE users_id='$id' ORDER BY 'updated_at'";
$rezult = $conn->query($train);

$paths = [];
$exts = [];
 if ($rezult->num_rows > 0){
 if ($rezult->num_rows > 3) {$more = true;} 
  while($ruw = $rezult->fetch_assoc()) {
    array_push($paths, $ruw["filePath"]);
    array_push($exts, $ruw["fileExt"]);

  } 
 
} 
 print_r( $paths); 
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <title>MMFit</title>
<style>

body {

background-color:green;
background-image:none;
margin: 0;
}

.profile_img {

height:200px;
width:200px;
border:20px solid white;
box-shadow: 5px 5px 12px -1px rgba(0,0,0,0.8);

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

  width:100%;
  height:100px;
  left: 0;

}

.spacer50 {

  width:100%;
  height:50px;
}

.kolo {
  width:30vw;
  height:30vw;

}


</style>
 </head>
 <body>
  
<div class="header"></div>
<div class="logo">MMFit</div>
<div class="spacer100"></div>


<div class="container">
  
  <div class="spacer100"></div>
  <div class="row">
    <div class="col">
      <img src="../img/user.png" class="mx-auto d-block profile_img rounded-circle" alt="">
    </div>
  </div>
  <div class="row">
    <div class="col">
      <p class="text-center profile_name"><?php if($jest == true){echo $fname . " " . $lname;}else echo $_SESSION['username'];  ?></p>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-8 white_line"></div>
  </div>
  <div class="spacer100"></div>
  <div class="row">
    <div class="col-3 d-flex justify-content-center align-self-center ">
      <a class="btn log-btn" href="settings.php" role="button">
        <img class="img_size" src="../img/engineering.png">
        <p class="button_text ">Ustawienia</p>   
      </a>
      
    </div>
    <div class="col d-flex justify-content-center">
        <div class="kolo d-flex justify-content-center align-content-center">
          
          <canvas id="myChart" width="30vw" height="30vw"></canvas>

        </div>
    </div>
    <div class="col-3 d-flex justify-content-center align-self-center ">
      <a class="btn log-btn" href="challenges.php" role="button">
        <img class="img_size" src="../img/graph-bar.png">
        <p class="button_text "> Import </p>
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

<script>

var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type:'doughnut',
    data: {
        datasets:[{
            data:[80,20],
            backgroundColor:[
              'rgb(54, 162, 235)'
            ],
            hoverOffset:4,
            borderWidth:0
        }]
    }
});

</script>


 </body>
</html>