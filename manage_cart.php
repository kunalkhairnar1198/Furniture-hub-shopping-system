<?php
require('connection_inc.php');
require('function_inc.php');
require('add_to_cart_inc.php');
if(isset($_SESSION['USER_LOGIN'])){
$pid=get_safe_value($con,$_POST['pid']);
$qty=get_safe_value($con,$_POST['qty']);
$type=get_safe_value($con,$_POST['type']);


$obj=new add_to_cart();

if($type=='add'){
	$obj->addProduct($pid,$qty);
}

if($type=='remove'){
	$obj->removeProduct($pid);
}

if($type=='update'){
	$obj->updateProduct($pid,$qty);
}

echo $obj->totalProduct();
}
?>