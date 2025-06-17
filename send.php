<?php
// send.php

if (!isset($_GET['slot'])) {
    echo "Error: No slot parameter provided.";
    exit;
}

$slot = $_GET['slot'];

// Validate slot as numeric (optional, but recommended)
if (!ctype_digit($slot)) {
    echo "Error: Invalid slot number.";
    exit;
}

$serialPort = '/dev/ttyACM0';

// Open serial port for writing only
$fp = fopen($serialPort, 'w');
if (!$fp) {
    echo "Error: Cannot open serial port $serialPort";
    exit;
}

// Wait for Arduino to reset and initialize
sleep(2);

// Send the slot number followed by newline
fwrite($fp, $slot . "\n");

// Close the port
fclose($fp);

echo "Sent slot: $slot";    