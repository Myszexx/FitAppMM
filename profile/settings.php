<?php

 session_start();
 
 if(!isset($_SESSION['logged'])) {
 
  header('Location: login.php');
  
  exit;
  
 }
 $id = $_SESSION['user_id'];
 $update = false;
 $nfname = $_POST['fname'];
 $nlname = $_POST['lname'];
 $nheight = $_POST['height'];
 $nweight = $_POST['weight'];
 $nactlvl = $_POST['actlvl'];


 $conn = new mysqli("localhost","root","0vIGVk1lw3qv", "mmfit");
 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
 $sql = "SELECT fname, lname, height, weights, actlvl FROM settings WHERE users_id='$id'";
 $result = $conn->query($sql);
 
 if ($result->num_rows > 0) {
$update = true;
 while($row = $result->fetch_assoc()){
  $fname = $row["fname"];
  $lname = $row['lname'] ;
  $height = $row['height'] ;
  $weight = $row['weights'] ;
  $actlvl = $row['actlvl'] ;
} 
 }

 $sql = "SELECT  imge FROM settings WHERE users_id='$id'";
 $result = $conn->query($sql);
 
 if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()){
  $filePath = $row['imge'];
} 
 }

 $stmt = $conn->prepare("UPDATE settings SET imge=? WHERE users_id=?");
 $stmt->bind_param("si", $pathes, $id);

 if(isset($_FILES['img'])){
   $path = 'uploads/profiles_pics/'.$_SESSION['username'].'/';
if (!file_exists($path)) {
   mkdir($path, 0777, true);
   echo 'nie bylo, tera jes';
}
$file_name = $_FILES['img']['name'];
$file_name = preg_replace('/\s+/', '_', $file_name);
   $file_tmp = $_FILES['img']['tmp_name'];
   $file = $path . $file_name;
   try{
     $pathes = $file;
     $id = $_SESSION['user_id'];
     $stmt->execute();
     move_uploaded_file($file_tmp, $file);
     header("Refresh:0");
   }
   catch (Exception $e) {
     $errors = 'Caught exception: '.  $e->getMessage(). "\n";

   }
   $stmt->close();
 }
 else{
   print_r($_FILES['img']);
   
 }



 if($update == false){
  $fname = '';
  $lname = '';
  $height = '';
  $weight = '';
  $stmt = $conn->prepare("INSERT INTO settings (users_id ,fname, lname, height, weights, actlvl) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("issiii", $id, $nfname, $nlname, $nheight, $nweight, $nactlvl);
 }

 elseif($update == true){
  $stmt = $conn->prepare("UPDATE settings SET fname=?, lname=?, height=?, weights=?, actlvl=? WHERE users_id=?");
  $stmt->bind_param("ssiiii", $nfname, $nlname, $nheight, $nweight, $nactlvl, $id);
} 

 if(sizeof($_POST)>4){
  $stmt->execute();
  header("Refresh:0");
  /*   if ($stmt->error) {
      echo "FAILURE!!! " . $stmt->error;  
      echo $id;
    }
    else echo "Updated {$stmt->affected_rows} rows" ; */
   } 

  $stmt->close();




  
 $_POST = array();
 $id = $_SESSION['user_id'];

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

  body {
    margin:0;
  }

  .container2 {

    background: rgb(104,180,222);
    background: radial-gradient(circle, rgba(104,180,222,1) 75%, rgba(252,70,107,0) 100%);
    padding:10px;
    width:50vw;
    border-radius:3vw;
  }

  .container1 {

    width:100vw;
  }

  .przycisk {

    width:150px;
    height:50px;
  }

  .spacer50 {

    width:100vw;
    height:450px;
  }

  .spacer2 {

    height:2vw;
  }

  .profile_img {

    height:15vw;
    width:15vw;
    border:2vw solid white;
    box-shadow: 5px 5px 12px -1px rgba(0,0,0,0.8);

  }

 </style>

  </head>
 <body>

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

  <div class="spacer50"></div>
  
<div class="container1 d-flex justify-content-center">
  <div class="container2 d-flex justify-content-center">
    <form method="post" enctype="multipart/form-data">
      <div class="row d-flex justify-content-center">
        <div class="col-auto">
          <img src="<?php echo $filePath;?>" class="mx-auto d-block profile_img rounded-circle" alt="">
        </div>
      </div>
      <div class="spacer2"></div>
      <div class="row">
        <div class="col-auto">
          <label for="formFile" class="form-lable">Poniżej możesz przesłać zdjęcie profilowe</label>
          <input class="form-control" type="file"  name="img" accept="image/png, image/jpeg">
        </div>  
      </div>
      <div class="spacer2"></div>
      <div class="row d-flex justify-content-center">  
        <input class="log-btn przycisk" type="submit" value="Zmień">
      </div>
    </form>
  </div>
</div>

<div class="container1 d-flex justify-content-center">
<div class='container2 d-flex justify-content-center align-content-center'>


 
 <form method="post">

  <div class="col-auto">
    <label for="fname" class="form-label">Imię:</label><input type="text" class="form-control" id="fname" name="fname" value="<?php echo htmlspecialchars($fname); ?>"/>
  </div>

  <div class="col-auto">
    <label for="lname" class="form-label">Nazwisko:</label><input type="text" class="form-control" id="lname" name="lname" value="<?php echo htmlspecialchars($lname); ?>"/>
  </div>

  <div class="col-auto">
    <label for="height" class="form-label">Wzrost:</label><input type="number" class="form-control"  id="height" name="height" min="100" max="250" value="<?php echo htmlspecialchars($height); ?>"/>
    
  </div>

  <div class="col-auto">
    <label for="weight" class="form-label">Waga:</label><input type="number" class="form-control"  id="weight" name="weight" min="35" max="250" value="<?php echo htmlspecialchars($weight); ?>"/>
  </div>

  <div class="col-auto">
    <label for="act" class="form-label">Podaj poziom aktywności:</label>
    <select id="act"  class="form-control" name="actlvl">
      <option value="1"  <?php if($actlvl == 1){echo 'selected';}else{} ?> >Brak aktywności</option>
      <option value="2"  <?php if($actlvl == 2){echo 'selected';}else{} ?> >Mało aktywności</option>
      <option value="3" <?php if($actlvl == 3){echo 'selected';}else{} ?> >Średnio aktywności</option>
      <option value="4" <?php if($actlvl == 4){echo 'selected';}else{} ?> >Dużo aktywności</option>
    </select></p>
  </div>
  <div class="spacer2"></div>
  <div class="row d-flex justify-content-center">
    <input class="log-btn przycisk" type="submit" value="Zapisz">  
  </div>
</form>

</div>
</div>

</div>
 </body>
 </html>