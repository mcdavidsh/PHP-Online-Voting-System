<?php
error_reporting(E_ALL);

include "library/config/dbconn.php";
include "library/config/constants.php";
session_start();


if(isset($_POST['change']))
{
    $email=$_POST['email'];
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
include "library/include/home/header.php";
?>
</head>
<body >
<!-- Pre loader -->
<?php echo $preloader; ?>

<div id="app" class="paper-loading ">
<main>
    <div id="primary" class="p-t-b-100 height-full ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mx-md-auto">
                    <div class="text-center vt-login">
                        <?php echo $sitelogo?>
                        <h2 class="py-5">Your Vote Counts</h2>
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
                        <div class="form-group has-icon"><i class="icon-envelope-o"></i>
                            <input type="text" name="email"  class="form-control form-control-lg"
                                   placeholder="Email or Phone">
                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-lg btn-block" value="Log In">Recover</button>
                    </form>
                    <div class="pt-lg-5 pb-lg-0 text-center text-bold vt-login-fo">
                        <a href="<?php echo $voterlogin;?>" class="forget-pass mr-1">Already Registered?</a> -
                        <a href="<?php echo $homepage;?>" class="forget-pass d-block pt-3">&larr; Go back homepage</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>

</div>
<!--End Page page_wrrapper -->
<?php include "library/include/home/footer.php"; ?>
