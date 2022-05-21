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
 
$mob=$_POST['mob'];

$pass= $_POST['pass'];

$res1=mysqli_fetch_assoc(mysqli_query($con,"SELECT uname FROM user Where uname='$uname'"));
$res3=mysqli_fetch_assoc(mysqli_query($con,"SELECT mob FROM user Where mob='$mob'"));
if($res1['uname']!=$uname)
echo '<script>alert("USER NAME NOT MATCHING!!!"); window.location.href = "create.html";</script>';
if($res3['mob']!=$mob)
echo '<script>alert("MOBILE NUMBER NOT MATCHING!!!"); window.location.href = "create.html";</script>';

$sql = "update user set pass='$pass' where uname='$uname'and mob='$mob'";
echo $sql;
if(!mysqli_query($con,$sql))
echo mysqli_error($con);
else    
echo '<script>alert("password reset successfully !!!"); window.location.href = "index.php";</script>'; 

?>
