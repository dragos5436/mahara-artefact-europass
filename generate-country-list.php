<?php

$csvFile = fopen("iso-codes.csv", "r");

// Skip the header row
$header = fgetcsv($csvFile);

while (($row = fgetcsv($csvFile, 0, ",", '"', "\\")) !== false) {

    $englishName = $row[0];       // Column 1: English short name
    $alpha2 = strtolower($row[2]); // Column 3: Alpha-2 code, lowercased

    echo "\$string['country.$alpha2'] = '$englishName';\n";
}

fclose($csvFile);
