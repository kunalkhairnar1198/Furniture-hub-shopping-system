<?php
require('connection_inc.php');
require('function_inc.php');
$msg='';
if(isset($_POST['login'])){
    $username=get_safe_value($con,$_POST['aname']);
    $password=get_safe_value($con,$_POST['apass']);
    $sql="select * from admin where aname='$username' and apass='$password'";
    $res=mysqli_query($con,$sql);
    $count=mysqli_num_rows($res);
    if($count>0){
        $_SESSION['admin_login']='yes';
        $_SESSION['admin_aname']=$username;
        header('location:categories.php');
        die();
    }else{
     $msg='plesae enter valid Credentials';
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=" 1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- CUSTOM CSS -->

    <link rel="stylesheethref=" https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="css/signup.css">
    <script>
        $('.message a').click(function() {
            $('form').animate({
                height: "toggle",
                opacity: "toggle"
            }, "slow");
        });

    </script>
   
</head>

<body>
    <div class="login-page">

        <div class="form" >    
            <form class="register-form" method="POST">
                <input type="text" placeholder="name"  name="aname" />
                <input type="password" placeholder="password"  name="apass"/>
                <input type="text" placeholder="email address" />
                <button>create</button>
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
            <form class="login-form" method="POST">
                <input type="text" placeholder="username" name="aname"/>
                <input type="password" placeholder="password" name="apass"/>
                <button name="login">login</button>
                <p class="message">Not registered? <a href="create.html">Create an account</a></p>
            </form>
            <?php echo $msg ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
