<html>
<form method='GET' action='<?php echo $_SERVER['PHP_SELF'];?>'>
<input type='text' name='search' placeholder='Search by ID'>
<input type='submit' name='button' value='Search'>
</form> 

<fieldset>

</fieldset>

</html>


<?php
$conn = mysqli_connect("localhost","root","","it_share");
echo "$_GET['search']";
if(isset($_GET['button'])){
$search = $_GET['search'];
$query = "SELECT * FROM `employees` WHERE id LIKE '%".$search."%'";
$run_query = mysqli_query($conn,$query);
}
?>







<?php
/*
//-------------------------------------------------Add In LogOut Code---------------------------------------

$query6 = "SELECT * FROM `daily_login` WHERE id=$emp_id AND logout_date=$date";
$run_query6 = mysqli_query($conn,$query6);
$x6= mysqli_fetc_assoc($run_query6);
$nfhours = $x6['nf_hours'];

$query7 = "SELECT * FROM `employees` WHERE id=$emp_id";
$run_query7 = mysqli_query($conn,$query7);
$x7 = mysqli_fetc_assoc($run_query7)
$total_hours = $x7['total_hours'];

$total_hours += $nfhours;

$query8 = "UPDATE `employees` SET `total_hours`=$total_hours WHERE id=$emp_id";
$run_query8 = mysqli_query($conn,$query8);

//------------------------------------------------------------------------------------------------------------


//-------------------------------------------------Add In LogIn Code-----------------------------------------

$query9 = "SELECT * FROM `daily_login` WHERE id=$emp_id AND logout_date=$date";
$run_query9 = mysqli_query($conn,$query9);
$x9 = mysqli_num_rows($run_query9);

if($x9 >= 0) {

    //put your code here (the one that adds to the login_date coloum in the daily_login table)--------------------


} else {
    echo "You Have Already Logged In For Today";
}

//--------------------------------------------------------------------------------------------------------------



*/
?>