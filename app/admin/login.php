<?php
session_start();
include "../../library/config/dbconn.php";
include "../../library/config/constants.php";
if(isset($_POST['submit']))
{
    $ret=mysqli_query($con,"SELECT * FROM manager WHERE username='".$_POST['username']."' and password='".md5($_POST['password'])."'");
    $num=mysqli_fetch_array($ret);
    if($num>0)
    {
        $extra="dashboard.php";
        $_SESSION['adlogin']=$_POST['username'];
        $_SESSION['id']=$num['id'];
        $host=$_SERVER['HTTP_HOST'];
        $uip=$_SERVER['REMOTE_ADDR'];
        $status=1;
        $log=mysqli_query($con,"insert into userlog(uid,userlogin,userip,status) values('".$_SESSION['id']."','".$_SESSION['adlogin']."','$uip','$status')");
        $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
    else
    {
        $_SESSION['adlogin']=$_POST['username'];
        $uip=$_SERVER['REMOTE_ADDR'];
        $status=0;
        mysqli_query($con,"insert into userlog(userlogin,userip,status) values('".$_SESSION['adlogin']."','$uip','$status')");
        $errormsg='<div class="alert alert-danger" role="alert">Invalid username or password</div>';
        $extra="index.php";

    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="INEC" content="Voter Registration">
    <meta name="Mcdavid" content="www.softhood.net/david">
    <link rel="icon" href="<?php echo $favico_app;?>" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../library/assets/app/assets/css/vendor.css">
    <link rel="stylesheet" type="text/css" href="../../library/assets/app/assets/css/flat-admin.css">
    <link rel="stylesheet" type="text/css" href="../../library/assets/app/assets/image-uploader/style.css">
    <link rel="stylesheet" type="text/css" href="../../library/assets/app/assets/css/image-upload/img-upload.css">
    <title>Admin  <?php echo $pageTitle; ?></title>
    <link rel="stylesheet" type="text/css" href="../../library/assets/app/assets/css/image-upload/filepond-plugin-image-preview.min.css">
    <link rel="stylesheet" type="text/css" href="../../library/assets/app/assets/css/image-upload/filepond.min.css">
    <link rel="stylesheet" type="text/css" href="../../library/assets/app/assets/css/image-upload/nornalize.min.css">
    <link rel="stylesheet" href="../../library/assets/home/css/custom.css">

</head>
<body>
  <div class="app app-default">

<div class="app-container app-login">
  <div class="flex-center">
    <div class="app-header"></div>
    <div class="app-body">
      <div class="loader-container text-center">
          <div class="icon">
            <div class="sk-folding-cube">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
              </div>
            </div>
          <div class="title">Logging in...</div>
      </div>
      <div class="app-block">
      <div class="app-form">
        <div class="form-header">
          <div class="app-brand"><span class="highlight">INEC</span> Admin</div>
        </div>
          <?php if(isset($errormsg)){
              echo $errormsg;
          }?>

          <?php if(isset($msg)){
              echo ($msg);
          }?>
        <form method="post">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">
                <i class="fa fa-user" aria-hidden="true"></i></span>
              <input type="text" name="username" class="form-control" placeholder="Username" aria-describedby="Username">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon2">
                <i class="fa fa-key" aria-hidden="true"></i></span>
              <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="Password">
            </div>
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-success btn-submit">Login</button>
            </div>
        </form>
        </div>
      </div>
      </div>
    </div>
    <div class="app-footer">
    </div>
  </div>
</div>

  </div>
  
<!--  <script type="text/javascript" src="../../library/assets/app/assets/js/vendor.js"></script>-->
<!--  <script type="text/javascript" src="../../library/assets/app/assets/js/app.js"></script>-->

</body>
</html>
