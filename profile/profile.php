<?php

 session_start();
 
 if(!isset($_SESSION['logged'])) {
 
  header('Location: login.php');
  
  exit;
  
 }

 $jest = false;
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
  }}
  $szkl = "SELECT imge FROM settings WHERE users_id='$id'";
  $result = $conn->query($szkl);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $filePath = $row["imge"];
    }

}

  

 $train = "SELECT filePath, fileExt FROM tranings WHERE users_id='$id' ORDER BY id DESC ";
$rezult = $conn->query($train);

$paths = [];
$exts = [];
$names = [];
 if ($rezult->num_rows > 0){
  while($ruw = $rezult->fetch_assoc()) {
    array_push($paths, $ruw["filePath"]);
    array_push($exts, $ruw["fileExt"]);
    list($upload, $trainings, $usernamee, $filename) = explode("/", $ruw["filePath"]);
    array_push($names, $filename);
  } 
 
} 
?>


<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8" />
 <?php for($r = 0; $r < 3; $r++){
   echo "<script type='text/javascript' src=". $paths[$r] ."></script>";
 }  ?>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Barlow&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link href="../formularz.css" rel="stylesheet"/>
  <link rel="icon" href="../img/running.png"/>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  
  <title>MMFit - strona treningowa</title>
<style>



body {

margin: 0;
}

.profile_img {

height:200px;
width:200px;
border:20px solid white;
box-shadow: 5px 5px 12px -1px rgba(0,0,0,0.8);

}

