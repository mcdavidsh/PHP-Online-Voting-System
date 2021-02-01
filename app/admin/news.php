<?php
session_start();
include "../../library/config/dbconn.php";
include "../../library/config/constants.php";

if(strlen($adlogin)==0)
{
    header("location:../index.php");
}

else {
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $image = $_FILES['image']['name'];

        move_uploaded_file($_FILES["image"]["tmp_name"], "../../library/assets/app/uploads".$_FILES["image"]["name"]);

        $query = mysqli_query($con, "insert into news(title,body,image) values ('$title','$body','$image')");

        if (!$query) {
            $successmsg = '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>News Posted successfully.</div>';
        } else {
            $errormsg = '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Error Occured. Please check and try again.</div>';

        }
    }
if(isset($_GET['del']))
{
    mysqli_query($con,"delete from news where id = '".$_GET['id']."'");
    $successmsg= '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>News deleted.</div>';
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
                <div class="card">
                    <div class="card-body app-heading">
                        <div class="app-title">
                            <span data-toggle="modal" data-target="#add-news" style="border: 1px solid #29c75f !important; padding: 20px; color: #18aa4a; font-size: 20px; cursor: pointer;"><i class="fa fa-plus"></i> Add New</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="add-news" tabindex="-1" role="dialog" aria-labelledby="Add Contest Category">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add News</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="form-control-label">Featured Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Title">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Body</label>
                                <textarea name="body" rows="5" class="form-control" placeholder="Enter Body"></textarea>
                            </div>
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-sm btn-success">Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--        Modal ends-->

        <div class="row p-t-50">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        All Voters
                    </div>
                    <div class="card-body no-padding">
                        <table class="datatable table table-striped primary" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <?php
                            $cts= mysqli_query($con, "select * from news");

                            $cnt=1;
                            while($row = mysqli_fetch_array($cts)){;
                                ?>
                                <tbody>
                                <tr>
                                    <td><?php echo $cnt;?></td>
                                    <td><?php echo $row['title'];?></td>
                                    <td><?php echo $row['body'];?></td>
                                    <td><?php echo $row['date'];?></td>
                                    <td>
                                        <a  href="edit-news.php?id=<?php echo $row['id']?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="news.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
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
        <div class="modal fade" id="edit-news" tabindex="-1" role="dialog" aria-labelledby="Add Contest Category">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add Notification</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="form-control-label">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Title">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Body</label>
                                <textarea name="body" rows="5" class="form-control" placeholder="Enter Body"></textarea>
                            </div>
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-sm btn-success">Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include "../../library/include/app/footer.php" ?>
        <?php }?>

