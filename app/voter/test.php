<?php
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
<?php
//Include database configuration file

//Get all country data
$query = "SELECT * FROM states  ORDER BY name ASC";
$run_query = mysqli_query($con, $query);
//Count total number of rows
$count = mysqli_num_rows($run_query);

?>
<select class="select2" name="country" id="country">
    <option value="">Select Country</option>
    <?php
    if($count > 0){
        while($row = mysqli_fetch_array($run_query)){
            $country_id=$row['id'];
            $country_name=$row['name'];
            echo "<option value='$country_id'>$country_name</option>";
        }
    }else{
        echo '<option value="">Country not available</option>';
    }
    ?>
</select>

<select class="select2" name="state" id="state">
    <option value="">Select country first</option>
</select>
<select class="select2" name="city" id="city">
    <option value="">Select state first</option>
</select>
<!--        --><?php //include "library/include/app/footer.php" ?>
<script type="text/javascript" src="../../library/assets/app/assets/js/jquery.min.js"></script>
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
                        $('#city').html('<option value="">Select state first</option>');
                    }
                });
            }else{
                $('#state').html('<option value="">Select country first</option>');
                $('#city').html('<option value="">Select state first</option>');
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
                $('#city').html('<option value="">Select state first</option>');
            }
        });
    });
</script>
</body>
</html>


<?php } ?>
