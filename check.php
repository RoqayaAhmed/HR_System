<?php

session_start();
require 'conn.php';
global $conn;

$loginDate = $_SESSION['date'];
$date1 = date('Y-m-d H:i:s');

$inseconds = strtotime($loginDate);
    $outseconds = strtotime($date1);
    $nf_seconds = $outseconds - $inseconds ;
    $nf_hours = $nf_seconds ;
    
    $query3 = "UPDATE `daily_login` SET nf_hours ='$nf_hours' WHERE id='$id' AND login_date='$loginDate'";
    $runquery3 = mysqli_query($conn,$query1);
    if($runquery3){
        header('location:admin.html');
}
?>