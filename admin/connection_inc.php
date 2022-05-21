<?php
session_start();
$con=mysqli_connect('localhost','root','sadhana123','furniture');
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/furniture/');
define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'/media/product/');
define('SITE_PATH','http://localhost/furniture/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'/media/product/');
?>
