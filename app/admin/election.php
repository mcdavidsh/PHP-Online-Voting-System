<?php
session_start();
include "../../library/config/dbconn.php";
include "../../library/config/constants.php";

if(strlen($adlogin)==0)
{
    header("location:../index.php");
}

else {

if(isset($_GET['st']))
{
    mysqli_query($con,"update contestcat set status=1  where id = '".$_GET['id']."'");
    $successmsg= '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>You have started the election successfully.</div>';
}
if(isset($_GET['stp']))
{
    mysqli_query($con,"update contestcat set status=0  where id = '".$_GET['id']."'");
    $successmsg= '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>You have stopped the election.</div>';
}

?>

<!DOCTYPE html>
<html>
<head>
    <?php
    include "../../library/include/app/ad-header.php";
    ?>
</head>
<body>
<div class="app app-default" style="overflow-y: scroll; min-height: 900px ; ">

    <?php include "../../library/include/app/ad-nav.php"; ?>

    <div class="app-container">
        <?php include "../../library/include/app/ad-topnav.php"; ?>


        <div class="row">
            <div class="col-lg-12">
                <?php
                if (isset($successmsg)) {
                    echo $successmsg;
                }
                unset($successmsg);
                ?>
                <?php
                if (isset($errormsg)){
                    echo $errormsg;}
                unset($errormsg);
                ?>
        </div>
        </div>
        <div class="row">
            <div class=" col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <a class="card">

                    <?php
                    $query= mysqli_query($con, "select * from contestcat");
                    $num1=mysqli_num_rows($query);
                    ?>
                    <div class="card-body text-center vt-box">
                        <div class="text-decoration-none"><?php echo htmlentities($num1);?></div>

                        <div class="text-capitalize ">Total Contests</div>
                    </div>
                </a>

            </div>
            <div class=" col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <a class="card">

                    <?php
                    $query= mysqli_query($con, "select * from contestreg");
                    $num1=mysqli_num_rows($query);
                    ?>
                    <div class="card-body text-center vt-box">
                        <div class="text-decoration-none"><?php echo htmlentities($num1);?></div>

                        <div class="text-capitalize ">Total Registered Contests</div>
                    </div>
                </a>

            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <a class="card">

                    <?php
                    $stat=1;
                    $query= mysqli_query($con, "select * from contestcat where status='$stat'");
                    $num1=mysqli_num_rows($query);
                    ?>
                    <div class="card-body text-center vt-box">
                        <div class="text-decoration-none"><?php echo htmlentities($num1);?></div>

                        <div class="text-capitalize ">Active Elections</div>
                    </div>
                </a>
            </div>
        </div>
            <div class="row" style="padding: 20px;">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            All Contests
                        </div>
                        <div class="card-body no-padding">
                            <table class="datatable table table-striped primary" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <?php
                                $cts= mysqli_query($con, "select * from contestcat");
                                $cnt=1;
                                while($row = mysqli_fetch_array($cts)){;
                                    ?>
                                    <tbody>
                                    <tr>
                                        <td><?php echo $cnt;?></td>
                                        <td><?php echo $row['catname'];?></td>
                                        <td><?php echo $row['catdesc'];?></td>
                                        <td><?php if( $row['status']==0) echo '<div class="badge badge-danger">Not active</div>'; else echo '<div class="badge badge-success">In Progress</div>';?></td>
                                        <td>
                                           <?php
                                         $id=$row['id'];
                                         $stats = $row['status'];
                                            if($stats==1) echo "<a href='election.php?id=$id&stp=stop' onClick=\"return confirm('Do you want to end election?')\" class='label label-danger'><i class='fa fa-stop'></i> Stop</a>"; else echo "<a href='election.php?id=$id&st=start' onClick=\"return confirm('Do you want to start election?')\" class='label label-success'><i class='fa fa-key'></i> Start</a>";
                                           ?>
                                        </td>
                                    </tr>
                                    <?php $cnt=$cnt+1;  ?>
                                    </tbody>
                                <?php }?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <?php include "../../library/include/app/footer.php" ?>
            <?php }?>



