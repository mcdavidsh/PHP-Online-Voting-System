<?php

namespace Phppot;

use Phppot\CountryState;
require_once __DIR__ . '/state-selector/Model/CountryStateCity.php';
$countryStateCity = new CountryStateCity();
$countryResult = $countryStateCity->getAllCountry();




?>
