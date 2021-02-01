
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="INEC" content="Voter Registration">
<meta name="Mcdavid" content="www.softhood.net/david">
<link rel="icon" href="<?php echo $favico_app;?>" type="image/x-icon">
<?php
$query=mysqli_query($con,"select fullname from contestant where email='".$_SESSION['ctlogin']."' ");
while($row=mysqli_fetch_array($query)) {
    ?>
    <title>Contestant <?php echo ucwords($row['fullname']) .' | '. $sitename; ?></title>
<?php }?>
<link rel="stylesheet" type="text/css" href="../../library/assets/app/assets/css/vendor.css">
<link rel="stylesheet" type="text/css" href="../../library/assets/app/assets/css/flat-admin.css">
<link rel="stylesheet" href="../../library/assets/home/css/custom.css">
<link rel="stylesheet" type="text/css" href="../../library/assets/app/assets/image-uploader/style.css">
<link rel="stylesheet" type="text/css" href="notification/notify.css">


