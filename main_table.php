<html>
<head>
    

    
    <!-- Bootstrap CSS File -->
     <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     
    
   <!-- <link rel="stylesheet" href="main_table.css">-->
   <style></style> 
</head>
<body>
<br><br><br>

<?php
require 'ses.php';
require 'conn.php';
global $conn;

$query = "SELECT * FROM employees;";
$runquery = mysqli_query($conn , $query);
//echo "rows".$rows = mysqli_num_rows($runquery);


if($runquery){

  
   ?>
   <center> 
   <div style="width:90% ">
   <center><table class="table">
    <thead>
      <tr >
    
      <th style="font-size:30px;color:#159596; text-shadow:3px 3px 3px black" scope="col">ID</th>
      <th style="font-size:30px;color:#159596;text-shadow:3px 3px 3px black" scope="col">NO. Of Hours</th>
      <th style="font-size:30px;color:#159596;text-shadow:3px 3px 3px black" scope="col">Salary</th>
    </tr>
    </thead>
     <tbody>
     <?php

//while($row=mysqli_fetch_array($runquery)){
foreach ($runquery as $element) {
    # code...
    $total = 0;
    $emp_id = $element['id'];
    $hQuery = "SELECT * FROM daily_login where 	emp_id = '$emp_id' ;";
    $runHQuery = mysqli_query($conn, $hQuery);
    foreach ($runHQuery as $hours) {
        $total = $total + $hours['nf_hours'];
    }
    $salary= ($total/8)*100;

$id = $element['id'];
$nf_hours = $total ;
?>
<tr>
<td> <?php  echo $id ;?></td>
<td> <?php echo $nf_hours; ?></td>
<td> <?php echo $salary; ?></td>
<td><a href="delete.php?id=<?php echo $emp_id; ?>"> Paid</a></td>
<td><a href="details.php?id=<?php echo $emp_id; ?>"> Details</a></td>
</tr>


<?php
}
echo " </tbody>";
echo "</table></center>";
}
else echo"not working";
?></div>
</center>