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
    $menuName= $_POST['name'];
    $menuPrice= $_POST['price'];
    $imageUrl = $_POST['imageUrl'];
    
    
    if(empty($menuName) || empty($menuPrice)) {
        header("Location: ../view_menu.php?error3=emptyfields");
        exit();
    }
        else if(!preg_match("/^[a-zA-Z ]*$/", $menuName) || !between($menuName,2,20)) {
        header("Location: ../view_menu.php?error3=invalidMenuname");
        exit();
    }
        else if(!preg_match("/^[a-zA-Z0-9 ]*$/", $menuPrice) || !between($menuPrice,2,40)) {
        header("Location: ../view_menu.php?error3=invalidlPrice");
        exit();
    }
    
    else{
     //checkarw ta available trapezia ana mera   
        
        
    //elenxos trapeziwn ews 20 trapezia gia kathe imerominia
          
        
    
         $sql = "INSERT INTO menu (menu_name, price, image_url) VALUES(?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
                 if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../view_menu.php?error3=sqlerror1");
                    exit();
                } else {       
                    mysqli_stmt_bind_param($stmt, "sss", $menuName, $menuPrice, $imageUrl);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../view_menu.php?menu=success");
                    exit();
                }
        }
    
    
   mysqli_stmt_close($stmt);
   mysqli_close($conn);
}
    


