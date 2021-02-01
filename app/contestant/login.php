<?php
error_reporting(E_ALL);
session_start();
include "../../library/config/dbconn.php";
include "../../library/config/constants.php";

if(isset($_POST['submit']))
{
    $ret=mysqli_query($con,"SELECT * FROM contestant WHERE email='".$_POST['eplogin']."' and password='".md5($_POST['password'])."'");
    $num=mysqli_fetch_array($ret);
    
    if($num>0)
    {  if ($num['status']==1)
    {
        $errormsg='<div class="alert alert-danger" role="alert">Your Account is not approved yet.</div>';
    }

        if($num['profile']==1){

            $extra="index.php";
        }else{


            $extra="complete-profile.php";
        }

        $_SESSION['ctlogin']=$_POST['eplogin'];
        $_SESSION['id']=$num['id'];
        $host=$_SERVER['HTTP_HOST'];
        $uip=$_SERVER['REMOTE_ADDR'];
        $status=1;
        $log=mysqli_query($con,"insert into userlog(uid,userlogin,userip,status) values('".$_SESSION['id']."','".$_SESSION['ctlogin']."','$uip','$status')");
        $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
    else
    {
        $_SESSION['ctlogin']=$_POST['eplogin'];
        $uip=$_SERVER['REMOTE_ADDR'];
        $status=0;
        mysqli_query($con,"insert into userlog(userlogin,userip,status) values('".$_SESSION['ctlogin']."','$uip','$status')");
        $errormsg='<div class="alert alert-danger" role="alert">Invalid username or password</div>';
        $extra="login.php";

    }
}



if(isset($_POST['change']))
{
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"SELECT * FROM users WHERE userEmail='$email' and contactNo='$contact'");
    $num=mysqli_fetch_array($query);
    if($num>0)
    {
        mysqli_query($con,"update users set password='$password' WHERE userEmail='$email' and contactNo='$contact' ");
        $msg='<div class="alert alert-success" role="alert">Password Changed Successfully</div>';

    }
    else
    {
        $errormsg='<div class="alert alert-danger" role="alert">Invalid email id or Contact no</div>';
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    echo "<title>$pageTitle</title>";
    include "../../library/include/home/ct-header.php";
    ?>
</head>
<body >
<!-- Pre loader -->
<?php echo $preloader; ?>

<div id="app" class="paper-loading ">
    <main>
        <div id="primary" class="p-t-b-50 height-full ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mx-md-auto">
                        <div class="text-center vt-login">
                            <?php echo $sitelogo_app?>
                            <h2 class="py-5">Every Vote Matters</h2>
                            <!--                        <p class="p-t-b-20">-->
                            <!--                            </p>-->
                        </div>
                        <?php if(isset($errormsg)){
                            echo $errormsg;
                        }?>

                        <?php if(isset($msg)){
                            echo ($msg);
                        }?>
                        <form method="post">
                            <div class="form-group has-icon"><i class="icon-user"></i>
                                <input type="email" name="eplogin"  class="form-control form-control-lg"
                                       placeholder="Enter Email">
                            </div>
                            <div class="form-group has-icon"><i class="icon-asterisk"></i>

                                <input type="password" name="password" placeholder="Enter Password" class="form-control form-control-lg"
                                       placeholder="Password">
                                <div class="hide-show">
                                    <span>Show</span>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success btn-lg btn-block" value="Log In">Login</button>
                        </form>
                        <div class="pt-lg-5 pb-lg-0 text-center text-bold vt-login-fo">
                            <a href="<?php echo $voterreg;?>" class="forget-pass mr-1">Haven't Registered?</a> -
                            <a href="<?php echo$voterrecovery;?>" class="forget-pass">Can't Login?</a>
                            <a href="<?php echo '../../index.php';?>" class="forget-pass d-block pt-3">&larr; Go back homepage</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #primary -->
    </main>

</div>
<!--End Page page_wrrapper -->
<?php include "../../library/include/home/ct-footer.php"; ?>
