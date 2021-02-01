<?php
session_start();
//error_reporting(E_ALL);

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
        $state=$_POST['state'];
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

    </head>
    <body>
    <div class="app app-default" style="overflow-y: scroll; height: 500px;">

                <?php include "../../library/include/app/nav.php"; ?>

        <div class="app-container">
            <?php
                        include "../../library/include/app/topnav.php"; ?>

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
                                                <?php
                                                //Include database configuration file

                                                //Get all country data
                                                $query = "SELECT * FROM states  ORDER BY name ASC";
                                                $run_query = mysqli_query($con, $query);
                                                //Count total number of rows
                                                $count = mysqli_num_rows($run_query);

                                                ?>
                                                <select class="select2" name="state" id="country">
                                                    <option value="">Select State</option>
                                                    <?php
                                                    if($count > 0){
                                                        while($row = mysqli_fetch_array($run_query)){
                                                            $country_id=$row['id'];
                                                            $country_name=$row['name'];
                                                            echo "<option value='$country_id'>$country_name</option>";
                                                        }
                                                    }else{
                                                        echo '<option value="">State not available</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">LGA</label>
                                            <div class="col-md-6">
                                                <select class="select2" name="lga" id="state">
                                                    <option value="">Select State First</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Ward</label>
                                            <div class="col-md-6">
                                                <select class="select2" name="ward" id="city">
                                                    <option value="">Select State First</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label class="control-label">Home Address</label>
                                                <p class="control-label-help">( 150 max words
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
                                            <a href="logout.php" class="btn btn-default">Exit</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                        <script type="text/javascript" src="../../library/assets/app/assets/js/jquery.min.js"></script>
                        <script type="text/javascript" src="../../library/assets/app/assets/js/vendor.js"></script>
                        <script type="text/javascript" src="../../library/assets/app/assets/js/app.js"></script>
                        <script type="text/javascript" src="../../library/assets/app/assets/bootstrap/popper.min.js"></script>
                        <script type="text/javascript" src="../../library/assets/app/assets/js/marquee.js"></script>
                        <script type="text/javascript" src="../../library/assets/app/assets/image-uploader/script.js"></script>
                        <script src="notification/script.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#country').on('change',function(){
                        var countryID = $(this).val();
                        if(countryID){
                            $.ajax({
                                type:'POST',
                                url:'ajaxFile.php',
                                data:'state_id='+countryID,
                                success:function(html){
                                    $('#state').html(html);
                                    $('#city').html('<option value="">Select LGA First</option>');
                                }
                            });
                        }else{
                            $('#state').html('<option value="">Select State First</option>');
                            $('#city').html('<option value="">Select LGA First</option>');
                        }
                    });

                    $('#state').on('change',function(){
                        var stateID = $(this).val();
                        if(stateID){
                            $.ajax({
                                type:'POST',
                                url:'ajaxFile.php',
                                data:'lga_id='+stateID,
                                success:function(html){
                                    $('#city').html(html);
                                }
                            });
                        }else{
                            $('#city').html('<option value="">Select LGA First</option>');
                        }
                    });
                });
            </script>
    </body>
    </html>


<?php } ?>
