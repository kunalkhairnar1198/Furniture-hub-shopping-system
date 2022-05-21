<?php
require("connection_inc.php");
 $name=$_POST['name'];
 $product=$_POST['product'];
 $material=$_POST['material'];
 $foam=$_POST['foam'];
 $dim=$_POST['dim'];
 $email=$_POST['email'];
 $addrs=$_POST['addrs'];
$mob=$_POST['mob'];
$added_on=date('Y-m-d h:i:s');
$sql = "INSERT INTO customize(name,product,material,foam,dim,email,addrs,mob,added_on) VALUES('$name','$product','$material','$foam','$dim','$email','$addrs','$mob','$added_on')"; 
if(!mysqli_query($con,$sql))
 mysqli_error($con);
else    
 echo'<script>alert("YOUR REQUSEST HAS BEEN SAVED WE WILL CONTACT TOU SOON!!!"); window.location.href = "index.php";</script>'; 

?>