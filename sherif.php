 <?php
$host = 'localhost';
$user = 'root';
$password = '';
$DBName = 'englishCourse';

$conn = mysqli_connect($host, $user, $password, $DBName);

if($conn)
{
    //echo 'connected';
}

//echo date('d.m.Y',time());
 $my = strval(date('d-m-Y',time()));

 echo $my;



//--------------sellect
 $query = " SELECT * FROM testin WHERE day_date = '$my';";
 $runQuery = mysqli_query($conn, $query);
 if($runQuery)
 {
     echo ' runned';
     
 }else{
     echo 'not runned';
 }
 
 echo $rows = mysqli_num_rows($runQuery);
 foreach ($runQuery as $element) 
 {
    
    echo '. - lecture Number: '.$element['d_in']."<br> ";
    echo '. - lecture date: '.$element['id_emp']."<br> <hr>";
 }


//-------------------------------------
?>

<form action="test.php" method="POST">

    <input type="id" name="id">
    <input type="submit" value="find" name="n">

</form>

<form action="test.php" method="POST">
    <input type="id" name="id">
    <input type="submit" value="in" name="in">

</form>


<form action="test.php" method="POST">
    <input type="id" name="id">
    <input type="submit" value="out" name="out">

</form>
<?php
//---------------------------out----------------------------
if(isset($_POST['out']))
{
    $id = $_POST['id'];
    $day_date = strval(date('d-m-Y',time()));
    $check = 0;
    $query = " SELECT * FROM testout WHERE  id_emp = '$id' ;";
    $runQuery = mysqli_query($conn, $query);
    if($runQuery)
    {
        echo ' runned';
        
    }else{
        echo 'not runned';
    }
    
    
    foreach ($runQuery as $element) 
    {
        if ($element['day_date'] == $day_date) {
            # code...
            $check = 1;
        }
      
    }
    
    //-----------------
    
    
    //database for insert
    if ($check == 0) {
        # code...
        $query = "INSERT INTO  testout  (id_emp, day_date) VALUES ('$id', '$day_date') ;";
        $run_query = mysqli_query($conn,$query);
        if ($run_query) {
            # code...
            echo "runned";
       }
    }
}

//----------end out------------------------------------


//------------------------in-------------------

if(isset($_POST['in']))
{
    $days = 0;
    $id = $_POST['id'];
    $day_date = strval(date('d-m-Y',time()));
    $check = 0;
    $query = " SELECT * FROM testin WHERE  id_emp = '$id' ;";
    $runQuery = mysqli_query($conn, $query);
    if($runQuery)
    {
        echo ' runned';
        
    }else{
        echo 'not runned';
    }
    
    
    foreach ($runQuery as $element) 
    {
        $days = $element['day_num'];
        if ($element['day_date'] == $day_date) {
            # code...
            $check = 1;
        }
       
    }
    
    //-----------------
    
    
    //database for insert
    if ($check == 0) {
        # code...
        $days +=1;
        $query = "INSERT INTO  testin  (id_emp, day_date, day_num ) VALUES ('$id', '$day_date', '$days') ;";
        $run_query = mysqli_query($conn,$query);
        if ($run_query) {
            # code...
            echo "runned";
       }
    }
}
//-----------------------end in-----------------------------

//---------admin page--------
?>


<?php

if(isset($_POST['n'])) {
    # code...
    $id = $_POST['id'];
    $queryIn = " SELECT * FROM testin WHERE  id_emp = '$id' ;";
    $queryOut = " SELECT * FROM testout WHERE  id_emp = '$id' ;";
    $queryStu = " SELECT * FROM students WHERE  stu_id = '$id' ;";
    $runQueryIn = mysqli_query($conn, $queryIn);
    $runQueryOut = mysqli_query($conn, $queryOut);
    $runQueryStu = mysqli_query($conn, $queryStu);
    if($runQueryIn)
    {
        echo ' runned';
        
    }else{
        echo 'not runned'."<br>";
    }
    
    
    $in = mysqli_fetch_assoc ($runQueryIn); 
   

    $out = mysqli_fetch_assoc ($runQueryOut); 
    

    $stu = mysqli_fetch_assoc ($runQueryStu) ;

      
       echo $in['day_num']."<br>";

       //echo $out['name']."<br>";
       echo $stu['name']."<br>";
    

    
}
?>