<?php
require('connection_inc.php');
require('function_inc.php');
$name=get_safe_value($con,$_POST['name']);
$email=get_safe_value($con,$_POST['email']);
$mobile=get_safe_value($con,$_POST['mobile']);
$comment=get_safe_value($con,$_POST['message']);
$time=date('Y-m-d h:i:s');
mysqli_query($con,"insert into contactus(name,email,mobile,comment,time) values('$name','$email','$mobile','$comment','$time')");
echo "Thank you";
?>