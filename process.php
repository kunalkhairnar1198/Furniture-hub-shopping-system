<?php
include('connection_inc.php');
    if(isset($_POST['login']))
    {
        if(empty($_POST['uname'])||empty($_POST['upass']))
        {
               echo 'empty';
        }
        else{
            $query="select * from user where uname='".$_POST['uname']."' and pass='".$_POST['upass']."'";
            $result=mysqli_query($con,$query);
            if($res=mysqli_fetch_assoc($result))
            {   session_start();
                $_SESSION['USER_LOGIN']='yes';
                $_SESSION['USER_ID']=$res['id'];
                $_SESSION['USER_NAME']=$_POST['uname'];
                echo '<script>alert("LOGIN SUCCESSFULLY!!!"); window.location.href = "index.php";</script>';
            }
            else
            {
                echo '<script>alert("INVALID LOGINID OR PASSWORD TRY AGAIN!!!"); window.location.href = "login.html";</script>';
            }
        }
    }
    else
     echo 'not working';

?>
