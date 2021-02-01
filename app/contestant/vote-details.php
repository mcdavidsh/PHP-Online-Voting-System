<?php
include "../../library/config/dbconn.php";
include "../../library/config/constants.php";
session_start();
if(strlen($vtlogin)==0)
{
    header("location:../../login.php");
}

else {
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
<div class="app app-default" style="overflow-y: scroll; height: 500px;">

    <?php include "../../library/include/app/nav.php"; ?>

    <div class="app-container">

        <?php include "../../library/include/app/topnav.php"; ?>

        <!--Notification-->
        <div class="row">
            <div class="col-md-6 shadow-lg">
                <div class="card card-mini">
                    <div class="card-header">
                        <div class="h3 card-title"> Contentestant Message</div>
                    </div>
                    <div class="card-body">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item vt-poster-item active">
                                    <img class="d-block w-100" src="../../library/assets/app/assets/images/pages/voter/poster-3.jpg" alt="First slide">
                                </div>
                                <div class="carousel-item vt-poster-item">
                                    <img class="d-block w-100" src="../../library/assets/app/assets/images/pages/voter/poster-1.jpg" alt="Second slide">
                                </div>
                                <div class="carousel-item vt-poster-item">
                                    <img class="d-block w-100" src="../../library/assets/app/assets/images/pages/voter/poster-2.jpg" alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 shadow-lg">
                <div class="card card-mini">

                    <div class="card-header">
                        <div class="h3 card-title">Voting Booth</div>
                    </div>
                    <div class="card-body">
                        <div class="counter text-center" style="font-size: 18px;">
                   <span class="label label-warning">200 Votes</span> of <span class="label label-success">1200 Votes</span>
                        </div>
                        <br>
                        <form class="my-5">
                            <div class="row">
                                <div class="col-md-12 col-sm-6">
<!--                                    <label>Select Contestant</label>-->
                                    <select class="select2">
                                        <option value="AL">Select Contestant</option>
                                        <option value="AL">Abuakar Atiku - PDP</option>
                                        <option value="WY">Peter Obi - APC</option>
                                    </select>
                                </div>

                            </div>
                            <br>
                            <div class="py-lg-5">
                                <div class="checkbox">
                                    <input type="checkbox" id="checkbox1">
                                    <label for="checkbox1">
                                       I, Mark Okon Vote According to <a data-toggle="modal" data-target="#myModal">Voting Laws</a>
                                    </label>
                                </div>
                            </div>
                            <br>
                            <div class="btn-wrapper btn-block">
                                <button class="btn btn-lg btn-block btn-success">Vote</button>
                                <button class="btn btn-danger">Exit</button>

                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-success">Save changes</button>
                </div>
            </div>
        </div>
    </div>

        <?php include "../../library/include/app/footer.php" ?>
<?php }?>
