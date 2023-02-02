<?php
require 'includes/dbh.inc.php';

if (isset($_POST['edit-submit'])) {
    $menu_id = $_POST['menu_id'];
    $menu_name = $_POST['menu_name'];
    $price = $_POST['price'];

    $sql = "UPDATE menu SET menu_name = ?, price = ? WHERE menu_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed!";
    } else {
    mysqli_stmt_bind_param($stmt, "sdi", $menu_name, $price, $menu_id);
    mysqli_stmt_execute($stmt);
    }
    header("Location: ../menu.php?editsuccess");
    exit();
    }
    ?>