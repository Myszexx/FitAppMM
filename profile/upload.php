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
    <link href="../formularz.css" rel="stylesheet"/>
    <link rel="icon" href="https://image.flaticon.com/icons/png/512/763/763812.png"/>
  
  <title>MMFit - strona treningowa</title>

  <style>
    .container {

      background: rgb(104,180,222);
      border-radius:2vw;
      padding:3vw;

    }

    .przycisk {

      padding:1vw;

    }

    .spacer2 {

      height:2vw;
    }

  </style>

  </head>
 <body>

 <div class="background1" style="height:100vh;">

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
    
  <div class="container d-flex justify-content-center align-content-center">
    <div class="row">
      <form method="post" enctype="multipart/form-data">
        <div class="row gy-3">
          <div class="col-auto">
            <label for="formFile" class="form-lable">Poniżej możesz przesłać swój trening</label>
            <input class="form-control" type="file" name="files[]" multiple />
          </div>
        </div>
        <div class="spacer2">
        </div>
        <div class="row d-flex justify-content-center">
          <div class="col-auto">
            <input class="btn log-btn przycisk" type="submit" value="Prześlij" name="submit" />
          </div>
        </div>
        
      </form>
    </div>
  </div>

</div>

<script>

  function alerty(respon){
    if(respon['status' == 200]){
      alert('Pliki zostały przekazane do przetworzenia')
    }
    else if(respon['status'] == 500){
      alert('Wystapił problem z połączeniem, spróbuj ponownie')
    }
  }
const url = 'process.php'
const form = document.querySelector('form')

form.addEventListener('submit', (e) => {
  e.preventDefault()

  const files = document.querySelector('[type=file]').files
  const formData = new FormData()

  for (let i = 0; i < files.length; i++) {
    let file = files[i]

    formData.append('files[]', file)
  }

  fetch(url, {
    method: 'POST',
    body: formData,
  }).then((response) => {
    alerty(response)
    
  })
})

</script>


 </body>