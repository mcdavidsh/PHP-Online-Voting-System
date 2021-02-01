<?php
session_start();
include "../../library/config/dbconn.php";
include "../../library/config/constants.php";

if(strlen($ctlogin)==0)
{
header("location:index.php");
}

else {




$hour      = date('H');
//if ($hour >= 20) {
//    $greetings = "Good Night";
if ($hour > 17) {
    $greetings = "Good Evening";
} elseif ($hour > 11) {
    $greetings = "Good Afternoon";
} elseif ($hour < 12) {
    $greetings = "Good Morning";
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include "../../library/include/app/ct-header.php";
    ?>
</head>
<body>
<div class="app app-default" style="overflow-y: scroll; min-height: 900px ; ">

    <?php include "../../library/include/app/ct-nav.php"; ?>

    <div class="app-container">

        <?php include "../../library/include/app/ct-topnav.php"; ?>

        <!--Notification-->


        <!--    Notification-->

        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                <?php $query=mysqli_query($con,"select fullName from contestant where email='".$_SESSION['ctlogin']."'");
                               while($row=mysqli_fetch_array($query))
                               {
                                ?>
                                <div class="vt-card-title"><?php echo $greetings;?>,
                                    <?php echo ucwords( $row['fullName']);?>
                                    <?php } ?>
                                </div>

                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-5"></div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <a class="card">
                    <div class="badge badge-success">Active</div>
                    <div class="card-body text-center vt-box">
                        <?php $ct = mysqli_query($con, "select contestreg.*,contestcat.catname from contestreg left join contestcat on contestcat.id=contestreg.ctcatid where contestreg.contestantid ='" . $_SESSION['id'] . "'");
                        $nums = mysqli_num_rows($ct);
                        $nae = mysqli_fetch_array($ct);
                        ?>

                        <!--                        <div class="text-decoration-none">--><?php //echo $nums; ?><!--</div>-->

                        <div class="text-capitalize small"> <?php echo $nae['catname'] ?></div>
                    </div>
                </a>

            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <a class="card" href="contest.php">
                    <div class="card-body text-center vt-box">
                        <i class="fa fa-registered"></i>
                        <div class="text-capitalize ">Contest</div>
                    </div>
                </a>

            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" >
                <a class="card">
                    <div class="badge badge-success ">Total Votes</div>
                    <div class="card-body text-center vt-box">
                        <?php $ct=mysqli_query($con, "select * from votes where contestantid ='".$_SESSION['id']."'");
                        $nums=mysqli_num_rows($ct);
                        ?>
                        <div class="text-decoration-none"><?php echo $nums;?></div>
                    </div>
                </a>

            </div>
        </div>


        <?php include "../../library/include/app/footer.php" ?>
<?php }?>
