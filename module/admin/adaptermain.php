<?php

require_once 'adapter.php';


$emailService = new EmailNotificationService();
$emailService->send("john@example.com", "Welcome!", "Thanks for joining us!");

echo "\n";

$sendGrid = new SendGridService();
$adapter = new SendGridAdapter($sendGrid);
$adapter->send("jane@example.com", "Account Activated", "Your account is now active.");


?>

<?php


$name=echo "my name is nahin alam";
