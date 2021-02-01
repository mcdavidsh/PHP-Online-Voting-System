<?php
session_start();
include "../../library/config/dbconn.php";
include "../../library/config/constants.php";

if (strlen($adlogin) == 0)
{
    header("location:../index.php");
}

else {
    $usern="";
if (isset($_POST['submit'])) {

    $profilepix = $_FILES['profilepix']['name'];
    $catname = $_POST['username'];
    $catdesc = $_POST['fullname'];
    $pwd = md5($_POST['pass']);

    move_uploaded_file($_FILES["profilepix"]["tmp_name"],"../../library/assets/app/uploads/".$_FILES["profilepix"]["name"] );

    $chk="select * from manager where username='$usern'";
    $result=mysqli_query($con, $chk);
    if (mysqli_num_rows($result) > 0){
        $errormsg = '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Username Already Exists. Check and try again.</div>';
    }
    else{
    $query = mysqli_query($con, "insert into manager(username,fullname,password,profilepix) values ('$catname', '$catdesc','$pwd','$profilepix') ");


    if (!$query) {
        $errormsg = '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Error creating Admin. Please check and try again.</div>';
    } else {
        $successmsg = '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Admin created successfully.</div>';
    }
}
}
if (isset($_GET['del'])) {
    mysqli_query($con, "delete from manager where id = '" . $_GET['id'] . "'");
    $successmsg = '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Admin deleted.</div>';
}

?>

<!DOCTYPE html>
<html>
<head>
    <?php
    include "../../library/include/app/ad-header.php";
    ?>
    <style>
        /*
 * FilePond Custom Styles
 */

        .filepond--drop-label {
            color: #4c4e53;
        }

        .filepond--label-action {
            text-decoration-color: #babdc0;
        }

        .filepond--panel-root {
            background-color: #edf0f4;
        }


        /**
         * Page Styles
         */

        .filepond--root {
            width: 170px;
            margin: 0 auto;
        }

    </style>
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
                if (isset($errormsg)) {
                    echo $errormsg;
                }
                unset($errormsg);
                ?>
                <div class="card">
                    <div class="card-body app-heading">
                        <div class="app-title">
                            <span data-toggle="modal" data-target="#add-category"
                                  style="border: 1px solid #29c75f !important; padding: 20px; color: #18aa4a; font-size: 20px; cursor: pointer;"><i
                                        class="fa fa-plus"></i> Add New</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="add-category" tabindex="-1" role="dialog" aria-labelledby="Add Contest Category">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add New Admin</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="file" class="form-control" name="profilepix" accept=".png, .jpg, .jpeg"/>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Enter Username">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Fullname</label>
                                <input type="text" name="fullname" class="form-control" placeholder="Enter Fullname">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Password</label>
                                <input type="password" name="pass" class="form-control" placeholder="Enter Password"
                                       id="shpwd">
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox2" onclick="shPwd()">
                                <label for="checkbox2">
                                    Show Password
                                </label>
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
                    $query = mysqli_query($con, "select * from manager");
                    $num1 = mysqli_num_rows($query);
                    ?>
                    <div class="card-body text-center vt-box">
                        <div class="text-decoration-none"><?php echo htmlentities($num1); ?></div>

                        <div class="text-capitalize ">Total Admin</div>
                    </div>
                </a>

            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">

            </div>
            <div class="row p-t-50" style="padding: 20px;">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            All Administrator
                        </div>
                        <div class="card-body no-padding">
                            <table class="datatable table table-striped primary" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Username</th>
                                    <th>Fullname</th>
                                    <th>Date Created</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <?php
                                $cts = mysqli_query($con, "select * from manager");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($cts)) {
                                    ;
                                    ?>
                                    <tbody>
                                    <tr>
                                        <td><?php echo $cnt; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['fullname']; ?></td>
                                        <td><?php echo $row['dateoc']; ?></td>
                                        <td>
                                            <a href="admin.php?id=<?php echo $row['id'] ?>&del=delete"
                                               onClick="return confirm('Are you sure you want to delete?')"
                                               class="label label-danger"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <?php $cnt = $cnt + 1; ?>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <?php include "../../library/include/app/footer.php" ?>

            <?php } ?>



