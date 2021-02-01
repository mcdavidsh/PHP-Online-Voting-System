<?php
session_start();
include "../../library/config/dbconn.php";
include "../../library/config/constants.php";

if(strlen($vtlogin)==0)
{
    header("location:../../login.php");
}
else
{
$status =1;
$query_value = "select * from voters where profile=$status and (email='".$_SESSION['vtlogin']."' or phone='".$_SESSION['vtlogin']."')" ;
$query = mysqli_query($con,$query_value);
$row=mysqli_fetch_array($query);

if ($row['profile']== NULL or $row['profile']==""){

    header("location:complete-profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include "../../library/include/app/header.php";
    ?>
</head>
<body>
<div class="app app-default">

    <?php include "../../library/include/app/nav.php"; ?>

    <div class="app-container">

        <?php include "../../library/include/app/topnav.php"; ?>

        <!--Notification-->
        <div class="row">
            <div class="col-md-4">
                <div class="card card-mini shadow vt-card">
                    <a href="#">

                    <div class="text-center vt-card-img" >
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item vt-carousel-item active">
                                    <img src="../../library/assets/app/assets/images/pages/pdp.png" class="d-block w-100" alt="">
                                </div>
                                <div class="carousel-item vt-carousel-item">
                                    <img src="../../library/assets/app/assets/images/pages/apc.png" class="d-block w-100" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <div class="vt-vote-cat">Presidential Election</div> <span class="label label-success d-block p">20 Votes</span>
                    </div
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-mini shadow vt-card">
                    <a href="#">

                        <div class="text-center vt-card-img" >
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item vt-carousel-item">
                                        <img src="../../library/assets/app/assets/images/pages/pdp.png" class="d-block w-100" alt="">
                                    </div>
                                    <div class="carousel-item active vt-carousel-item">
                                        <img src="../../library/assets/app/assets/images/pages/apc.png" class="d-block w-100" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <div class="vt-vote-cat">Governorship Election</div> <span class="label label-success d-block p">1000 Votes</span>
                        </div
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-mini shadow vt-card">
                    <a href="#">

                        <div class="text-center vt-card-img" >
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item  vt-carousel-item active">
                                        <img src="../../library/assets/app/assets/images/pages/pdp.png" class="d-block w-100" alt="">
                                    </div>
                                    <div class="carousel-item  vt-carousel-item">
                                        <img src="../../library/assets/app/assets/images/pages/apc.png" class="d-block w-100" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <div class="vt-vote-cat">President Election</div> <span class="label label-success d-block p">20 Votes</span>
                        </div
                    </a>
                </div>
            </div>
        </div>


        <?php include "../../library/include/app/footer.php" ?>
<?php }?>
