<?php
session_start();
include("../../library/config/dbconn.php");
$_SESSION['adlogin']=="";
date_default_timezone_set('Africa/Lagos');
$ldate=date( 'd-m-Y h:i:s A', time () );
mysqli_query($con,"UPDATE userlog  SET logout = '$ldate' WHERE userlogin = '".$_SESSION['adlogin']."' ORDER BY id DESC LIMIT 1");
session_unset();

?>
<script language="javascript">
    document.location="../../index.php";
</script>
