<?php
session_start();
require 'conn.php';
global $conn;

if(isset($_POST['login'])) {
    if(isset($_POST['name']) && !empty($_POST['name']))
    $name=$_POST['name'];
    else
    echo "please enter your email";

    if(isset($_POST['pass']) && !empty($_POST['pass']))
        $pass=$_POST['pass'];
    else
        echo "please enter your password";
}

if (!empty($name)&&!empty($pass)){
$query = "SELECT * FROM admin WHERE name = '$name' AND pass = '$pass'";
$runquery = mysqli_query($conn , $query);
$rows = mysqli_num_rows($runquery);

if($rows>0){
     $_SESSION['admin']=$name;
    header('location:main_table.php');}
else echo "incorrect user name or password";
}
?>