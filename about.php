<?php
error_reporting(E_ALL);
session_start();
include "library/config/dbconn.php";
include "library/config/constants.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    echo "<title>$pageTitle</title>";
    include "library/include/home/header.php";
    ?>
</head>
<body>
<!-- Pre loader -->
<?php echo $preloader; ?>
<div class="page">
    <!-- Header -->
    <nav class="mainnav navbar navbar-default justify-content-between">
        <div class="container relative">
            <a class="offcanvas dl-trigger paper-nav-toggle text-white" type="button" data-toggle="offcanvas"
               aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="color: #ffffff;">
                <i class="text-white"></i>
            </a>
            <a class="navbar-brand text-white text-center d-block align-top" href=" <?php echo $homepage?>">
                <?php echo $sitelogo?>
                <!--               <span class="h2 ml-1">INEC</span>-->
            </a>
            <div class="paper_menu ">
                <div id="dl-menu" class="xv-menuwrapper responsive-menu">
                    <ul class="dl-menu">

                        <li class="text-success"><a href="app/index.php" class="py-2 btn btn-success btn-block"><span class="text-white">Login</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href=" <?php echo $homepage?>" class="text-success">Home</a></li>
                <li class="active">About</li>
            </ol>
        </div>
    </div>
    <div class="content-wrapper animatedParent animateOnce">
        <div class="container">
            <div class="row p-t-b-40 responsive">
                <div class="col-md-6">
                    <h2>What is INEC</h2>
                    <p>INEC is an electronic voting web app. That makes voting easy and secured
                    </p>
                    <br>
                    <p>
                        Sed eget orci eleifend enim mattis suscipit. Suspendisse potenti nonipsum.
                        Sed eget orci eleifend enim mattis suscipit. Suspendisse potenti nonipsum.</p>
                </div>
                <div class="col-md-6 text-center">
                    <div class="p-t-40">
                        <span class=""><img src="library/assets/home/img/page/logo.png" class="img-responsive"></span>
                    </div>
                </div>
            </div>
            <div class="row p-t-b-40 responsive">
            <div class="col-xs-6 col-sm-6">
                <img src="library/assets/home/img/page/ballot.png" class="img-responsive">
            </div>
                <div class="col-xs-6 col-sm-6">
                    <div class="service-featured-content">
                        <h3>FEATURES</h3>
                        <ul class="iconList p-t-20 ">
                            <li>Real Time Voting System</li>
                            <li>Real TIme Vote Count</li>
                            <li>Real Time Notification</li>
                            <li>Unlimited Contest Categories.</li>
                            <li>Unlimited Users</li>
                            <li>Top Notch Security</li>
                        </ul>
                        <br>
                        <a href="<?php echo $voterlogin ;?>" class="btn btn-success btn-lg ">Start Voting</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



<?php include "library/include/home/footer.php"; ?>

</body>
</html>
