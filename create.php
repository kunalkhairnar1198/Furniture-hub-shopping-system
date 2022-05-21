<?php
$user="root";
$pass="sadhana123";
$db="furniture";
$host="localhost";
$con=mysqli_connect($host,$user,$pass,$db,3308);
if(!$con)
echo "NOT CONNECTED";
else
 $uname=$_POST['uname'];
 $name=$_POST['name'];
$email=$_POST['email'];
$mob=$_POST['mob'];
$addrs=$_POST['addrs'];
$pass= $_POST['pass'];
$added_on=date('Y-m-d h:i:s');
$res1=mysqli_query($con,"SELECT uname FROM user Where uname='$uname'");
$res2=mysqli_query($con,"SELECT email FROM user Where email='$email'");
$res3=mysqli_query($con,"SELECT mob FROM user Where mob='$mob'");
if($res1->num_rows!= 0)
echo '<script>alert("USER NAME ALREADY EXIST KINDLY CHANGE AND SIGNUP AGAIN!!!"); window.location.href = "create.html";</script>';
elseif($res2->num_rows!= 0)
echo '<script>alert("EMAIL ID ALREADY EXIST KINDLY CHANGE AND SIGNUP AGAIN!!!"); window.location.href = "create.html";</script>';
elseif($res3->num_rows!= 0)
echo '<script>alert("MOBILE NUMBER ALREADY EXIST KINDLY CHANGE AND SIGNUP AGAIN!!!"); window.location.href = "create.html";</script>';
$sql = "INSERT INTO user(uname,name,email,mob,addrs,pass,added_on) VALUES('$uname','$name','$email','$mob','$addrs','$pass','$added_on')";

if(!mysqli_query($con,$sql))
echo mysqli_error($con);
else    
echo '<script>alert("Signup Successfully !!!"); window.location.href = "index.php";</script>'; 

?>
