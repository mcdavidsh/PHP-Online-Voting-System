<?php
include "library/config/dbconn.php";
include "library/config/constants.php";
$phone = "";
$email = "";
if(isset($_POST['submit']))
{
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=md5($_POST['password']);
//    Check Duplicate User
$sql_u = "SELECT * FROM voters WHERE phone ='$phone'";
$sql_e = "SELECT * FROM voters WHERE email ='$email'";
$res_u = mysqli_query($con, $sql_u);
$res_e = mysqli_query($con, $sql_e);
if (mysqli_num_rows($res_u) > 0) {
    $msg = '<div class="alert alert-warning" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button> ' . $email . ' Already used. check and try again.</div>';
} else if (mysqli_num_rows($res_e) > 0) {
    $msg = '<div class="alert alert-warning" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button> '. $phone .' Already used, check and try again. </div>';
} else {
    $query = mysqli_query($con, "insert into voters(fullname,email,phone,password) values('$fullname','$email','$phone','$password')");
    $msg = '<div class="alert alert-success" role="alert">Registration Successful! <a href="' . $voterlogin . '" class="text-success">Login</a> to get started.</div>';
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
    <div id="primary" class="p-t-b-50 height-full ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mx-md-auto">
                    <div class="text-center vt-login">
                        <?php echo $sitelogo?>
                        <h2 class="py-5">Digital Registration</h2>
<!--                        <p class="p-t-b-20">-->
<!--                            </p>-->
                    </div>
                    <?php if(isset($msg)) {

                        echo $msg;
                        $msg = "";
                    }
                    ;
                    ?>
                    <form method="post">
                        <div class="form-group has-icon"><i class="icon-user"></i>
                            <input type="text" class="form-control form-control-lg"
                                   placeholder="Fullname" name="fullname">
                        </div>
                        <div class="form-group has-icon"><i class="icon-envelope-o"></i>
                            <input type="email" class="form-control form-control-lg"
                                   placeholder="Email Address" name="email">
                        </div>
                        <div class="form-group has-icon"><i class="icon-phone"></i>
                            <input type="tel" class="form-control form-control-lg"
                                   placeholder="Phone" name="phone">
                        </div>
                        <div class="form-group has-icon">
                            <i class="icon-asterisk"></i>
                            <input class="form-control form-control-lg" required name="password" type="password"  placeholder="Password">
                            <div class="hide-show">
                                <span>Show</span>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-lg btn-block" >Register</button>
                    </form>
                    <div class="pt-lg-5 pb-lg-0 text-center text-bold vt-login-fo d-block">
                        <a href="<?php echo $voterlogin;?>" class="forget-pass mr-1">Already Registered?</a>

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
