<?php

session_start();

$file = $_FILES['imageUpload'];
$fileName = $_FILES['imageUpload']['name'];
$fileTmpName = $_FILES['imageUpload']['tmp_name'];
$fileSize = $_FILES['imageUpload']['size'];
$fileError = $_FILES['imageUpload']['error'];
$fileType = $_FILES['imageUpload']['type'];

$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('jpg', 'jpeg', 'png', 'pdf');

if(in_array($fileActualExt, $allowed)){
    if($fileError === 0){
        if($fileSize < 1000000){
            $fileNameNew = uniqid('', true).".".$fileActualExt;
            $fileDestination = 'uploads/'.$fileNameNew;
            $uploadDate = date("Y-m-d H:i:s");
            move_uploaded_file($fileTmpName, $fileDestination);

              // Insert image information into the database
              require 'includes/dbh.inc.php';
              $sql = "INSERT INTO images (image_path, image_name, upload_date) VALUES (?, ?, ?)";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                  echo "SQL statement failed!";
              } else {
                  mysqli_stmt_bind_param($stmt, "sss", $fileDestination, $fileNameNew, $uploadDate);
                  mysqli_stmt_execute($stmt);
                  
              }

        } else {
            echo "File size too large.";
        }
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "Invalid file type.";
}


$_SESSION['newFileName'] = $fileNameNew;

exit();

?>