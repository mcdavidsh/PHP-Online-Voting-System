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
        $partname= $_POST['part-name'];
        $partdesc= $_POST['part-desc'];
        $partlogo = $_FILES['part-logo']['name'];
        $id=intval($_GET['id']);

        move_uploaded_file($_FILES["part-logo"]["tmp_name"],"../../library/assets/app/uploads/".$_FILES["part-logo"]["name"] );
        $query=mysqli_query($con, "update parties set partyname='$partname', partydesc='$partdesc', partylogo='$partlogo' where id='$id'");
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
                            Edit Party
                        </div>
                    </div> <?php
                    $id=intval($_GET['id']);
                    $cts= mysqli_query($con, "select * from parties where id='$id'");
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

                        <form method="post" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">

                            <div class="form-group">
                                <div class="col-md-6">
                                <label class="form-control-label">Party Logo</label>
                                <?php
                                $partyimg = $row['partylogo'];
                                if ($partyimg=="") echo '<div class="label label-danger">No Logo Found</div>'; else { echo "<img src='../../library/assets/app/uploads/$partyimg' class='img-thumbnail img-circle img-responsive img-rounded' width='70'>";};?>
                                <input type="file" name="part-logo" value="" class="form-control" required>
                            </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                <label class="form-control-label">Party Name</label>
                                <input type="text" name="part-name" value="<?php echo $row['partyname'];?>" class="form-control" placeholder="Enter Party Name">
                            </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                <label class="form-control-label">Party Description</label>
                                <textarea name="part-desc" rows="5" class="form-control"><?php echo $row['partydesc'];?></textarea>
                            </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-sm btn-success">Update</button>
                        </form>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
        <?php include "../../library/include/app/footer.php" ?>
        <?php }?>

