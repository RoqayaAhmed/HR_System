<?php


echo $id = $_GET['id'];

require 'conn.php';
global $conn;

$query = "DELETE FROM daily_login WHERE emp_id = '$id' ;";
$runQuery = mysqli_query($conn , $query);

if ($runQuery) {
    # code...
    echo 'runn';
    header('location: main_table.php');
}else{
    echo "not working";
}





?>