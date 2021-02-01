<?php
namespace Phppot;

use Phppot\CountryState;
if (! empty($_POST["state_id"])) {
    
    $countryId = $_POST["state_id"];


    require_once __DIR__ . '/../Model/CountryStateCity.php';
    $countryStateCity = new CountryStateCity();
    $stateResult = $countryStateCity->getStateByCountrId($countryId);
    ?>
<option value="">Select LGA</option>

<?php

    foreach ($stateResult as $state) {
        ?>
<option value="<?php echo $state["id"]; ?>"><?php echo $state["name"]; ?></option>
<?php
    }
}
?>
