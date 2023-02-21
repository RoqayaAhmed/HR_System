

<?php
session_start();
require 'conn.php';
global $conn;
if(isset($_SESSION['id']) && isset($_SESSION['date'])){
$date1 = date('Y-m-d H:i:s');
$id = $_SESSION['id'];
$loginDate = $_SESSION['date'];

if(isset($_POST['logout'])){
    $query1 = "UPDATE `daily_login` SET logout_date ='$date1' WHERE emp_id='$id' AND login_date='$loginDate'";
    $runquery1 = mysqli_query($conn,$query1);
    
    //$query2 = "SELECT login_date , logout_date FROM daily_login WHERE login_date = '$loginDate' AND logout_date = '$date1'";
    //$runquery2 = mysqli_query($conn , $queury2);
    
    $inseconds = strtotime($loginDate);
    $outseconds = strtotime($date1);
    $nf_seconds = $outseconds - $inseconds ;
    $nf_hours = $nf_seconds / 3600;
    $_SESSION['hours']= $nf_hours;
    $query3 = "UPDATE `daily_login` SET nf_hours ='$nf_hours' WHERE emp_id='$id' AND login_date='$loginDate'";
    $runquery3 = mysqli_query($conn,$query3);
    if($runquery3){
        header('location:admin.html');

        //-------------------------------------------------Add In LogOut Code---------------------------------------

$query6 = "SELECT * FROM `daily_login` WHERE id=$emp_id AND logout_date=$date";
$run_query6 = mysqli_query($conn,$query6);
$x6= mysqli_fetc_assoc($run_query6);
$nfhours = $x6['nf_hours'];

$query7 = "SELECT * FROM `employees` WHERE id=$emp_id";
$run_query7 = mysqli_query($conn,$query7);
$x7 = mysqli_fetc_assoc($run_query7);
$total_hours = $x7['total_hours'];

$total_hours += $nfhours;

$query8 = "UPDATE `employees` SET `total_hours`=$total_hours WHERE id=$emp_id";
$run_query8 = mysqli_query($conn,$query8);

//------------------------------------------------------------------------------------------------------------
}}}


?>



<center>
    <form method="POST" action="logout.php">
        <input class="log" type="submit" value= "logout" name="logout" >
    </form>
</center>