<?php
// client.php

require_once 'factory.php';


$location = LocationFactory::createLocation('NAC'); // change to 'group' to test
echo $location->getDetails();
?>



