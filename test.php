<?php
$date = new DateTime("now", new DateTimeZone('Pacific/Honolulu') );

$thismonth = strtoupper($date->format('M'));
$thismonthnum = ($date->format('m'));
$thisyear = ($date->format('Y'));
//Number of days this month
$numberdays = cal_days_in_month(CAL_GREGORIAN, $thismonthnum, $thisyear);

$currentmonth = date('F');
$lastmonth = Date('F', strtotime($currentMonth . " last month"));

$thisdate = ($date->format('d'));
echo $thisdate;

if ($thisdate < 8){
    $monthtitle = $lastmonth;}
else{
    $monthtitle = $currentmonth;
}
?>