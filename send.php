<?php

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
    // if (!ctype_digit($product)) {
    //     echo "Error: Invalid product number detected.";
    //     exit;
    // }
}

// $serialPort = 'COM5';
$serialPort = '/dev/ttyACM0';

// Open serial port for writing
$fp = fopen($serialPort, 'w');
if (!$fp) {
    echo "Error: Cannot open serial port $serialPort";
    exit;
}

// Wait for Arduino to initialize
sleep(2);

// Write each product on its own line
fwrite($fp, $productOne . "\n");
fwrite($fp, $productTwo . "\n");
fwrite($fp, $productThree . "\n");

// Close the port
fclose($fp);

echo "Sent: $productOne, $productTwo, $productThree";