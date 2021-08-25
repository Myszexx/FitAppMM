<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php session_start();
$dbh = new PDO('mysql:host=localhost;dbname=mmfit', 'root', '0vIGVk1lw3qv');
mysqli_connect("localhost","root","0vIGVk1lw3qv", "mmfit") or die(mysqli_error($error)."Nie mozna polaczyc sie z baza danych. Prosze chwile odczekac i sprobowac ponownie.");
$conn = new mysqli("localhost","root","0vIGVk1lw3qv", "mmfit");
?>