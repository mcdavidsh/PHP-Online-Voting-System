<?php
include "../library/config/dbconn.php";
include "../library/config/constants.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    echo "<title>Login Shortcut | INEC</title>";

    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="INEC" content="Voter Registration">
    <meta name="Mcdavid" content="www.softhood.net/david">
    <link rel="icon" href="../library/assets/home/img/page/default/favico.png" type="image/x-icon">
    <link rel="stylesheet" href="../library/assets/home/css/app.css">
    <link rel="stylesheet" href="../library/assets/home/css/custom.css">
    <link rel="stylesheet" href="../library/assets/home/bootstrap/bootstrap.min.css">
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

                            <h2 class="py-5">Select Account</h2>
                            <!--                        <p class="p-t-b-20">-->
                            <!--                            </p>-->
                        </div>
                        <div class="" >
                           <div class="p-t-20"> <a href="../login.php" class="btn btn-success btn-lg btn-block">Voter</a></div>
                            <div class="p-t-20"> <a href="contestant/login.php" class="btn btn-success btn-lg btn-block">Contestant</a></div>
                            <div class="p-t-20"> <a href="admin/login.php" class="btn btn-success btn-lg btn-block">Manager</a></div>
                    </div>
                        <div class="p-t-40 text-center">
                            <a href="../index.php" class="text-success "> &larr; Go back to homepage</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #primary -->
    </main>

</div>
<!--End Page page_wrrapper -->
<script src="../library/assets/home/js/app.js"></script>
