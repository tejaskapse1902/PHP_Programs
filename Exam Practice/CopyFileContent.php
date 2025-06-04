<?php
$sourceFile = 'source.txt';
$destinationFile = 'destination.txt';

$source = fopen($sourceFile, 'r');

$destination = fopen($destinationFile, 'w');

while (!feof($source)) {
    $line = fgets($source);
    fwrite($destination, $line);
}

fclose($source);
fclose($destination);

echo "File copied successfully using traditional method.";
?>