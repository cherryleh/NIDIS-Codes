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
$thismonthnum = ($date->format('m'));
$thisyear = ($date->format('Y'));
$thisdate = ($date->format('d'));
//Number of days this month
$numberdays = cal_days_in_month(CAL_GREGORIAN, $thismonthnum, $thisyear);

$currentmonth = date('F');
$lastmonth = Date('F', strtotime($currentMonth . " last month"));


if ($thisdate < 8){
    $monthtitle = $lastmonth;}
else{
    $monthtitle = $currentmonth;
}



//Return next month in all caps 3 letters
//$nm = new DateTime( "now", new DateTimeZone('Pacific/Honolulu') );
//$nm->modify( 'next month' );
//$nextmonth = strtoupper($nm->format( 'M' ));


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
$ranch = "RS04";
$ranchurl = "./RanchPointsRF/". $ranch  . "_BI/" . $ranch . "_BI_RF_Query_Table.csv";

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

if ($QFP_Me >= 0){
    $QFP_Me_Res = 'Better than average production expected';
    $QFP_Me_Col = 'black';
} elseif ($QFP_Me < 0 and $QFP>=50){
    $QFP_Me_Res = 'Less than average production expected';
    $QFP_Me_Col = 'black';
} elseif ($QFP_Me < -50){
    $QFP_Me_Res = 'Less than average production expected, potential to request funds';
    $QFP_Me_Col = 'red';
}

if ($QFP_Mn >= 0){
    $QFP_Mn_Res = 'Better than average production expected';
    $QFP_Mn_Col = 'black';
} elseif ($QFP_Mn < 0 and $QFP>=50){
    $QFP_Mn_Res = 'Less than average production expected';
    $QFP_Mn_Col = 'black';
} elseif ($QFP_Mn < -50){
    $QFP_Mn_Res = 'Less than average production expected, potential to request funds';
    $QFP_Mn_Col = 'red';
}

if ($QFP_Me >= 0){
    $QFP_Me_Arrow = '&#8679';
} elseif ($QFP_Me < 0){
    $QFP_Me_Arrow = '&#8681';
}

if ($QFP_Mn >= 0){
    $QFP_Mn_Arrow = '&#8679';
} elseif ($QFP_Mn < 0){
    $QFP_Mn_Arrow = '&#8681';
}

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

if ($PR_Me >= 0.5){
    $PR_Me_Res = 'Site is stable';
    $PR_Me_Col = 'black';
} elseif ($PR_Me < 0.5){
    $PR_Me_Res = 'Site is unstable';
    $PR_Me_Col = 'red';
}

if ($PR_Mn >= 0.5){
    $PR_Mn_Res = 'Site is stable';
    $PR_Mn_Col = 'black';
} elseif ($QFO_Mn < 0.5){
    $PR_Mn_Res = 'Site is unstable';
    $PR_Mn_Col = 'red';
}

//Grazing Days
$GD_Me = round(($SP_Me*0.5)/($animalunits*$drymatter),2);
$GD_Mn = round(($SP_Mn*0.5)/($animalunits*$drymatter),2);

if ($GD_Me >= $numberdays){
    $GD_Me_Res = 'Stock or do nothing';
    $GD_Me_Col = 'black';
} elseif ($GD_Me < $numberdays){
    $GD_Me_Res = 'De-Stock or supplement feeding';
    $GD_Me_Col = 'red';
}

if ($GD_Mn >= $numberdays){
    $GD_Mn_Res = 'Stock or do nothing';
    $GD_Mn_Col = 'black';
} elseif ($GD_Mn < $numberdays){
    $GD_Mn_Res = 'De-Stock or supplement feeding';
    $GD_Mn_Col = 'red';
}

#echo 'MeGD: ' . $GD_Me . '<br>';
#echo 'MnGD: ' . $GD_Mn . '<br>';
#echo  $DFPQ;

echo '

<div id="output" >
<table id=“multiLevelTable”>
    <tr id="month">
        <th  colspan="3"> Historical characteristics under ' . $cond .' Conditions</td>
    </tr>
    <tr>

            <td id="datatitle" class="tool" colspan="3">Quarterly Forage Production <span class="tooltext">Positive better than average production is expected. <br>Negative less than average production is expected. <br>< -50 funds can be requested.
        </span></td>



</tr>
<tr>
<td class="left"> Historical Average</td>
<td id="num">' . $QFP_Me . '%<span>'.$QFP_Me_Arrow.';</span> </td>
<td class="right"> <span style="display:inline-block;float:left">&#10230;</span> <div style="display:inline;color:'.$QFP_Me_Col.'">'. $QFP_Me_Res.'</div></td>

</tr>
<tr>
<td class="left"> Historical Low </td>
<td id="num">' . $QFP_Mn . '%<span>'.$QFP_Mn_Arrow.';</span> </td>
<td class="right"> <span style="color:black; display:inline-block;float:left">&#10230;</span> <div style="display:inline;color:'.$QFP_Mn_Col.'">'. $QFP_Mn_Res.'</div></td>
</tr> 
<tr>
<td id="datatitle" colspan="3" class="tool">'. $monthtitle . ' Production Ratio <span class="tooltext">>0.5 Site is stable <br> <0.5 site is unstable
</span> </td>
        </tr>
        <tr>
            <td class="left"> Historical Average </td>
            <td id="num"> '.$PR_Me .'</td>
            <td class="right" style="color:'.$PR_Me_Col.'"><span style="color:black">&#10230;</span> '.$PR_Me_Res.'</td>

        </tr>
        <tr>
            <td class="left"> Historical Low </td>
            <td id="num">'. $PR_Mn .'</td>
            <td class="right" style="'.$PR_Mn_Col.'"><span style="color:black">&#10230;</span> '.$PR_Mn_Res.'</td>
        </tr>
        <tr>
            <td id="datatitle" colspan="3" class="tool"> '.$monthtitle.' Grazing Days <span class="tooltext">> days in month - Stock or do nothing <br> < days in month - de-Stock or supplement feeding
</span> </td>
        </tr>
        <tr>
            <td class="left"> Historical Average </td>
            <td id="num">'. $GD_Me . '</td>
            <td class="right" style="color:'.$GD_Me_Col.'"><span style="color:black">&#10230;</span> '. $GD_Me_Res .'</td>

        </tr>
        <tr>
            <td class="left"> Historical Low </td>
            <td id="num">' . $GD_Mn . '</td>
            <td class="right" style="color:'.$GD_Mn_Col.'"><span style="color:black">&#10230;</span> '.$GD_Mn_Res.'</td>
        </tr>
    </table>
    </div>


'
?>