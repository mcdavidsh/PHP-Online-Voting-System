<?php
session_start();
include "../../library/config/dbconn.php";
include "../../library/config/constants.php";

if (strlen($ctlogin) == 0)
{
    header("location:../index.php");
}

else {
$ctck = $_SESSION['id'];
if (isset($_POST['submit'])) {
    $party = $_POST['party'];
    $ctcat = $_POST['ctcat'];
    $ctmsg = $_POST['ctmsg'];
    $id = $_SESSION['id'];
    $ctpostcount = count($_FILES['files']['name']);
    for ($i = 0; $i < $ctpostcount; $i++) {

        $ctposter = $_FILES['files']['name'][$i];
        move_uploaded_file($_FILES["files"]["tmp_name"][$i], "../../library/assets/app/uploads/" . $ctposter);
    }
    $qt = mysqli_query($con, "select * from contestreg where contestantid='$ctck'");
    if (mysqli_num_rows($qt) > 0) {
        $errormsg = '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>You are not allowed to register more than one contest!</div>';
    } else {
        $query = mysqli_query($con, "insert into contestreg(partyid,ctcatid,contestantid,ctmsg,ctposter) values ('$party','$ctcat','$id','$ctmsg','$ctpostcount')");

        if (!$query) {
            $errormsg = '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Error updating contest category. Check and try again</div>';
        } else {
            $successmsg = '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>You have Successfully registered for contest.</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <?php
    include "../../library/include/app/ct-header.php";
    ?>
    <style>
        /*Multiple File Upload*/

        .fileinput-button {
            position: relative;
            overflow: hidden;
        }

        .fileinput-button input {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            opacity: 0;
            -ms-filter: "alpha(opacity=0)";
            font-size: 200px;
            direction: ltr;
            cursor: pointer;
        }

        .thumb {
            height: 80px;
            width: 100px;
            border: 1px solid #000;
        }

        ul.thumb-Images li {
            width: 120px;
            float: left;
            display: inline-block;
            vertical-align: top;
            height: 120px;
        }

        .img-wrap {
            position: relative;
            display: inline-block;
            font-size: 0;
        }

        .img-wrap .close {
            position: absolute;
            top: 2px;
            right: 2px;
            z-index: 100;
            background-color: #d0e5f5;
            padding: 5px 2px 2px;
            color: #000;
            font-weight: bolder;
            cursor: pointer;
            opacity: 0.5;
            font-size: 23px;
            line-height: 10px;
            border-radius: 50%;
        }

        .img-wrap:hover .close {
            opacity: 1;
            background-color: #ff0000;
        }

        .FileNameCaptionStyle {
            font-size: 12px;
        }
    </style>
</head>
<body>
<div class="app app-default" style="overflow-y: scroll; min-height: 900px ; ">

    <?php include "../../library/include/app/ct-nav.php"; ?>

    <div class="app-container">


        <?php include "../../library/include/app/ct-topnav.php"; ?>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 text">


            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <a class="card">
                    <div class="badge badge-success ">Active</div>
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


            </div>
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Apply for contest
                        </div>
                    </div> <?php
                    //                    $id=intval($_GET['id']);
                    //                    $cts= mysqli_query($con, "select * from contestcat where id='$id'");
                    //                    while($row = mysqli_fetch_array($cts)){;
                    ?>

                    <div class="card-body">
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
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="form-control-label">Contest Category</label>
                                    <select class="select2" name="ctcat">

                                        <option>Select Contest Category</option>
                                        <?php $pp = mysqli_query($con, "select * from contestcat");
                                        while ($row = mysqli_fetch_array($pp)) {
                                            ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['catname'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="form-control-label">Your party is </label>

                                    <select class="select2" name="party">
                                        <?php $rt = mysqli_query($con, "select contestant.*,parties.partyname as pawn from contestant join parties on parties.id=contestant.partyid where contestant.email='" . $_SESSION['ctlogin'] . "'");
                                        $row = mysqli_fetch_array($rt);
                                        ?>
                                        <option value="<?php echo $row['partyid']; ?>"
                                                selected><?php echo $row['pawn'] ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="form-control-label">Contest Posters</label>
                                    <span class="btn btn-success fileinput-button">
            <span>Select Images</span>
            <input type="file" name="files[]" id="files" class="form-control" multiple
                   accept="image/jpeg, image/png, image/gif,"><br/>
        </span>
                                    <output id="Filelist"></output>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="form-control-label">Contest Message to Voters </label>
                                    <textarea class="form-control" rows="8" placeholder="Enter Category Description"
                                              name="ctmsg"></textarea>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success btn-lg">Update</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
        <?php include "../../library/include/app/footer.php" ?>

