<?php
$port = "\\\\.\\COM3"; // Required format on Windows
$baud = 230400;

// Configure COM3 using Windows mode command
exec("mode COM3 BAUD=$baud PARITY=N DATA=8 STOP=1");

$fp = fopen($port, "w+");
if (!$fp) {
    die("❌ Could not open serial port");
}

sleep(2); // Allow Arduino to reset

fwrite($fp, "LED ON\n");
fflush($fp); // Make sure it's sent

usleep(500000); // Wait 0.5 sec for Arduino to respond

stream_set_blocking($fp, true);
stream_set_timeout($fp, 2);

$response = '';
while (!feof($fp)) {
    $line = fgets($fp);
    if ($line === false) break;
    $response .= $line;
}

fclose($fp);
echo "✅ Arduino says: " . ($response ?: "[no response]") . "\n";
?>
