<?php
session_start();
include "../../library/config/dbconn.php";
include "../../library/config/constants.php";

if(strlen($ctlogin)==0)
{
    header("location:../../login.php");
}

else {
$status =1;
$query_value = "select * from contestant where profile=$status and email='".$_SESSION['ctlogin']."'" ;
$query = mysqli_query($con,$query_value);
$row=mysqli_fetch_array($query);

if ($row['profile']== NULL or $row['profile']==""){

    header("location:complete-profile.php");
}


?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include "../../library/include/app/ct-header.php";
    ?>
</head>
<body>
  <div class="app app-default" style="overflow-y: scroll; height: 500px;">
      <?php include "../../library/include/app/ct-nav.php"; ?>
<div class="app-container">
    <?php include "../../library/include/app/ct-topnav.php"; ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body app-heading fixed-top">
            <?php
            $img = mysqli_query($con,"select * from contestant where email='".$_SESSION['ctlogin']."'");
            while($row=mysqli_fetch_array($img)){

            $userpix = $row['profilepix'];
            if ($userpix == "") {
                echo "
                        <img class=\"profile-img\" src=\"$user_avatar\">
                   ";
            } else {
                echo "
                        <img class=\"profile-img\" src=\"../../library/assets/app/uploads/$userpix\">
                   ";
            }

            ?>

          <div class="app-title">

            <div class="title"><span class="highlight"><?php echo ucwords($row['fullname']); ?></span></div>
 <div class="row no-padding no-gap no-gutters">
     <div class="col-md-1">
         <div class="description">Voter ID: <?php echo $row['id']; ?></div>
     </div>
     <div class="col-md-2">
         <div class="description">Born on: <?php echo date('M jS, Y', strtotime($row['dob'])); ?></div>
     </div>
 </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 ">
      <div class="card card-tab overflow-hidden">
        <div class="card-header overflow-hidden">
          <ul class="nav nav-tabs overflow-hidden">
            <li role="tab1" class="active">
              <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Profile</a>
            </li>
<!--            <li role="tab3">-->
<!--              <a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Activity</a>-->
<!--            </li>-->
            <li role="tab4">
              <a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">Setting</a>
            </li>
          </ul>
        </div>
        <div class="card-body no-padding tab-content">
          <div role="tabpanel" class="tab-pane active" id="tab1">
            <div class="row">
              <div class="col-md-3 col-sm-12">
<!--                  <div class="section">-->
<!--                      <div class="section-title"><i class="icon fa fa-calendar" aria-hidden="true"></i>State, LGA, Ward</div>-->
<!--                      <div class="section-body __indent">--><?php //echo ucwords($row['states']).','.ucwords($row['lga']).','.ucwords($row['ward']); ?><!--</div>-->
<!--                  </div>-->
<!--                <div class="section">-->
<!--                  <div class="section-title"><i class="icon fa fa-user" aria-hidden="true"></i> Occupation</div>-->
<!--                  <div class="section-body __indent">--><?php //echo ucwords($row['works']); ?><!--</div>-->
<!--                </div>-->
<!--                  <div class="section">-->
<!--                      <div class="section-title"><i class="icon fa fa-map-marker" aria-hidden="true"></i> Address</div>-->
<!--                      <div class="section-body __indent">--><?php //echo ucwords($row['address']); ?><!--</div>-->
<!--                  </div>-->
<!--                  <div class="section">-->
<!--                      <div class="section-title"><i class="icon fa fa-phone" aria-hidden="true"></i> Phone Number</div>-->
<!--                      <div class="section-body __indent">--><?php //echo ucwords($row['phone']); ?><!--</div>-->
<!--                  </div>-->
                  <?php }?>
<!--                <div class="section">-->
<!--                  <div class="section-title"><i class="icon fa fa-book" aria-hidden="true"></i> Education</div>-->
<!--                  <div class="section-body __indent">Computer Engineering, Khon Kaen University</div>-->
<!--                </div>-->
              </div>
              <div class="col-md-9 col-sm-12" style="background-color: #f0f0f0;">

                <div class="section vt-tl">

                  <div class="section-title">Activities</div>
                  <div class="section-body">
                      <div class="row">
                          <div class="col-xs-12">
                              <div class="timeline">
                                  <dl>
                                      <?php
                                      $query = mysqli_query($con,"select * from userlog where uid='".$_SESSION['id']."'");    $cont=1;
                                      while($row=mysqli_fetch_array($query)){?>
                                      <dt class= "item <?php if($cont>1) echo "post-right";?>">
                                          <div class="marker"></div>
                                          <div class="event">
                                              <div class="event-body">
                                                  <?php  echo "Last Login".' '. date("M jS, Y", strtotime($row['loginTime'])).' at '.date("h:i:s A", strtotime($row['loginTime']));?>
                                              </div>
                                          </div>
                                      </dt>
                                          <?php $cont++; ?>
                                      <?php } ?>
                                  </dl>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="tab4">
              <div class="card " >
                  <div class="card-body ">
                      <form class="form form-horizontal">
                          <div class="section">
                              <div class="section-title">Update Information
                              </div>

                              <div class="section-body">
                                  <div class="form-group">
                                      <label class="col-md-3 control-label">Old Password</label>
                                      <div class="col-md-6">
                                          <input type="password" class="form-control" placeholder="">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-md-3 control-label">New Password</label>
                                      <div class="col-md-6">
                                          <input type="password" class="form-control" placeholder="">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-md-3 control-label">Re-enter New password</label>
                                      <div class="col-md-6">
                                          <input type="password" class="form-control" placeholder="">
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
                                      <button type="submit" class="btn btn-success">Update</button>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  </div>

  <?php include "../../library/include/app/footer.php" ?>
<?php }?>
<?php ?>

