<?php
// main.php

require_once 'observer.php';  // Include the class definitions

// MAIN EXECUTION
$broadcaster = new MessageBroadcaster();

// Create Observers
$device = new Display("SamsungLCD");

// Attach Observers
$broadcaster->attach($device);

// Send Message
$broadcaster->setMessage("Weather alert: Heavy rain expected tomorrow!");
