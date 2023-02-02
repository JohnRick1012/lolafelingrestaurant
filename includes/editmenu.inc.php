<?php

if(isset($_POST['save-changes'])) {//elenxw an exei bei sti selida mesw tou submit

require 'dbh.inc.php';

    $menu_id = $_POST['menu_id'];
    $name= $_POST['menu_name'];
    $price= $_POST['price'];
            //checkarw ta available trapezia ana mera   
               
               
           //elenxos trapeziwn ews 20 trapezia gia kathe imerominia
       
               
                 
               
           
                $sql = "UPDATE menu SET menu_name = '$name', price = '$price' WHERE menu_id = $menu_id";
                   $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql)){
                           header("Location: ../view_menu.php?error3=invalidEdit");
                           exit();
                       } else {       
                           mysqli_stmt_execute($stmt);
                           header("Location: ../view_menu.php?menu=editSuccess");
                           exit();
                       }
               

    
    
   mysqli_stmt_close($stmt);
   mysqli_close($conn);
}
    


