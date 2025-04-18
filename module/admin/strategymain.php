<?php

require 'strategy.php';



$service = new NotificationService();
$service->setNotificationStrategy(new EmailNotification("user@example.com"));
$service->notify();

$service->setNotificationStrategy(new MobileNotification());
$service->notify();

?>
