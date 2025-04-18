<?php
// client.php

require_once 'facade.php';

$apiGateway = new APIGateway();
echo $apiGateway->getFullBookingDetails("101", "2025-04-16", "14:30");
?>
