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
    $query = mysqli_query($con, "insert into voters(fullname,catdesc,status) values ('$catname', '$catdesc','$status') ");

    if (!$query){
        $errormsg = '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Error adding contest category. Please check and try again.</div>';
    }

    else{
        $successmsg= '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Contest category added successfully.</div>';
    }
}
if(isset($_GET['del']))
{
    mysqli_query($con,"delete from voters where id = '".$_GET['id']."'");
    $successmsg= '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Voter deleted.</div>';
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
                    $query= mysqli_query($con, "select * from votes");
                    $num1=mysqli_num_rows($query);
                    ?>
                    <div class="card-body text-center vt-box">
                        <div class="text-decoration-none"><?php echo htmlentities($num1);?></div>

                        <div class="text-capitalize ">Total Vote</div>
                    </div>
                </a>
            </div>
            <?php
            $cat = 1;
            $querys= mysqli_query($con, "select votes.*, contestcat.catname, contestcat.id from votes left join contestcat on votes.catid=contestcat.id group by contestcat.id");


            while($row=mysqli_fetch_array($querys)){
                $nums=mysqli_num_rows($querys);
                $catid = $row['catid'];
                $catname = $row['catname'];
                ?>
<?php  if($catid<0)
                {

                }
                else
                {
                    echo "<div class='col-lg-4 col-md-6 col-sm-6 col-xs-12'>
                <a class='card'>


                    <div class='card-body text-center vt-box'>
                        <div class='text-decoration-none'>$nums</div>

                        <div class='text-capitalize'>$catname</div>
                    </div>
                </a>
            </div>";
                }
            }
    ?>

                <?php //} ?>
            <div class="row p-t-50" style="padding: 20px;">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            All Votes
                        </div>
                        <div class="card-body no-padding">
                            <table class="datatable table table-striped primary" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Category</th>
                                    <th>Contestant</th>
                                    <th>Voter</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <?php
                                $cts= mysqli_query($con, "select votes.*,contestcat.catname, voters.fullname as vname,contestant.fullname from votes left join contestcat on contestcat.id=votes.catid left join voters on voters.id=votes.voterid left join contestant on contestant.id=votes.contestantid ");

                                $cnt=1;
                                while($row = mysqli_fetch_array($cts)){;
                                    ?>
                                    <tbody>
                                    <tr>
                                        <td><?php echo $cnt;?></td>
                                        <td><?php echo $row['catname'];?></td>
                                        <td><?php echo $row['fullname'];?></td>
                                        <td><?php echo $row['vname'];?></td>
                                        <td><?php echo $row['voterdate'];?></td>
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
