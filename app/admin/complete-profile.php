<?php
require 'state-selector.php';
session_start();
error_reporting(E_ALL);

include "../../library/config/dbconn.php";
include "../../library/config/constants.php";



if(strlen($vtlogin)==0)
{
    header("location:../../login.php");
}
else
{

$status = 1;
$query = mysqli_query($con, "select * from voters where profile=$status and (email='".$_SESSION['vtlogin']."' or phone='".$_SESSION['vtlogin']."')");
$row = mysqli_fetch_array($query);

if ($row['profile'] == 1) {
//   header("location:dashboard.php");
    echo '<script>
alert("Your profile is already complete")
window.location.href="dashboard.php" 
</script>';}


if (isset($_POST['submit']))
{

    $work=$_POST['works'];
    $dob=$_POST['dob'];
    $state=$_POST['states'];
    $lga=$_POST['lga'];
    $address=$_POST['address'];
    $socialtw=$_POST['socialtw'];
    $socialfb=$_POST['socialfb'];
    $ward=$_POST['ward'];
    $gender=$_POST['gender'];
    $profilepix=$_FILES["profilepix"]["name"];
    $profile=1;
    move_uploaded_file($_FILES["profilepix"]["tmp_name"],"../../library/assets/app/uploads/".$_FILES["profilepix"]["name"]);
    $query = mysqli_query($con, "update voters set profilepix ='$profilepix',works='$work',dob='$dob',states='$state',lga='$lga',address='$address',socialtw='$socialtw',socialfb='$socialfb',profile='$profile',ward='$ward',gender='$gender' where email ='".$_SESSION['vtlogin']."' or phone='".$_SESSION['vtlogin']."' ");

//die();
    echo '<script>alert("Profile Successfully Completed. You can now start voting.")
       window.location.href="dashboard.php" 
</script>';

}
else {
    $errormsg = '<div class="alert alert-danger" role="alert">Profile Completion Not Successful. Check and try again.</div>' ;
}

?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include "../../library/include/app/header.php";
    ?>
    <link href="state-selector/assets/css/style.css" rel="stylesheet" type="text/css" />
    <script src="state-selector/vendor/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="state-selector/assets/js/ajax-handler.js" type="text/javascript"></script>
</head>
<body>
<div class="app app-default" style="overflow-y: scroll; height: 500px;">

    <?php include "../../library/include/app/nav.php"; ?>

    <div class="app-container">

        <?php
        include "../../library/include/app/topnav.php"; ?>

        <!--Notification-->


        <!--    Notification-->


        <div class="row">
            <div class="col-xs-12">
                <div class="card " >
                    <div class="card-body ">

                        <form class="form form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="section">
                                <div class="section-title">Voter Information -
                                    <small style="padding-left: 10px;" class="text-success">Makes sure that all
                                        information is enterted correctly.</small>
                                </div>

                                <div class="section-body">
                                    <div class="form-group" data-toggle="tooltip" data-placement="top"
                                         title="Picture must be on a white background and size must be 50x50.">
                                        
                                        <div class="avatar-upload">
                                            <div class="avatar-edit">
                                                <input type='file' id="imageUpload" name="profilepix" accept=".png, .jpg, .jpeg"/>
                                                <label for="imageUpload"></label>
                                            </div>
                                            <div class="avatar-preview">
                                                <div id="imagePreview"
                                                     style="background-image: url(<?php echo $user_avatar; ?>);">
                                                </div>
                                            </div>
                                            <div class="h4" style="" >Upload Photograph
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Gender</label>
                                        <div class="col-md-6">
                                          <select class="select2" name="gender">
                                              <option value="">Select Gender</option>
                                              <option value="male">Male</option>
                                              <option value="female">Female</option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Date Of Birth</label>
                                        <div class="col-md-6">
                                            <input type="date" name="dob" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Occupation</label>
                                        <div class="col-md-6">
                                            <input type="text" name="works" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section">
                                <div class="section-title">Contact Information</div>
                                <div class="section-body">

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">State of origin</label>
                                        <div class="col-md-6 col-sm-4">
                                            <select class="select2" name="states" id="country-list" onChange="getState(this.value);">
                                                <option value disabled selected>Select State</option>
                                                <?php
                                                foreach ($countryResult as $country) {
                                                    ?>
                                                    <option value="<?php echo $country["id"]; ?>"><?php echo $country["name"]; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">LGA</label>
                                        <div class="col-md-6">
                                            <select class="select2" name="lga" id="lga-list"
                                                    onChange="getCity(this.value);">
                                                <option value="">Select LGA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Ward</label>
                                        <div class="col-md-6">
                                            <select class="select2" name="ward" id="ward-list" >

                                                <option value="">Select Ward</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label class="control-label">Home Address</label>
                                            <p class="control-label-help">( short detail of products , 150 max words
                                                )</p>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea class="form-control" name="address" rows="6"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section">
                                <div class="section-title">Social Networks</div>
                                <div class="section-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Facebook</label>
                                        <div class="col-md-6">
                                            <input type="text" name="socialfb" class="form-control" placeholder="" value="http://">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Twitter</label>
                                        <div class="col-md-6">
                                            <input type="text" name="socialtw" class="form-control" placeholder="" value="http://">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-footer">
                                <div class="checkbox">
                                    <input type="checkbox" id="checkbox2" required>
                                    <label for="checkbox2">
                                       I Confirm that the information entered is correct
                                    </label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                        <button type="submit" name="submit" class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <?php include "../../library/include/app/footer.php" ?>
        <script type="text/JavaScript">


        </script>

<?php }?>
