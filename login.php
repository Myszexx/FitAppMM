<?php

 ini_set('display_errors', '1');
 
 error_reporting(E_ALL);
 
 if(!isset($_POST['username'])):
 
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
  <link href="formularz.css" rel="stylesheet"/>
  <link rel="icon" href="https://image.flaticon.com/icons/png/512/763/763812.png"/>
  
  <title>MMFit - strona treningowa</title>

  <style>

    .container {
      height:375px;
      width:100vw;
      background: rgb(104,180,222);
      background: linear-gradient(0deg, rgba(104,180,222,1) 72%, rgba(253,187,45,0) 100%);
      border-radius:5vw 5vw;
      padding:2vw;
    }

  </style>

 </head>
 <body>

 <div class="background1" style="overflow:hidden">

 <div class="container-fluid navContainer align-items-center">
      <div class="row headerRow d-flex justify-content-center align-items-center">
            <div class="col-auto">
                  <a class="logo align-text-center justify-text-center" style="text-decoration: none;" href="../index.php">MMFit</a>
            </div>
      </div>
</div>

<div class="spacer300"></div>




  <div class="container ">
   <h1>Zaloguj się</h1>
   <form action="" method="post">
    <div class="form-group">
     <p><label for="username">Nazwa użytkownika:</label><input type="text" name="username" id="username" class="form-control" placeholder="Nazwa użytkownika" required /></p>
    </div>
    <div class="form-group">
     <p><label for="password">Hasło:</label><input type="password" name="password" id="password" class="form-control" placeholder="Hasło" required /></p>
    </div>
    <p><input type="submit" class="btn log-btn" value="Zaloguj" /></p>
   </form>
  </div>
   <div class="spacer500"></div>


</div>
 </body>
</html>

<?php else: ?>

     <?php

     require 'config.php';
     require 'class.user.php';

     function validateInput($username, $password) {
         if (empty($username) || empty($password)) {
             echo '<p>Wypełnij wszystkie pola, aby się zalogować.</p>';
             return false;
         }

         if (strlen($username) < 3) {
             echo '<p>Nazwa użytkownika jest zbyt krótka.</p>';
             return false;
         }

         if (strlen($username) > 30) {
             echo '<p>Nazwa użytkownika jest zbyt długa.</p>';
             return false;
         }

         if (strlen($password) < 6) {
             echo '<p>Hasło jest zbyt krótkie.</p>';
             return false;
         }

         if (strlen($password) > 16) {
             echo '<p>Hasło jest zbyt długie.</p>';
             return false;
         }

         return true;
     }

     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $username = preg_replace('/[^\p{L}\p{N}]/iu', '', $_POST['username']);
         $password = $_POST['password'];

         if (!validateInput($username, $password)) {
             return;
         }

         $user = new User($dbh);

         if ($user->login($username, $password)) {
             session_start();

             $servername = "localhost";
             $usernamee = "root";
             $password = "0vIGVk1lw3qv";
             $dbname = "mmfit";

             $conn = mysqli_connect($servername, $usernamee, $password, $dbname);

             if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
             }

             $sql = "SELECT id FROM users WHERE username='" . mysqli_real_escape_string($conn, $username) . "'";
             $result = mysqli_query($conn, $sql);

             if ($result && mysqli_num_rows($result) > 0) {
                 $row = mysqli_fetch_assoc($result);
                 $users_id = $row["id"];
             } else {
                 echo '<p>Błąd podczas pobierania ID użytkownika.</p>';
                 return;
             }

             $_SESSION['logged'] = 1;
             $_SESSION['username'] = $username;
             $_SESSION['user_id'] = $users_id;

             header('Location: home.php');
             exit;
         } else {
             echo '<p>Błędne dane logowania.</p>';
         }
     }

     ?>


<?php endif; ?>