<?php
namespace Phppot;

use Phppot\CountryState;
if (! empty($_POST["lga_id"])) {
    
    $stateId = $_POST["lga_id"];
    
    require_once __DIR__ . '/../Model/CountryStateCity.php';
    $countryStateCity = new CountryStateCity();
    $cityResult = $countryStateCity->getCityByStateId($stateId);
    ?>
<option>Select Ward</option>
<?php
foreach ($cityResult as $city) {
        ?>
<option value="<?php echo $city["id"]; ?>"><?php echo $city["name"]; ?></option>
<?php
    }
}
?>
