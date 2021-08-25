<?php

 session_start();
 
 if(!isset($_SESSION['logged'])) {
 
  header('Location: ../login.php');
  
  exit;

 }

 if(!isset($_POST['link'])) {
 
    header('Location: profile.php');
    
    exit;
  
   }


   $filePath = $_POST['link'];

 ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.css" type="text/css" media="screen" />
  <link href="../formularz.css" rel="stylesheet"/>
  <link rel="icon" href="https://image.flaticon.com/icons/png/512/763/763812.png"/>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <title>MMFit - strona treningowa</title>
  <style>
   html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }

  #mapa{
    height: 25vw;
    width: 25vw;
    background-color: white;
  }
  </style>
 </head>
 <body>
 <div class="background1">

 <div id="dom-target" style="display: none;">
    <?php

        echo htmlspecialchars($filePath); 
    ?>
</div>
 
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
  <div id='mapa'>MAPA</div>
  <?php   echo $_POST['link'];?>
<div id="lan" style="display: none;"></div>
<div id="lat" style="display: none;"></div>
<div class="container  justify-content-center">
    <div class='rows row  justify-content-center' id='1'>
      <div id="a" class="col d-flex justify-content-center align-items-center">1</div>
      <div id="b" class="col d-flex justify-content-center align-items-center">2</div>
      <div id="c" class="col d-flex justify-content-center align-items-center">3</div>
      <div id="d" class="col d-flex justify-content-center align-items-center">4</div>
      <div id="e" class="col d-flex justify-content-center align-items-center">5</div>
      <div id="f" class="col d-flex justify-content-center align-items-center">6</div>
      <div id="g" class="col d-flex justify-content-center align-items-center">7</div>
      <div id="h" class="col d-flex justify-content-center align-items-center">8</div>
      <div id="i" class="col d-flex justify-content-center align-items-center">9</div>
      <div id="j" class="col d-flex justify-content-center align-items-center">10</div>
       
    
    </div><br>


<div class="spacer300"></div>

</div>

</div>
<script>



function training(data) {
  let temp;
  let max
  let hmax = 0
  let havg = 0
  let date;
  let cal;
  let dys;
  let datarray = [];
  let speed_avg_kmh;
  let calories_kcal;
  let time;
  let sport;
  let created_date;
  let duration_s;
  let distance_km;
  let avg;
  let points;
  let heart_rate_avg_bpm;
  let heart_rate_max_bpm;
  let source;
  let sour;
  let lan = [];
  let lat = [];
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
        dys = Number(datarray[distance_km][1])
      }
      else if(datarray[a][0] == "calories_kcal"){
        calories_kcal = a
        console.log('calories_kcal')
        cal = Number(datarray[calories_kcal][1])
      }
      else if(datarray[a][0] == "speed_avg_kmh"){
         speed_avg_kmh = a
        console.log('speed_avg_kmh')
      }
      else if(datarray[a][0] == "speed_max_kmh"){
        speed_max_kmh = a
        console.log('speed_max_kmh')
      }
      else if (datarray[a][0] == 'heart_rate_avg_bpm'){
        heart_rate_avg_bpm = a
        console.log('heart_rate_avg_bpm')
         havg = Number(datarray[heart_rate_avg_bpm][1])
      }
      else if (datarray[a][0] == 'heart_rate_max_bpm'){
        heart_rate_max_bpm = a
        console.log('heart_rate_max_bpm')
        hmax = Number(datarray[heart_rate_max_bpm][1])
      }
      else if (datarray[a][0] == 'points'){
        points = a
        console.log('points')
      }
      else if (datarray[a][0] == 'points'){
        points = a
        console.log('points')
      }
      else if (datarray[a][0] == 'source'){
        source = a
        console.log('source')
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
max = Number(datarray[speed_max_kmh][1])



    console.log(datarray[points])
    console.log(data[points])
    console.log(data[points]['points'])
    console.log(data[points]['points'].length)

    for(let i = 0; i < data[points]['points'].length; i++){
        lat.push(Number(data[points]['points'][i][0]['location'][0][0]['latitude']))
        lan.push(Number(data[points]['points'][i][0]['location'][0][1]['longitude']))
        document.getElementById('lan').innerHTML = lan;
    document.getElementById('lat').innerHTML = lat;
      
    }
    console.log(lan)

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

    switch (datarray[source][1]){
      case "TRACK_SAMSUNG_GEAR":
        sour = 'Urządzeniu Samsung Gear'
        break
      case "TRACK_MOBILE":
        sour = 'Smartfonie'
        break
      default:
        sour = 'Inne'
        break
    }



    document.getElementById('a').innerHTML = "<img src="+ icon +" class='minicon' style=' height: 50px;' style=' width: auto: 50px;'>"
    document.getElementById('b').innerHTML = 'Czas trwania: ' + time;
    document.getElementById('c').innerHTML = 'Data: ' + date;
    document.getElementById('d').innerHTML = 'Maksymalna prędkość: ' + max.toFixed(1) + ' KPH';
    document.getElementById('e').innerHTML = 'Średnia prędkość: ' + avg.toFixed(1) + ' KPH';
    document.getElementById('f').innerHTML = 'Tętno średnie: ' + havg + ' BPM';
    document.getElementById('g').innerHTML = 'Tętno maksymalne: ' + hmax + ' BPM';
    document.getElementById('h').innerHTML = 'Dystans: ' + dys.toFixed(2) + ' KM';
    document.getElementById('i').innerHTML = 'Zarejestrowane na: ' + sour;
    document.getElementById('j').innerHTML = 'Spalone kalorie: ' + cal.toFixed(0) + ' CAL';
}

function initMap() {
  let lan = document.getElementById('lan').textContent
  console.log(lan)
  lan = lan.split(',')
  let lat = document.getElementById('lat').textContent
  lat = lat.split(',')
  console.log(lan)
  console.log(lan[0])
  console.log(parseFloat(lan[0]))
  let map = new google.maps.Map(document.getElementById("mapa"), {
    mapTypeId: "terrain",
    center: JSON.parse(JSON.stringify('{ lat: '+parseFloat(lan[0])+', lng: '+parseFloat(lat[0])+' }')),
    zoom: 8,
  });
  let flightPlanCoordinates = [];
  for(let y = 0; y > lan.length; y++){
    flightPlanCoordinates.push(JSON.parse(JSON.stringify(' { lat: '+lat[y]+' , lng: '+lan[y]+'  },')))
  }

  
 
  const flightPath = new google.maps.Polyline({
    path: flightPlanCoordinates,
    geodesic: true,
    strokeColor: "#FF0000",
    strokeOpacity: 1.0,
    strokeWeight: 2,
  });
  flightPath.setMap(map);
}






 var div = document.getElementById("dom-target");
    var myData = div.textContent;
    try {
    const myRequest = new Request(myData); 
fetch(myRequest)

  .then(response => response.json())
  .then(data => {training(data)})
} catch (error) {
  console.error(error);}
 
 
 </script>
 </body>

 
 <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbkln_K7P1IruJ5hPGECUF3q4LkP6xfDU&callback=initMap">
</script>
 </html>