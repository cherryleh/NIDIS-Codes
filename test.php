<?php
$ranchurl = "https://origin.cpc.ncep.noaa.gov/products/analysis_monitoring/ensostuff/detrend.nino34.ascii.txt";
$querytable = fopen($ranchurl, "r");

//Loop through the CSV rows.
while (($row = fgetcsv($querytable, 0, ",")) !== FALSE) {
    if ($row[0]==$thismonth && $row[2]==$ENSO){
    //Print out my column data.
    echo $row[1];
    $RF_Me = $row[4];
    $RF_Mn = $row[5];
    $QFP_Me = $row[15];
    $QFP_Mn = $row[16];
    
}}

?>