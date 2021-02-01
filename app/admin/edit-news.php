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
        $id=intval($_GET['id']);
        $catname= $_POST['title'];
        $catdesc= $_POST['body'];
        $image = $_FILES['image']['name'];

        move_uploaded_file($_FILES["image"]["tmp_name"], "../../library/assets/app/uploads/".$_FILES["image"]["name"]);

        $query=mysqli_query($con, "update news set title='$catname', body='$catdesc', image='$image' where id='$id'");
        if (!$query){
            $errormsg = '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Error updating news. Check and try again</div>';
        }
        else {
            $successmsg = '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>News Successfully updated.</div>';
        }
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
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                      Edit News
                        </div>
                    </div> <?php
                    $id=intval($_GET['id']);
                    $cts= mysqli_query($con, "select * from news where id='$id'");
                    while($row = mysqli_fetch_array($cts)){;
                    ?>

                    <div class="card-body">
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
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <?php
                                    $img = $row['image'];
                                    if ($img==""){?>
                                        <div class="label label-danger">No Image Found</div> -
<label>Add Featured Image</label>
<input type="file" class="form-control" name="image" value="<?php echo $img;?>">
';
                                    <?php }
                                    else {
                                    ?>
                                        <label class="form-control-label">News Image</label>
                                    <img src="../../library/assets/app/uploads/<?php echo $row['image'];?>" class="img-responsive img-fluid img-thumbnail" width="250">
<br>
                                        <input type="file" class="form-control" name="image" value="<?php echo $img;?>">
                                 <?php } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="form-control-label">News Title</label>
                                    <input class="form-control" type="text" value="<?php echo $row['title'];?>" placeholder="Enter Category Name" name="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="form-control-label">News Body</label>
                                    <textarea class="form-control" rows="8" value="" placeholder="Enter Category Description" name="body"><?php echo $row['body'];?></textarea>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success btn-lg">Update</button>

                        </form>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
        <?php include "../../library/include/app/footer.php" ?>
        <?php }?>

