<?php
session_start();
include "../../library/config/dbconn.php";
include "../../library/config/constants.php";

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

        header("location:completeprofile.php");
    }


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
    include "../../library/include/app/header.php";
    ?>

</head>
<body>
<div class="app app-default" style="overflow-y: scroll; min-height: 700px;" >

    <?php include "../../library/include/app/nav.php"; ?>

    <div class="app-container" id="app" data-state="closed">

        <?php include "../../library/include/app/topnav.php"; ?>



        <!--    Notification-->

        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="vt-notice">
                        <div class="row">
                            <div class="col-md-12 card-header">
                                <?php $query=mysqli_query($con,"select fullName from voters where email='".$_SESSION['vtlogin']."' or phone='".$_SESSION['vtlogin']."'");
                               while($row=mysqli_fetch_array($query))
                               {
                                ?>
                                <div class="col-md-6 vt-card-title"><?php echo $greetings;?>,
                                    <?php echo ucwords($row['fullName']);?>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-5"></div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"  data-toggle="tooltip" data-placement="bottom" title="Election in progress">
                <a class="card">
                    <div class="badge badge-warning">Ongoing Election(s)</div>

<?php $status= 1;
$qt=mysqli_query($con, "select * from contestcat where status = '$status'");
 $num= mysqli_num_rows($qt);{
?>
                    <div class="card-body text-center vt-box">
                        <div class="text-decoration-none"><?php echo $num;?></div>

                    </div>
                    <?php }?>
                </a>

            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <a class="card" href="<?php echo $vote;?>">
                    <div class="card-body text-center vt-box">
                        <i class="fa fa-inbox"></i>
                        <div class="text-capitalize ">Vote</div>
                    </div>
                </a>

            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" data-toggle="tooltip" data-placement="bottom" title="This is Elections you have voted in.">
                <a class="card">
                    <div class="badge badge-success">Participated Election(s)</div>
                    <?php
                    $signed=1;
                    $pt=mysqli_query($con, "select votes.*, contestant.id, contestant.fullname, parties.id, parties.partyname, contestcat.id, contestcat.catname from votes left join contestant on votes.contestantid=contestant.id left join parties on contestant.partyid=parties.id left join contestcat on votes.catid=contestcat.id where votes.voterid='".$_SESSION['id']."'");
                    $num= mysqli_fetch_array($pt)
                    ?>
                    <div class="card-body text-center d-block vt-box" style="font-size: 20px;">
                        <?php if ($num['sign']=="" or 0){?>
                        <div class="text-decoration-none text-danger">You haven't Voted</div>
                        <?php } else{ ?>
                        <div class="text-decoration-none text-danger">You Voted for <span class="text-success" style="font-weight: 500;"><?php echo $num['partyname'] .' '. $num['fullname'] ?></span></div>
                        <div class="text-center">  <?php echo $num['catname']; ?></div>
                    </div>

<?php } ?>
                </a>

            </div>
        </div>




        <?php
        include "../../library/include/app/footer.php";
        ?>


<?php }?>