.container {
  width:100vw;
  background: rgb(104,180,222);
  background: linear-gradient(0deg, rgba(104,180,222,1) 72%, rgba(253,187,45,0) 100%);
  border-radius:5vw 5vw;
  padding:2vw;
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
.kolo a{
display: block;
width: 100%;
height: 100%;
z-index: 100;
}


.przycisk {
  background: linear-gradient(282.89deg, #8BEE68 -10.78%, rgba(139, 238, 104, 0) 126.32%);
  filter: drop-shadow(8px 8px 4px rgba(0, 0, 0, 0.50));
  border-radius: 20px;
  padding:1vw;
  margin: 20px;
  border: none;
  justify-content: center;
}

.tabela {

  width:auto;
  margin:0;
  font-family: Barlow;
  font-weight: bold;
}

.rows {
  background-color: rgb(104,180,222);
  border-radius:4vw;
  width: 60vw;
  box-shadow: 8px 8px 26px -3px rgba(0,0,0,0.83);
  padding:1vw;
  display: none;
}


</style>
 </head>
 <body onload="load()">
  
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
  
  <div class="spacer100"></div>
  <div class="row">
    <div class="col">
      <img src="<?php if($jest == true){echo $filePath;}else echo 'uploads/profiles/user.png'?>" class="mx-auto d-block profile_img rounded-circle" alt="">
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-auto">
      <p class="text-center text-break profile_name" style="font-size:40px;" ><?php if($jest == true){echo $fname . " " . $lname;}else echo $_SESSION['username'];  ?></p>
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
          <a href="https://bakoma-men.pl/"><img src="../img/reklama.png" alt="reklama" width="100%" height="100%"></a>
        </div>
    </div>
    <div class="col-3 d-flex justify-content-center align-self-center ">
      <a class="btn log-btn" href="upload.php" role="button">
        <img class="img_size" src="../img/graph-bar.png">
        <p class="button_text ">Importuj</p>
      </a>
      
    </div>
  </div>
  <div class="spacer100"></div>
  <div class="row justify-content-center">
    <div class="col-8 white_line"></div>
  </div>
  <div class="spacer50"></div>
  <div class="row d-flex justify-content-center">
    <div class="col-auto">
        <p class="text-center text-break profile_name" style="font-size:40px;">Historia treningów</p>
    </div>
  </div>


  <div class="tabela" id="trainings">
    <div class='rows row  justify-content-center' id='1' style="display: none;">
      <div id="1a" class="col Col_trening">1</div>
      <div id="1b" class="col Col_trening">2</div>
      <div id="1c" class="col Col_trening">3</div>
      <div id="1h" class="col Col_trening"><form action="detalis.php" method="POST"><input type="text" value="<?php echo $paths[0]; ?>" name="link" hidden><input class="btn przycisk" type="submit" value="Szczegóły" name="Szczegoly"></form></div>
       
    
    </div><br>
    <div class='rows row  justify-content-center' id='2' style="display: none;">
      <div id="2a" class="col Col_trening">1</div>
      <div id="2b" class="col Col_trening">2</div>
      <div id="2c" class="col Col_trening">3</div>
      <div id="2h" class="col Col_trening"><form action="detalis.php" method="POST"><input type="text" value="<?php echo $paths[1]; ?>" name="link" hidden><input class="btn przycisk" type="submit" value="Szczegóły" name="Szczegoly"></form></div>
      
    
    </div><br>
    <div class='rows row  justify-content-center' id='3' style="display: none;" >
      <div id="3a" class="col Col_trening">1</div>
      <div id="3b" class="col Col_trening">2</div>
      <div id="3c" class="col Col_trening">3</div>
      <div id="3h" class="col Col_trening"><form action="detalis.php" method="POST"><input type="text" value="<?php echo $paths[2]; ?>" name="link" hidden><input class="btn przycisk" type="submit" value="Szczegóły" name="Szczegoly"></form></div>
    </div>
  </div>


<div class="spacer50"></div>

<div id="dom-target1" style="display: none;">
    <?php

        echo htmlspecialchars($paths[0]); 
    ?>
</div>
<div id="dom-target2" style="display: none;">
    <?php

        echo htmlspecialchars($paths[1]); 
                                           
    ?>
</div>
<div id="dom-target3" style="display: none;">
    <?php

        echo htmlspecialchars($paths[2]); 
    ?>
</div>

</div>
<script>
  const loadtraining = async url => {
  const responde = await fetch(url);
  const training  = await responde.json();
  return training[2]
}

function training(data, num) {
  let temp;
  let date;
  let datarray = [];
  let speed_avg_kmh;
  let time;
  let sport;
  let created_date;
  let duration_s;
  let distance_km;
  let avg;
  let heart_rate_avg_bpm;
  for(let o = 0; o < data.length; o++){
      console.log(data[o])
      let temp = JSON.stringify(data[o])
      temp = temp.replace("{",'').replace("}",'').replace(/"/g,'')
      let arr = temp.split(/:/, 2);
      datarray.push(arr) }
    
     for(let a = 0; a < datarray.length; a++){
      if(datarray[a][0] == "sport"){
         sport = a
        console.log('sport')
      }
      else if(datarray[a][0] == "created_date"){
         created_date = a
        console.log('created_date')
      }
      else if(datarray[a][0] == "duration_s"){
        duration_s = a
        console.log('duration_s')
      }
      else if(datarray[a][0] == "distance_km"){
         distance_km = a
        console.log('distance_km')
      }
      else if(datarray[a][0] == "speed_avg_kmh"){
         speed_avg_kmh = a
        console.log('speed_avg_kmh')
      }
      else if (datarray[a][0] == 'heart_rate_avg_bpm'){
        heart_rate_avg_bpm = a
        console.log('heart_rate_avg_bpm')
      }
    } 
    temp = Number(datarray[duration_s][1])
    if(temp >= 60 && temp < 3600){
      time = Math.floor(temp/60)+" min "+temp%60+ ' s'
      time.concat(temp%60, ' s')
    }
    else if(temp < 60){
      time = temp + ' s'
    }
    else if(temp >= 3600){
      time = Math.floor(temp/3600)+" h "+Math.floor((temp%3600)/60)+ " min "+ temp%60+ ' s'
    }
    temp = datarray[created_date][1]
    date = temp.substring(0,11)
    console.log(date)
    avg = Number(datarray[speed_avg_kmh][1])
    var div = document.createElement('div');
    div.appendChild(document.createTextNode('traning'));
    let icon
    switch (datarray[sport][1]){
      case "RUNNING": 
        icon = '../img/sports/running-man.png'
        break
      case "SWIMMING":
        icon = '../img/sports/swimming.png'
        break
      case "CYCLING_TRANSPORTATION":
        icon = '../img/sports/cycling.png'
        break
      case "WALKING":
        icon = '../img/sports/walk.png'
        break
      case "HIKING":
        icon = '../img/sports/walk.png'
        break
      case "ROWING":
        icon = '../img/sports/rowing.png'
        break
      default:
      icon = '../img/sports/other.png'

    }
    document.getElementById(num+'a').innerHTML = "<img src="+ icon +" class='minicon' style=' height: 50px;' style=' width: auto: 50px;'>"
    document.getElementById(num+'b').innerHTML = 'Data: ' + date;
    document.getElementById(num+'c').innerHTML = 'Czas trwania: ' + time;
    div.className = 'container training';
    console.log(time)
if(typeof time != undefined){
    console.log('grid')
    document.getElementById(num).style.display = "grid";
    document.getElementById(num).classList.add("d-flex");

  }}




function load(){
  
    let json2;
    let json3;
    let json1

    var div1 = document.getElementById("dom-target1");
    var myData1 = div1.textContent;
  if(myData1.length > 0){
    try {

    const myRequest = new Request(myData1);
fetch(myRequest)
  .then(response => response.json())
  .then(data => {
 
    training(data, 1)



  })
} catch (error) {
  console.error(error);}
}

  
  var div2 = document.getElementById("dom-target2");
    var myData2 = div2.textContent;
    if(myData2.length > 0){
try {

    const myRequest = new Request(myData2); 
fetch(myRequest)
  .then(response => response.json())
  .then(data => {

    training(data, 2)
  })
} catch (error) {
  console.error(error);}}

  var div3 = document.getElementById("dom-target3");
    var myData3 = div3.textContent;
    if(myData3.length > 0){
  try {

    const myRequest = new Request(myData3);
fetch(myRequest)
  .then(response => response.json())
  .then(data => {

    training(data, 3)



  })
} catch (error) {
  console.error(error);}}



}

</script>


 </body>
</html>