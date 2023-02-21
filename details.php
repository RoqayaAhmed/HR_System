<?php
$conn = mysqli_connect("localhost","root","","it_share");
$emp_id = $_GET['id'];





$query = "SELECT * FROM `employees` WHERE id=$emp_id";
$runquery = mysqli_query($conn,$query);
$x = mysqli_fetch_assoc($runquery);

$query2 = "SELECT * FROM `daily_login` WHERE emp_id=$emp_id";
$run_query2 = mysqli_query($conn,$query2);

$query3 = "SELECT * FROM `jobs` WHERE id=$x[job_id]";
$run_query3 = mysqli_query($conn,$query3);
$x3 = mysqli_fetch_assoc($run_query3);

?>
    <center> 
   <div style="width:90% ">
   <center><table class="table table-hover">
    <thead>
      <tr>
    
      <th style="font-size:30px;color:black; text-shadow:5px 5px 5px white" scope="col">ID</th>
      <th style="font-size:30px;color:black;text-shadow:5px 5px 5px white" scope="col">NO. Of Hours</th>
      <th style="font-size:30px;color:black;text-shadow:5px 5px 5px white" scope="col">Salary</th>
    </tr>
    </thead>
    
    echo"<tr>
            <td>$y[id]</td>
            <td>$y[name]</td>
            <td>$x4[login_date]</td>
            <td>$x4[logout_date]</td> 
            <td>$x4[nf_hours]</td><br>
        </tr>";
}
?>

<html>
<form method='post' action='<?php echo $_SERVER['PHP_SELF'];?>'>
<fieldset>
<legend>Employer Details</legend>
ID: <?php echo $x['id']; ?> <br>
Name: <?php echo $x['name']; ?> <br>
Age: <?php echo $x['age']; ?> <br>
Phone: <?php echo $x['phone']; ?> <br>
Job Position: <?php echo $x3['name']; ?> <br>
Total Worked Hours: <?php echo $x['total_hours']; ?> <br>
</legend>
</form>