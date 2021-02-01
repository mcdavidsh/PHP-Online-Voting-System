<?php
session_start();
include "../../library/config/dbconn.php";
include "../../library/config/constants.php";

if(strlen($vtlogin)==0)
{
    header("location:../index.php");
}

else {
  
$id=intval($_GET['id']);
if (isset($_POST['submit'])) {


    $voterid = $_SESSION['id'];
    $voterip = $_SERVER['REMOTE_ADDR'];
    $ctid = $_POST['contestantid'];
    $sign = $_POST['sign'];
    $catid = $_POST['ctcatid'];

    $dt = mysqli_query($con, "select * from votes where voterid='".$_SESSION['id']."' and catid='$catid'");
    if (mysqli_num_rows($dt) > 0) {
        $errormsg = '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Multiple Voting is not allowed.. Vote Once Only accordind to <a data-toggle="modal"  data-target="#votelaw">Voting Law</a> </div>';
    } else {
        $query = mysqli_query($con, "insert into votes(catid,voterid,voterip,contestantid,sign) values ('$catid','$voterid','$voterip','$ctid','$sign')");
        if (!$query) {
            $errormsg = '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Error Occured. Check and try again</div>';
        } else {
            $successmsg = '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Congratulations!! You have voted successfully</div>';
        }
        $sign = 1;
        $check = mysqli_query($con, "select * from votes where sign=$sign");
        $ck = mysqli_fetch_array($check);
        if ($ck['sign'] == 0) {
            $errormsg = '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>You cant vote for this category more than once</div>';
        }
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
<?php
$id=intval($_GET['id']);

$query = mysqli_query($con,"select contestcat.id , parties.partyname, parties.partylogo, contestcat.catname, contestcat.catdesc, contestcat.status, contestcat.partyactive, contestreg.id, contestreg.partyid, contestreg.ctcatid, contestreg.contestantid, contestreg.ctposter, contestreg.ctmsg, contestreg.status, contestant.fullname from contestcat left join contestreg on contestcat.id = contestreg.ctcatid left join contestant on contestreg.contestantid = contestant.id left join parties on contestreg.partyid=parties.id where contestreg.id = $id");


while($rows=mysqli_fetch_array($query))
{
?>
            <div class="col-md-6 shadow-lg">
                <div class="card card-mini">
                    <div class="card-header">
                        <div class="h3 card-title"> <?php echo $rows['fullname'];?> - <span class="text-success"><?php echo $rows['ctmsg'];?></span></div>

                    </div>
                    <div class="card-body">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php $posters =$rows['ctposter'];
                                echo   "<div class='carousel-item vt-poster-item active'>
                                 
                                    <img class='d-block w-100' src='../../library/assets/app/uploads/$posters'>
                                </div>";?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 shadow-lg">
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
                <div class="card card-mini">

                    <div class="card-header">
                        <div class="h3 card-title">Voting Booth</div>
                    </div>
                    <div class="card-body">
                        <div class="counter text-center" style="font-size: 18px;">
                            <?php
                            $id=intval($_GET['id']);
                            $vt=mysqli_query($con, "select * from votes where contestantid='$id'");
                            $vtr=mysqli_num_rows($vt);
                            ?>
                             <span class="label label-success"><?php echo $vtr;?> Votes</span>
                        </div>
                        <br>

                        <form class="my-5" method="post">
                            <div class="row">
                                <div class="col-md-12 col-sm-6">
                                    <input type="hidden" name="ctcatid" value="<?php echo $rows['ctcatid'];?>" />
                                    <!--                                    <label>Select Contestant</label>-->
                                    <select class="select2" name="contestantid" readonly>
                                        <option value="<?php echo $rows['contestantid'];?>" selected><?php echo $rows['fullname'] .' - '. $rows['partyname'];?></option>
                                    </select>
                                </div>

                            </div>
                            <br>
                            <div class="py-lg-5">
                                <div class="checkbox">
                                    <input type="checkbox" id="checkbox1" name="sign" value="1" required>
                                    <label for="checkbox1">
                                        <?php
                                        $sg=mysqli_query($con, "select fullname from voters where (email='".$_SESSION['vtlogin']."' or phone='".$_SESSION['vtlogin']."')");
                                        $rowt=mysqli_fetch_array($sg);
                                        $name=$rowt['fullname'];
                                        ?>
                                        I, <?php echo $name;?> Vote According to <a data-toggle="modal"  data-target="#votelaw">Voting Laws</a>
                                    </label>
                                </div>
                            </div>
                            <br>
                            <div class="btn-wrapper btn-block">
                                <button type="submit" class="btn btn-success" name="submit">Vote</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
        <div class="modal fade" id="votelaw" tabindex="-1" role="dialog" aria-labelledby="Add Contest Category">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Vote Laws</h4>
                    </div>
                    <div class="modal-body">
                        No Election fraud
                    </div>
                </div>
            </div>
        </div>
        <?php include "../../library/include/app/footer.php" ?>
        <?php }?>