<?php


//delete reservation

if(isset($_POST['delete-submit'])) {

require 'dbh.inc.php';


 
 $reservation_id = $_POST['reserv_id'];
 
 $sql = "INSERT INTO reservation_backup SELECT * FROM reservation WHERE reserv_id =$reservation_id";
 $sql2 = "DELETE FROM reservation WHERE reserv_id =$reservation_id";
if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {

    header("Location: ../view_reservations.php?delete=success");
} else {
    header("Location: ../view_reservations.php?delete=error");
}
}



//delete tables


if(isset($_POST['delete-table'])) {
 
 require 'dbh.inc.php';
 
 $tables_id = $_POST['tables_id'];
    
 $sql = "DELETE FROM tables WHERE tables_id =$tables_id";
if (mysqli_query($conn, $sql)) {
    header("Location: ../view_tables.php?delete=success");
} else {
    header("Location: ../view_tables.php?delete=error");
}
}


if(isset($_POST['delete-menu'])) {
 
    require 'dbh.inc.php';
    
    $menu_id = $_POST['menu_id'];
       
    $sql = "DELETE FROM menu WHERE menu_id =$menu_id";
   if (mysqli_query($conn, $sql)) {
       header("Location: ../view_menu.php?delete=success");
   } else {
       header("Location: ../view_menu.php?delete=error");
   }
   }


mysqli_close($conn);
?>

    


