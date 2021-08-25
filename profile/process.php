<?php

 session_start();
 
 if(!isset($_SESSION['logged'])) {
 
  header('Location: ../login.php');
  
  exit;
  
 }
$useid = $_SESSION['user_id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['files'])) {
        $errors = [];
    require_once '../config.php';
$path = 'uploads/tranings/'.$_SESSION['username'].'/';
$extensions = ['gpx', 'tcx', 'json'];

if (!file_exists($path)) {
    mkdir($path, 0777, true);
    echo 'nie bylo, tera jes';
}
$conn = new mysqli("localhost","root","0vIGVk1lw3qv", "mmfit");
$stmt = $conn->prepare("INSERT INTO tranings (users_id, filePath, fileExt) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $users_id, $filePath, $fileExr);



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    $errors[] = 'MYSQL CON ERROR ';
    echo "Burwa";
  }

        $all_files = count($_FILES['files']['tmp_name']);

        for ($i = 0; $i < $all_files; $i++) {
            $is_on == false;

            $file_name = $_FILES['files']['name'][$i];
            $file_tmp = $_FILES['files']['tmp_name'][$i];
            $file_type = $_FILES['files']['type'][$i];
            $file_size = $_FILES['files']['size'][$i];
            $file_name = preg_replace('/\s+/', '_', $file_name);
            $file_ext = strtolower(end(explode('.', $_FILES['files']['name'][$i])));

            $file = $path . $file_name;

            if (!in_array($file_ext, $extensions)) {
                $errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
            }

            if ($file_size > 2097152) {
                $errors[] = 'File size exceeds limit: ' . $file_name . ' ' . $file_type;
            }

            if (empty($errors)) {
                    $sql = "SELECT id FROM tranings WHERE filePath='$file' AND users_id='$useid'";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) != 0){
                        $is_on = true;
                    }
                    $users_id = $useid;
                    $filePath = $file;
                    $fileExr = $file_ext;
                    if($is_on == false){
                    $stmt->execute();
                    move_uploaded_file($file_tmp, $file);}
                    else {
                        echo "Plik".$file_name."istnieje juz na serwerze";
                    }

 
            }
        }

        if ($errors) print_r($errors);
    }
}
