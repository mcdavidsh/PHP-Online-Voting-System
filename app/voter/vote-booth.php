<?php
session_start();
include "../../library/config/dbconn.php";
include "../../library/config/constants.php";

if(strlen($vtlogin)==0)
{
    header("location:../index.php");
}

else {
if (isset($_POST['submit'])) {
    $catname= $_POST['cat-name'];
    $catdesc= $_POST['cat-desc'];
    $id=intval($_GET['id']);
    $query=mysqli_query($con, "update contestcat set catname='$catname', catdesc='$catdesc' where id='$id'");
    if (!$query){
        $errormsg = '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Error updating contest category. Check and try again</div>';
    }
    else {
        $successmsg = '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Contest Category Successfully updated.</div>';
    }
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
<div class="app app-default" style="overflow-y: scroll; min-height: 900px ; ">

    <?php include "../../library/include/app/nav.php"; ?>

    <div class="app-container">


        <?php include "../../library/include/app/topnav.php"; ?>
                <div class="row">

                           <div class="col-xs-12">

                               <div class="title h3 disabled p-b-100">
                                   <?php
                                   $id=intval($_GET['id']);
                                   $trt=mysqli_query($con, "select catname from contestcat where id=$id");
                                   $row=mysqli_fetch_array($trt);
                                   ?>
                                   <?php
                                   echo $row['catname'];
                                   ?></div>

                               <?php


                               $query = mysqli_query($con,"select contestcat.id , parties.partyname, parties.partylogo, contestcat.catname, contestcat.catdesc, contestcat.status, contestcat.partyactive, contestreg.id as ctregid, contestreg.partyid, contestreg.ctcatid, contestreg.contestantid, contestreg.ctposter, contestreg.ctmsg, contestreg.status, contestant.fullname from contestcat left join contestreg on contestcat.id = contestreg.ctcatid left join contestant on contestreg.contestantid = contestant.id left join parties on contestreg.partyid=parties.id where contestcat.id = $id");



                               while($rows=mysqli_fetch_array($query)){
                                   ?>
                    <div class="col-md-4" style="padding: 20px; text-align: center;">

                        <div class="card card-mini shadow vt-card">

                            <a href="<?php echo "vote-details.php?id=".$rows['ctregid'];?>">

                            <div class="text-center vt-card-img" >
                                <div class="card-img"">
                                    <img src="../../library/assets/app/uploads/<?php echo $rows["partylogo"];?>" class="d-block w-100" alt="" style="height: 150px;">
                                </div>
                            </div>
                                <img src="../../library/assets/app/uploads/<?php // echo $row['cposter'];?>" class="d-block w-100" alt="">
                            <div class="card-body text-center">
                                <div class="vt-vote-cat"><?php echo $rows['fullname'];?></div> <span class="label label-success d-block p"><?php echo $rows['partyname'];?></span>
                            </div
                            </a>
                        </div>

                    </div>
                               <?php }?>
                   </div>

                </div>
        <?php include "../../library/include/app/footer.php" ?>
        <?php }?>

