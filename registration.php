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
      height:510px;
      width:100vw;
      background: rgb(104,180,222);
      background: linear-gradient(0deg, rgba(104,180,222,1) 72%, rgba(253,187,45,0) 100%);
      border-radius:5vw 5vw;
      padding:2vw;
      z-index:2
    }



 </style>

</head>
<body class="register">

<div class="background1"  style="overflow:hidden">

<div class="container-fluid navContainer align-items-center">
      <div class="row headerRow d-flex justify-content-center align-items-center">
            <div class="col-auto">
                  <a class="logo align-text-center justify-text-center" style="text-decoration: none;" href="../index.php">MMFit</a>
            </div>
      </div>
</div>


<div class="spacer300"></div>




 <div class="container">
  <h1>Rejestracja</h1>
  <form action="" method="post">
   <div class="form-group">
    <p><label for="username">Nazwa użytkownika</label><input type="text" name="username" id="username" class="form-control" placeholder="Nazwa użytkownika" required /></p>
   </div>
   <div class="form-group">
    <p><label for="email">E-mail</label><input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required /></p>
   </div>
   <div class="form-group">
    <p><label for="password">Hasło</label><input type="password" name="password" id="password" class="form-control" placeholder="Hasło" required /></p>
   </div>
   <div class="form-group">
    <p><label for="repeated_password">Powtórz hasło</label><input type="password" name="repeated_password" id="repeated_password" class="form-control" placeholder="Powtórz hasło" required /></p>
   </div>
   <p><input type="submit" class="btn log-btn" value="Zarejestruj" /></p>
  </form>
 </div>

<div class="spacer300"></div>
</div>
</body>
</html>

<?php else: ?>

     <?php

     require 'config.php';
     require 'class.user.php';

     function validateRegistrationInput($username, $email, $password, $repeatedPassword) {
         if (empty($username) || empty($email) || empty($password) || empty($repeatedPassword)) {
             echo '<p>Wypełnij wszystkie pola, aby się zarejestrować.</p>';
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

         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             echo '<p>Podany adres e-mail jest nieprawidłowy.</p>';
             return false;
         }

         if (strlen($email) < 6) {
             echo '<p>E-mail jest zbyt krótki.</p>';
             return false;
         }

         if (strlen($email) > 30) {
             echo '<p>E-mail jest zbyt długi.</p>';
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

         if (!hash_equals($password, $repeatedPassword)) {
             echo '<p>Hasła się nie zgadzają.</p>';
             return false;
         }

         return true;
     }

     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $username = preg_replace('/[^\p{L}\p{N}]/iu', '', $_POST['username']);
         $email = $_POST['email'];
         $password = $_POST['password'];
         $repeatedPassword = $_POST['repeated_password'];
         $ip = filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP);

         if (!validateRegistrationInput($username, $email, $password, $repeatedPassword)) {
             return;
         }

         $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
         $user = new User($dbh);

         if ($user->user_exist($username, $email)) {
             echo '<p>Taki użytkownik już istnieje.</p>';
             return;
         }

         if ($user->insert_user($username, $email, $hashedPassword, $ip)) {
             echo '<p>Konto zostało założone.</p>';
             sleep(2);
             header('Location: login.php');
             exit;
         } else {
             echo '<p>Nie udało się zarejestrować.</p>';
         }
     }

     ?>


<?php endif; ?>