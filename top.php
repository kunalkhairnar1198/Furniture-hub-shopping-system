<?php
require('connection_inc.php');
require('function_inc.php');
require('add_to_cart_inc.php');
$cat_res=mysqli_query($con,"select * from categories where status=1");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
$cat_arr[]=$row;
}
?>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title>FURNITURE HUB</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="css/default.css" rel="stylesheet" type="text/css" />
    <title>Untitled Document</title>
    <script type="text/javascript" src="/test/wp-content/themes/child/script/jquery.jcarousel.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    



</head>

<body>
<div class="container-fluid">
        <div class="logo-search-cart">
            <div class="logo">
                <a href="index.php">
                    <img src="images/logo.jpg" width="203" height="27" alt="logo Iamge" style="margin-left:30px; margin-top:10px;"/>
                </a>
            </div>
            <div class="search" style="margin-bottom:20px;margin-left:120px;">
                <input type="text" class="tops" />
                <input type="submit" value="Search" class="topsub" />
            </div>
            
            <?php
session_start();
if(isset($_SESSION['USER_LOGIN']))
{ ?>
    <a href="my_order.php"><button type="button" class="btn btn-success" style="float:right;margin-right=50px; margin-left:20px;">MY ORDERS</button></a>
           </button></a>
    <a href="cart.php"><button type="button" class="btn btn-success" style="float:right;margin-right=50px; margin-left:20px;">CART</button></a>
 <a href="logout.php"><button type="button" class="btn btn-danger"style="float:right;margin-right=450px;" >LOGOUT</button></a>
<?php  }
else { ?>
            <a href="login.html"><button type="button" class="btn btn-success" style="float:right;margin-right=50px; margin-left:20px;">SIGN IN</button></a>
<a href="create.html"><button type="button" class="btn btn-warning"style="float:right;margin-right=450px;" >CREATE ACCOUNT</button></a>

<?php } ?>
      
</div>
        <div class="clr"></div>
    </div>

    <div class="menu">
        <div class="wrapper">
            <ul>
                    <?php 
                    foreach($cat_arr as $list){
                        ?>
                    <li><a href="categories.php?id=<?php echo $list['id'];?>"><?php echo $list['categories']?></a></li>
                    <?php
                    }

                    ?>
             </ul>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>


