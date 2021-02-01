<?php
session_start();
include "../../library/config/dbconn.php";
include "../../library/config/constants.php";

if(strlen($adlogin)==0)
{
    header("location:../index.php");
}

else {
if (isset($_POST['submit']))
{
    $catname = $_POST ['cat-name'];
    $catdesc = $_POST ['cat-desc'];
    $status= 0;
    $query = mysqli_query($con, "insert into contestcat(catname,catdesc,status) values ('$catname', '$catdesc','$status') ");

    if (!$query){
        $errormsg = '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Error adding contest category. Please check and try again.</div>';
    }

    else{
        $successmsg= '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Contest category added successfully.</div>';
    }
}
if(isset($_GET['del']))
{
    mysqli_query($con,"delete from contestant where id = '".$_GET['id']."'");
    $successmsg= '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Contestant deleted.</div>';
}
if(isset($_GET['ap']))
{
    $stats=1;
    $id=intval($_GET['id']);
    $ct= mysqli_query($con, "select * from contestant_tmp where id='$id'");
    $row=mysqli_fetch_array($ct);

    $id= $row['id'];
    $fullname= $row['fullname'];
    $email =$row['email'];
    $phone =$row['phone'];
    $partyid=$row['partyid'];
    $password =md5($row['password']);

    $ap=mysqli_query($con,"insert into contestant(id,fullname,email,phone,password,partyid) values('$id','$fullname','$email','$phone','$password','$partyid') ");

    if ($ap){

       $dele=mysqli_query($con, "delete from contestant_tmp where id ='".$_GET['id']."'");
    }

        $successmsg= '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Contestant has been appoved successfully</div>';
}
if(isset($_GET['rv']))
{
    mysqli_query($con,"delete from contestant_tmp where id = '".$_GET['id']."'");
    $successmsg= '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Contestant requesting approval has been removed.</div>';
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
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <a class="card">

                    <?php
                    $query= mysqli_query($con, "select * from contestant");
                    $num1=mysqli_num_rows($query);
                    ?>
                    <div class="card-body text-center vt-box">
                        <div class="text-decoration-none"><?php echo htmlentities($num1);?></div>

                        <div class="text-capitalize ">Total Contestants</div>
                    </div>
                </a>

            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <a class="card">

                    <?php
                    $query= mysqli_query($con, "select * from contestant");
                    $num1=mysqli_num_rows($query);
                    ?>
                    <div class="card-body text-center vt-box">
                        <div class="text-decoration-none"><?php echo htmlentities($num1);?></div>

                        <div class="text-capitalize ">Approved</div>
                    </div>
                </a>

            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <a class="card">

                    <?php
                    $query= mysqli_query($con, "select * from contestant_tmp");
                    $num1=mysqli_num_rows($query);
                    ?>
                    <div class="card-body text-center vt-box">
                        <div class="text-decoration-none"><?php echo htmlentities($num1);?></div>

                        <div class="text-capitalize ">Not Approved</div>
                    </div>
                </a>

            </div>
         <div class="row p-t-50" style="padding: 20px;">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-header">
Waiting Approval
                        </div>
                        <div class="card-body no-padding">
                            <table class="datatable table table-striped primary" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                    <tbody>
                                    <?php
                                    $cts = mysqli_query($con, "select * from contestant_tmp");
                                    $cnt = 1;
                                    while($row = mysqli_fetch_array($cts)){
                                    ?>
                                    <tr>
                                        <td><?php echo $cnt;?></td>
                                                                                <td><?php echo $row['fullname'];?></td>
                                                                                <td><?php if( $row['status']==1) echo '<div class="badge badge-warning">Waiting Approval</div>';?></td>
                                        <td>
                                            <a href="contestants.php?id=<?php echo $row['id']?>&ap=approve" onClick="return confirm('Do want to approve <?php echo $row['fullname'] ?>?')" class="label label-success" style=""><i class="fa fa-thumbs-up"></i> Approve</a>
                                            <a href="contestants.php?id=<?php echo $row['id']?>&rv=remove" onClick="return confirm('Are you sure you want to remove <?php echo $row['fullname'] ?>?')" class="label label-danger"><i class="fa fa-trash"></i> Remove</a>
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
            <div class="row p-t-50" style="padding: 20px;">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-header">
                           Approved
                        </div>
                        <div class="card-body no-padding">
                            <table class="datatable table-responsive table table-striped primary" cellspacing="0" width="100%">
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
                                $cts= mysqli_query($con, "select * from contestant");
                                $cnt=1;
                                while($row = mysqli_fetch_array($cts)){;
                                    ?>
                                    <tbody>
                                    <tr>
                                        <td><?php echo $cnt;?></td>
                                        <td><?php echo $row['fullname'];?></td>
                                        <td><?php echo $row['email'];?></td>
                                        <td><?php if( $row['status']==1) echo '<div class="badge badge-success">Active</div>'; else echo '<div class="badge badge-success">Active</div>';?></td>
                                        <td>
                                            <a href="contestants.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete <?php echo $row['fullname'] ?>?')" class="label label-danger"><i class="fa fa-trash"></i> Delete</a>
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



