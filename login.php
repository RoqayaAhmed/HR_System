




<?php
session_start();
require 'conn.php';
global $conn;

$date = date('Y-m-d H:i:s');

$dateIn = strval(date('d-m-Y',time()));

if(isset($_POST['login'])) {
    if(isset($_POST['id']) && !empty($_POST['id']))
    $id=$_POST['id'];
    else echo "please enter your id";


//-------------------------------------------------Add In LogIn Code-----------------------------------------

$query9 = "SELECT * FROM `daily_login` WHERE emp_id=$id ";

$run_query9 = mysqli_query($conn,$query9);
echo $x9 = mysqli_num_rows($run_query9);

$check = 0;


//*--------------------
if($run_query9)
{
    echo ' runned';
    
}else{
    echo 'not runned';
}


foreach ($run_query9 as $element) 
{
    if ($element['dateIn'] == $dateIn) {
        # code...
        $check = 1;
    }
   
}
//--------------

if($check == 0) {

    //put your code here (the one that adds to the login_date coloum in the daily_login table)--------------------

    if (!empty($id)){
        $query = "SELECT * FROM employees WHERE  id = '$id' ";
        $runquery = mysqli_query($conn , $query);
        $rows = mysqli_num_rows($runquery);
        
        if($rows>0){
            $query1 = "INSERT INTO `daily_login` (`emp_id`,`login_date`, dateIn) VALUES ('$id','$date', '$dateIn')";
            $runquery1 = mysqli_query($conn,$query1);
            if($runquery1){
                $_SESSION['id']=$id;
                $_SESSION['date']=$date;
    
                header('location:log.html');
    
    
            }
        }
        else echo "incorrect ID";
        }

} else {
    echo "You Have Already Logged In For Today";
}

//--------------------------------------------------------------------------------------------------------------

}

//--------------
?>




<?php
//session_start();
//require 'conn.php';
//global $conn;
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
        header('location:log.html');

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



