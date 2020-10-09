<?php

error_reporting(0);
$connect = mysqli_connect("localhost","root","");
mysqli_select_db($connect,"result") or die("Connection Failed");


if ($connect) {

$extract = mysqli_query($connect,"SELECT * FROM class1 WHERE name='Rohan'");

while ($row = mysqli_fetch_assoc($extract)) {

$sub1 = $row["sub1"];
$sub2 = $row["sub2"];
$sub3 = $row["sub3"];
$sub4 = $row["sub4"];
$sub5 = 99;
$name1 = $row["name"];
$newtotal = $sub1+$sub2+$sub3+$sub4+$sub5;
$newpercent = ($newtotal / 500 ) * 100 ;

mysqli_query($connect,"UPDATE class1  SET sub5='$sub5' , total_obtained = '$newtotal' , percent = '$newpercent' WHERE name='$name1'");
}
echo "<h2><b>Marks updated succesfully</b></h2>";
}
mysqli_close($connect); 
?><?php

error_reporting(0);

$connect = mysqli_connect("localhost","root","") or die(mysqli_error());  
mysqli_select_db($connect,"visitor_counter") or die(mysqli_error());

if($connect)
{
   $extract = mysqli_query($connect,"SELECT * FROM visitor_counts WHERE id=1"); //in database we have already inserted value of vount as 0.
   while ($row = mysqli_fetch_assoc($extract)) 
   {
    $vcount = $row["vcount"];            
   }
   
   $extract = mysqli_query($connect,"UPDATE visitor_counts SET vcount= $vcount+1 WHERE id = 1") or die(mysqli_error($connect));
   mysqli_close($connect);
   echo "You've had $vcount visitors.";   
       
}       