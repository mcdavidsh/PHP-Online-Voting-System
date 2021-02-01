<?php
namespace Phppot;

use Phppot\CountryState;
require_once __DIR__ . '/Model/CountryStateCity.php';
$countryStateCity = new CountryStateCity();
$countryResult = $countryStateCity->getAllCountry();
?>
<html>
<head>
<TITLE>jQuery Dependent DropDown List - Countries and States</TITLE>
<head>
<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
<script src="vendor/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/ajax-handler.js" type="text/javascript"></script>
</head>
<body>
    <div class="frmDronpDown">
        <div class="row">
            <label>State:</label><br /> <select name="country"
                id="country-list" class="demoInputBox"
                onChange="getState(this.value);">
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
        <div class="row">
            <label>State:</label><br /> <select name="state"
                id="lga-list" class="demoInputBox"
                onChange="getCity(this.value);">
                <option value="">Select LGA</option>
            </select>
        </div>
        <div class="row">
            <label>City:</label><br /> <select name="city"
                id="ward-list" class="demoInputBox">
                <option>Select Ward</option>
            </select>
        </div>
    </div>
</body>
</html>
