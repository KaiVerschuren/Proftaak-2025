<?php
<<<<<<< Maurits

var_dump($_GET);

if (!isset($_GET['productOne'], $_GET['productTwo'], $_GET['productThree'])) {
    echo "Error: Missing one or more product values.";
    exit;
}

$productOne = $_GET['productOne'];
$productTwo = $_GET['productTwo'];
$productThree = $_GET['productThree'];

// Validate each as a numeric value
foreach ([$productOne, $productTwo, $productThree] as $product) {
    if (!ctype_digit($product)) {
        echo "Error: Invalid product number detected.";
        exit;
    }
=======
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
>>>>>>> main
}

$serialPort = '/dev/ttyACM0';

<<<<<<< Maurits
// Open serial port for writing
=======
// Open serial port for writing only
>>>>>>> main
$fp = fopen($serialPort, 'w');
if (!$fp) {
    echo "Error: Cannot open serial port $serialPort";
    exit;
}

<<<<<<< Maurits
// Wait for Arduino to initialize
sleep(2);

// Write each product on its own line
fwrite($fp, $productOne . "\n");
fwrite($fp, $productTwo . "\n");
fwrite($fp, $productThree . "\n");
=======
// Wait for Arduino to reset and initialize
sleep(2);

// Send the slot number followed by newline
fwrite($fp, $slot . "\n");
>>>>>>> main

// Close the port
fclose($fp);

<<<<<<< Maurits
echo "Sent: $productOne, $productTwo, $productThree";
=======
echo "Sent slot: $slot";    
>>>>>>> main
