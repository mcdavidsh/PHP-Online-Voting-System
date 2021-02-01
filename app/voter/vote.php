<?php
session_start();
include "../../library/config/dbconn.php";
include "../../library/config/constants.php";

if (strlen($vtlogin) == 0)
{
    header("location:../../login.php");
}
else
{
$status = 1;
$query_value = "select * from voters where profile=$status and (email='" . $_SESSION['vtlogin'] . "' or phone='" . $_SESSION['vtlogin'] . "')";
$query = mysqli_query($con, $query_value);
$row = mysqli_fetch_array($query);

if ($row['profile'] == NULL or $row['profile'] == "") {

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

        <div class="row">
            <div class="col-xs-12">
                <div class="timeline">
                    <div class="content-heading __center">
                        <div class="title">Active Elections</div>
                        <div class="description">These are elections that you can vote in.</div>
                    </div>
                    <dl>
                        <div class='content-heading __center text-right ' style="margin-top:-10px;">
                            <div class='title'>Inactive Elections</div>
                            <div class='description'>These are elections have not started or have ended.</div>
                        </div>
                        <?php
                        $query = mysqli_query($con, "select contestcat.*,contestreg.ctcatid  as ctid, contestreg.contestantid as contestid from contestcat  left join contestreg on contestcat.id = contestreg.ctcatid group  by contestcat.id");
                        while ($rows = mysqli_fetch_array($query)) {
                            ?>
                            <?php
                            $id = $rows['id'];
                            $ctcatid = $rows['catname'];
                            $contid = count($rows['contestid']);
                            $stats = $rows['status'];
                            $ctid = $rows['ctid'];
                            if ($stats == 0) {
                                echo "<dt class='disabled item pos-right'>
                               <div class='marker-danger'></div>
                                <div class='event'>
                                    <div class='event-body'><div class='text-dark h4'>
   $ctcatid                                   
</div>
      </div>
                                </div>
                            </dt>";
                            } else {

                                echo "
<dt class= 'item'>
                                <div class='marker'></div>
                                <div class='event' style='cursor:pointer;'>
                                    <div class='event-body'>
                                 <a class='text-dark h4' href='vote-booth.php?id=$ctid'>$ctcatid
                               
                              <div class='label label-primary pull-right'> $contid Contestant(s)</div>
                                </a>
                                    </div>
                                </div>
                            </dt>";
                            }
                            ?>
                        <?php } ?>
                    </dl>

                </div>
            </div>
        </div>

        <!--        <div class="row">-->
        <!---->
        <!--                   <div class="col-xs-12">-->
        <!--                       <div class="title h3 disabled p-b-40">Active Election</div>-->
        <!--                       --><?php
        //                       $query = mysqli_query($con,"select * from contestcat");
        //                       while($rows=mysqli_fetch_array($query)){
        //
        ?>
        <!--            <div class="col-md-4">-->
        <!---->
        <!--                <div class="card card-mini shadow vt-card">-->
        <!---->
        <!--                    <a href="#">-->
        <!---->
        <!--                    <div class="text-center vt-card-img" >-->
        <!--                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">-->
        <!--                            <div class="carousel-inner">-->
        <!--                                <div class="carousel-item vt-carousel-item active">-->
        <!---->
        <!--                                    <img src="../../library/assets/app/uploads/-->
        <?php //echo $row['partylogo'];
        ?><!--" class="d-block w-100" alt="">-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!---->
        <!--                        </div>-->
        <!--                    </div>-->
        <!---->
        <!--                    <div class="card-body text-center">-->
        <!--                        <div class="vt-vote-cat">--><?php //echo $rows['catname'];
        ?><!--</div> <span class="label label-success d-block p">--><?php //echo $rows['status'];
        ?><!--</span>-->
        <!--                    </div-->
        <!--                    </a>-->
        <!--                </div>-->
        <!---->
        <!--            </div>-->
        <!--                       --><?php //}
        ?>
        <!--           </div>-->
        <!---->
        <!--        </div>-->


        <?php include "../../library/include/app/footer.php" ?>
        <?php } ?>