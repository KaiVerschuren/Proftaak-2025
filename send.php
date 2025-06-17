<?php
// send.php — sends each slot value on a new line

$serialPort = '/dev/ttyACM0';

// Check for required parameters
if (!isset($_GET['slot1'], $_GET['slot2'], $_GET['slot3'])) {
    echo "Error: slot1, slot2, and slot3 must all be provided.";
    exit;
}

// Get values
$slot1 = $_GET['slot1'];
$slot2 = $_GET['slot2'];
$slot3 = $_GET['slot3'];

// Validate all as numeric
if (!ctype_digit($slot1)  !ctype_digit($slot2)  !ctype_digit($slot3)) {
    echo "Error: All slot values must be numeric.";
    exit;
}

// Open the serial port
$fp = fopen($serialPort, 'w');
if (!$fp) {
    echo "Error: Cannot open serial port $serialPort";
    exit;
}

// Wait for Arduino to reset
sleep(2);

// Write each slot number on a separate line
fwrite($fp, $slot1 . "\n");
fwrite($fp, $slot2 . "\n");
fwrite($fp, $slot3 . "\n");

// Close port
fclose($fp);

echo "Sent slots:\n$slot1\n$slot2\n$slot3";