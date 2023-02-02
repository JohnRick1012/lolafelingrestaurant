<?php

session_start();

//between function.. elenxei an oi xaraktires einai mesa sta oria p thetoume
function between($val, $x, $y){
    $val_len = strlen($val);
    return ($val_len >= $x && $val_len <= $y)?TRUE:FALSE;
}

if(isset($_POST['reserv-submit'])) {//elenxw an exei bei sti selida mesw tou submit

require 'dbh.inc.php';

    $user= $_SESSION['user_id'];
    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $email= $_POST['email'];
    $date= $_POST['date'];
    $time= $_POST['time'];
    $guests= $_POST['num_guests'];
    $addons= $_POST['addons'];
    $package= $_POST['package'];
    $tele = $_POST['tele'];
    $comments = $_POST['comments'];
    $imageUrl = $_POST['imageUrl'];
    
    
    if(empty($fname) || empty($lname) || empty($email) || empty($date) || empty($time) || empty($guests) || empty($package) || empty($tele)) {
        header("Location: ../reservation.php?error3=emptyfields");
        exit();
    }
        else if(!preg_match("/^[a-zA-Z ]*$/", $fname) || !between($fname,2,20)) {
        header("Location: ../reservation.php?error3=invalidfname");
        exit();
    }
        else if(!preg_match("/^[a-zA-Z ]*$/", $lname) || !between($lname,2,40)) {
        header("Location: ../reservation.php?error3=invalidlname");
        exit();
    }
        else if(!preg_match("/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i", $email) || !between($email,2,40)) {
        header("Location: ../reservation.php?error3=invalidlname");
        exit();
    }
        else if(!preg_match("/^[0-9]*$/", $guests) || !between($guests,1,100)) {
        header("Location: ../reservation.php?error3=invalidguests");
        exit();
    }
        else if(!preg_match("/^[a-zA-Z ]*$/", $package)) {
        header("Location: ../reservation.php?error3=invalidpackage");
        exit();
    }

        else if(!preg_match("/^[a-zA-Z0-9]*$/", $tele) || !between($tele,6,20)) {
        header("Location: ../reservation.php?error3=invalidtele");
        exit();
    }    
        else if(!preg_match("/^[a-zA-Z 0-9]*$/", $comments) || !between($comments,0,200)) {
        header("Location: ../reservation.php?error3=invalidcomment");
        exit();
    }
    else {

        $sql ="SELECT * FROM reservation WHERE rdate = '$date'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            header("Location: ../reservation.php?error3=dateAvailable");
            exit();
        } else{
            //checkarw ta available trapezia ana mera   
               
               
           //elenxos trapeziwn ews 20 trapezia gia kathe imerominia
       
               
                 
               
           
                $sql = "INSERT INTO reservation(f_name, l_name, email, num_guests, addons, package, rdate, reservation_time, telephone, comment, image_url, user_fk) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                   $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql)){
                           header("Location: ../reservation.php?error3=sqlerror1");
                           exit();
                       } else {       
                           mysqli_stmt_bind_param($stmt, "ssssssssssss", $fname, $lname, $email, $guests, $addons, $package, $date, $time, $tele, $comments, $imageUrl, $user);
                           mysqli_stmt_execute($stmt);
                           header("Location: ../reservation.php?reservation=success");
                           exit();
                       }
               }

    }
    
   mysqli_stmt_close($stmt);
   mysqli_close($conn);
}
    


