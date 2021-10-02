<?php 
#echo $_POST['grasstype'];
#echo $_POST['drymatter'];
#echo $_POST['animalunits'];
#echo $_POST['acres'];
// define variables and set to empty values
$grasstype = $drymatter = $animalunits = $acres = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $grasstype=($_POST["grasstype"]);
  if (empty($_POST["drymatter"])) {
    $drymatter=26;
  } else {
    $drymatter = ($_POST["drymatter"]);
  }
    
  if (empty($_POST["animalunits"])) {
    $animalunitsErr = "<br> Field is required";
    define("animalunitsErr",$animalunitsErr, true);
  } else {
    $animalunits = ($_POST["animalunits"]);

  }

  if (empty($_POST["acres"])) {
    $acresErr = "<br> Field is required";
  } else {
    $acres = ($_POST["acres"]);
  }

}


/*
$grasstype = $_POST['grasstype'];
$drymatter = $_POST['drymatter'];
$animalunits = $_POST['animalunits'];
$acres = $_POST['acres'];*/

$date = new DateTime("now", new DateTimeZone('Pacific/Honolulu') );
$thismonth = strtoupper($date->format('M'));
$thismonthnum = strtoupper($date->format('m'));
$thisyear = strtoupper($date->format('Y'));
//Number of days this month
$numberdays = cal_days_in_month(CAL_GREGORIAN, $thismonthnum, $thisyear);

$monthtitle = $date->format('F');

//Return next month in all caps 3 letters
$nm = new DateTime( "now", new DateTimeZone('Pacific/Honolulu') );
$nm->modify( 'next month' );
$nextmonth = strtoupper($nm->format( 'M' ));


$file = file("https://origin.cpc.ncep.noaa.gov/products/analysis_monitoring/ensostuff/detrend.nino34.ascii.txt");
$explode = explode(" ",end($file));
$oni = end($explode);

//Determine current ENSO state
if ($oni > 1.1) {
    $ENSO = "SEL";
    $cond = "Strong El Nino";
} elseif (1.1 >= $oni && $oni>= 0.5){
    $ENSO = "WEL";
    $cond = "Weak El Nino";
} elseif (0.5>=$oni&&$oni>=-0.5){
    $ENSO = "NUT";
    $cond = "Neutral";
} elseif (-0.5>$oni && $oni>=-1.1){
    $ENSO="WLA";
    $cond = "Weak La Nina";
} elseif ($oni < -1.1){
    $ENSO="SLA";
    $cond = "Strong La Nina";
} else {
    echo "Error";
}

//Read rainfall query table
$ranch = "RS01";
$ranchurl = "./". $ranch  . "_BI/" . $ranch . "_BI_RF_Query_Table.csv";

$querytable = fopen($ranchurl, "r");

//Loop through the CSV rows.
while (($row = fgetcsv($querytable, 0, ",")) !== FALSE) {
    if ($row[0]==$thismonth && $row[2]==$ENSO){
    //Print out my column data.
    $RF_M = $row[1];
    $RF_Me = $row[4];
    $RF_Mn = $row[5];
    $QFP_Me = $row[15];
    $QFP_Mn = $row[16];
    
}}

#echo 'MnQFP: ' . $row[16] .'<br>';

//DFPQ
if ($grasstype == "Kikuyu"){
    $DFPQ = 4.34;
} elseif ($grasstype == "Pangola"){
    $DFPQ = 7.6;
} elseif ($grasstype == "Buffel"){
    $DFPQ = 2.6;
} elseif ($grasstype == "MixKikuyu"){
    $DFPQ = 8.3;
}elseif ($grasstype == "Guinea"){
    $DFPQ = 4.8;
}


//Site production
$SP_M = $DFPQ*$RF_M*$acres*$numberdays;
$SP_Me = $DFPQ*$RF_Me*$acres*$numberdays;
$SP_Mn = $DFPQ*$RF_Mn*$acres*$numberdays;

//Production ratio
$PR_Mean = round($SP_Me/$SP_M,2);
$PR_Min = round($SP_Mn/$SP_Mn,2);

if ($PR_Mean >1){
    $PR_Me = 1;
} elseif ($PR_Mean<0){
    $PR_Me = 0;
} else 
    $PR_Me = $PR_Mean;

if ($PR_Min >1){
    $PR_Mn = 1;
} elseif ($PR_Min<0){
    $PR_Mn = 0;
} else 
    $PR_Mn = $PR_Min;

//Grazing Days
$GD_Me = round(($SP_Me*0.5)/($animalunits*$drymatter),2);
$GD_Mn = round(($SP_Mn*0.5)/($animalunits*$drymatter),2);

#echo 'MeGD: ' . $GD_Me . '<br>';
#echo 'MnGD: ' . $GD_Mn . '<br>';
#echo  $DFPQ;

echo '<div id="output" >
<table id=“multiLevelTable”>
    <tr id="month">
        <th  colspan="3">  Historical characteristics under ' . $cond .' Conditions</td>
    </tr>
    <tr>
        <td id="datatitle" colspan="3"> Quarterly Forage Production</td>
</tr>
<tr>
<td class="left"> Historical Average </td>
<td id="num">' . $QFP_Me . '<span>&#8595;</span> </td>
<td class="right" style="color:red"> <span style="color:black">&#10230;</span> Potential to request funding</td>

</tr>
<tr>
<td class="left"> Historical Low </td>
<td id="num">' . $QFP_Mn . '<span>&#8595;</span> </td>
<td class="right" style="color:red"> <span style="color:black">&#10230;</span> Potential to request funding </td>
</tr> 
<tr>
<td id="datatitle" colspan="3">'. $monthtitle . ' Production Ratio</td>
        </tr>
        <tr>
            <td class="left"> Historical Average </td>
            <td id="num"> '.$PR_Me .'</td>
            <td class="right" style="color:black"><span style="color:black">&#10230;</span> Site is stable</td>

        </tr>
        <tr>
            <td class="left"> Historical Low </td>
            <td id="num">'. $PR_Mn .'</td>
            <td class="right" style="color:red"><span style="color:black">&#10230;</span> Site is unstable </td>
        </tr>
        <tr><td id="datatitle" colspan="3"> '.$monthtitle.' Grazing Days</td>
        </tr>
        <tr>
            <td class="left"> Historical Average </td>
            <td id="num">'. $GD_Me . '</td>
            <td class="right" style="color:red"><span style="color:black">&#10230;</span> De-stock or supplement feeding</td>

        </tr>
        <tr>
            <td class="left"> Historical Low </td>
            <td id="num">' . $GD_Mn . '</td>
            <td class="right" style="color:red"><span style="color:black">&#10230;</span> De-stock or supplement feeding </td>
        </tr>
    </table>
    </div>'
?>