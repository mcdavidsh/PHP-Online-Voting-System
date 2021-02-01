<?php
//Include database configuration file
include('../../library/config/dbconn.php');

    if (isset($_POST["state_id"])) {
        //Get all state data
        $country_id = $_POST['state_id'];
        $query = "SELECT * FROM lga WHERE state_id = '$country_id' 
	ORDER BY name ASC";
        $run_query = mysqli_query($con, $query);

        //Count total number of rows
        $count = mysqli_num_rows($run_query);

        //Display states list
        if ($count > 0) {
            echo '<option value="">Select LGA</option>';
            while ($row = mysqli_fetch_array($run_query)) {
                $state_id = $row['id'];
                $state_name = $row['name'];
                echo "<option value='$state_id'>$state_name</option>";
            }
        } else {
            echo '<option value="">LGA Not Available</option>';
        }
    }

    if (isset($_POST["lga_id"])) {
        $state_id = $_POST['lga_id'];
        //Get all city data
        $query = "SELECT * FROM wards WHERE lga_id = '$state_id' 
	ORDER BY name ASC";
        $run_query = mysqli_query($con, $query);
        //Count total number of rows
        $count = mysqli_num_rows($run_query);

        //Display cities list
        if ($count > 0) {
            echo '<option value="">Select Ward</option>';
            while ($row = mysqli_fetch_array($run_query)) {
                $city_id = $row['id'];
                $city_name = $row['name'];
                echo "<option value='$city_id'>$city_name</option>";
            }
        } else {
            echo '<option value="">Ward Not Available</option>';
        }
    }

?>
