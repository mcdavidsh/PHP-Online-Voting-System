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
        $catname = ($_POST ['cat-name']);
        $catdesc = ($_POST ['cat-desc']);
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
    mysqli_query($con,"delete from contestcat where id = '".$_GET['id']."'");
    $successmsg= '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Contest category deleted.</div>';
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
<div class="app app-default" >

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
                <div class="card">
                    <div class="card-body app-heading">
                        <div class="app-title">
                            <span data-toggle="modal" data-target="#add-category" style="border: 1px solid #29c75f !important; padding: 20px; color: #18aa4a; font-size: 20px; cursor: pointer;"><i class="fa fa-plus"></i> Add New</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="add-category" tabindex="-1" role="dialog" aria-labelledby="Add Contest Category">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add Contest Category</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="form-control-label">Category Name</label>
                                <input type="text" name="cat-name" class="form-control" placeholder="Enter Category Name">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Category Description</label>
                                <textarea name="cat-desc" rows="5" class="form-control"></textarea>
                            </div>
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-sm btn-success">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<!--        Modal ends-->
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">

            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
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
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">

        </div>
        </div>
            <div class="row p-t-50" style="padding: 20px;">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-header">
                         Available Contests
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
                                        <a href="edit-contest.php?id=<?php echo $row['id']?>" class="label label-primary" style="margin:10px;"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="contest-category.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="label label-danger"><i class="fa fa-trash"></i> Delete</a>
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



