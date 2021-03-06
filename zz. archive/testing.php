<!DOCTYPE html>
<html>

<head>
  <title>Hawai&#x02BB;i Rangeland Informational Portal</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="./index.css">
  <link rel="stylesheet" type="text/css" href="./header.css">
  <link rel="stylesheet" type="text/css" href="./footer.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <script>
    $(function () {
      $("#header").load("./header.html");
      $("#footer").load("./footer.html");
    });

  </script>
</head>

<body>
  <script>
    $(document).ready(function () {
      $('#island-select').on('change', function () {
        var islvalue = $(this).val();
        window.currentIsl = islvalue;
        $("div.myDiv").hide();
        $("#show" + islvalue).show();

        console.log($("#form-no-data"))
        $("#form-no-data").trigger('click');
      });
    });

    /*Radio buttons to display different raster data on island*/
    $(document).ready(function () {
      $("input[name$='bn']").click(function () {
        var radio_value = $(this).val();
        var isl_value = $('#island-select option:selected')[0].value;
        console.log(isl_value)
        if (radio_value == '0') {
          $("#nodata" + isl_value).show();
          $("#rainfall" + isl_value).hide();
          $("#evapotranspiration" + isl_value).hide();
        }
        else if (radio_value == '1') {
          $("#nodata" + isl_value).hide();
          $("#rainfall" + isl_value).show();
          $("#evapotranspiration" + isl_value).hide();
        }
        else if (radio_value == '2') {
          $("#nodata" + isl_value).hide();
          $("#rainfall" + isl_value).hide();
          $("#evapotranspiration" + isl_value).show();
        }
      });
      $('[name="bn"]:checked').trigger('click');
    });

    function popupFunction() {
      var popup = document.getElementById("myPopup");
      popup.classList.toggle("show");
    }
  </script>


  <div id="header">Header</div>
  <div class="headerimg">
    <img src="./ParkerRanch.jpeg" alt="Placeholder-Image">
    <div class="imgtext">
      <h1 style="font-size: 48px;">Welcome to H-RIT</h1>
      <a href="#"> Learn more</a>
    </div>
  </div>

  <div>
    <h3 id="subcategory">Statewide Conditions - <span class="month"></span>, <span class="year"></span>
    </h3>
    
    <div id="oni">
      <div class="gauge"><img src="./gauge/gauge.png"><p><span>Last updated </span><span class="month"></span> <span> 8, </span><span class="year"></span><!--<span class="month"></span>8, <span class="year"></span>--></p></div>
      <div class="gauge-i tool">&#9432;
        <span class="tooltext">
          This gauge displays current El Ni&#241;o-Southern Oscillation (ENSO) conditions based on the monthly Oceanic
          Ni&#241;o Index (ONI) value released by the National Weather Service Climate Prediction Center. This gauge is
          updated on the 8th of every month. For more info on ENSO and ONI click <a target="_blank"
            href="https://www.climate.gov/news-features/understanding-climate/climate-variability-oceanic-nino-index">
            here</a>.
        </span>
      </div>

    </div>

  </div>


  <div class="content">

    <div class="flex-container">

      <div class="flex-child" id="windy">
        <iframe title="windy.com" id="windy" width="450" height="250"
          style="display: block; border-style:none;box-shadow:0px 4px 8px 0px rgba(0,0,0,0.2);" cellspacing="0"
          src="https://embed.windy.com/embed2.html?lat=20.689&lon=-157.843&detailLat=20.589&detailLon=-159.173&width=450&height=250&zoom=6&level=surface&overlay=wind&product=ecmwf&menu=&message=&marker=&calendar=12&pressure=&type=map&location=coordinates&detail=&metricWind=default&metricTemp=default&radarRange=-1"
          frameborder="0"></iframe>
      </div>

      <div class="flex-child" id="droughtMonitor" style="margin-left: 5%;">
        <a href="http://droughtmonitor.unl.edu/data/png/current/current_hi_trd.png" target="_blank">
          <img
            style="width: 400px; height: auto; border: 2px solid; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"
            src="http://droughtmonitor.unl.edu/data/png/current/current_hi_trd.png"></a>
        <p style="text-align: left;"> Source: <a href="https://droughtmonitor.unl.edu/" target="_blank">National Drought
            Mitigation Center (NDMC)</a></p>
      </div>

    </div>


    <div class="sitespecific" id="ranch">
      <h3 id="subcategory">Site-specific Conditions</h3>

      <p style="text-align: center;">Select an island from the dropdown below.</p>
      <select id="island-select">

        <option value="Sel">Select an island</option>
        <option value="HI">Hawai&#x02BB;i Island</option>
        <option value="Maui">Maui</option>
        <option value="Kahoolawe">Kaho&#x02BB;olawe</option>
        <option value="Lanai">Lanai</option>
        <option value="Molokai">Moloka&#x02BB;i</option>
        <option value="Oahu">O&#x02BB;ahu</option>
        <option value="Kauai">Kauai</option>

      </select>

      <div id="showSel" class="myDiv">
        <p></p>
        <img id="islands" src="./islands/islands.png">
      </div>



      <div id="showHI" class="myDiv">
        <p> Click on an area of interest to view site-specific data.</p>
        <p style="display: inline;"> Map view:</p>
        <form style="display: inline;">
          <input type="radio" name="bn" value="0" checked="checked" id="form-no-data" /> No Data
          <input type="radio" name="bn" value="1" id="form-rain-fall" /> Rainfall
          <input type="radio" name="bn" value="2" id="form-evapo" /> Evapotranspiration
        </form>
        <div id="nodataHI">
          <img id="a" src="./islands/HIisl.png" usemap="#HI">

          <map name="HI">
            <area target="" alt="" title="" href="./ranchpage.php" coords="109,39,97,25" shape="rect">
            <area target="" alt="" title="" href="./ranchpage.php" coords="102,62,114,73" shape="rect">
            <area target="" alt="" title="" href="./ranchpage.php" coords="127,60,142,72" shape="rect">
            <area target="" alt="" title="" href="./ranchpage.php" coords="150,130,162,145" shape="rect">
            <area target="" alt="" title="" href="./ranchpage.php" coords="196,107,207,117" shape="rect">
            <area target="" alt="" title="" href="./ranchpage.php" coords="236,83,248,96" shape="rect">
            <area target="" alt="" title="" href="./ranchpage.php" coords="210,142,221,153" shape="rect">
            <area target="" alt="" title="" href="" coords="" shape="0">
          </map>
        </div>

        <div id="rainfallHI" style="padding-top: 150px; padding-bottom: 200px;">Coming Soon</div>

        <div style="display: block" id="evapotranspirationHI">
          <img id="a" style="width: auto" src="./islands/HI/ET_Hi.png" usemap="#ET">

          <map name="ET">
            <area shape="rect" coords="209,22,220,31" alt="a" href="./imagemap.html">
            <area shape="rect" coords="184,161,196,172" alt="Palani" href="#">
          </map><br>
          <a href="https://earthengine.google.com/" style="width: 50%; text-align: right;">Source: Google Earth
            Engine</a>
        </div>
      </div>

      <div id="showMaui" class="myDiv">
        <p> Click on an area of interest to view site-specific data.</p>
        <p style="display: inline;"> Map view:</p>
        <form style="display: inline;">
          <input type="radio" name="bn" value="0" checked="checked" id="form-no-data" /> No Data
          <input type="radio" name="bn" value="1" id="form-rain-fall" /> Rainfall
          <input type="radio" name="bn" value="2" id="form-evapo" /> Evapotranspiration
        </form>
        <div id="nodataMaui">
          <img id="a" src="./islands/maui.png" usemap="#HI">

          <map name="HI">
            <area shape="rect" coords="257,34,275,51" alt="a" href="./imagemap.html">
            <area shape="rect" coords="222,243,240,263" alt="Palani" href="#">
          </map>
        </div>

        <div id="rainfallMaui" style="padding-top: 150px; padding-bottom: 200px;">Coming Soon</div>

        <div id="evapotranspirationMaui">
          <img id="a" src="./islands/ET_Hi.png" usemap="#ET">

          <map name="ET">
            <area shape="rect" coords="257,34,275,51" alt="a" href="./imagemap.html">
            <area shape="rect" coords="222,243,240,263" alt="Palani" href="#">
          </map>
        </div>

      </div>

      <div id="showKahoolawe" class="myDiv">
        <p> Click on an area of interest to view site-specific data.</p>
        <p style="display: inline;"> Map view:</p>
        <form style="display: inline;">
          <input type="radio" name="bn" value="0" checked="checked" id="form-no-data" /> No Data
          <input type="radio" name="bn" value="1" id="form-rain-fall" /> Rainfall
          <input type="radio" name="bn" value="2" id="form-evapo" /> Evapotranspiration
        </form>
        <div id="nodataKahoolawe">
          <img id="a" style="width:20%; height:auto" src="./islands/kahoolawe.png" usemap="#HI">

          <map name="HI">
            <area shape="rect" coords="257,34,275,51" alt="a" href="./imagemap.html">
            <area shape="rect" coords="222,243,240,263" alt="Palani" href="#">
          </map>
        </div>

        <div id="rainfallKahoolawe" style="padding-top: 150px; padding-bottom: 200px;">Coming Soon</div>

        <div id="evapotranspirationKahoolawe">
          <img id="a" src="./islands/kahoolawe.png" usemap="#ET">

          <map name="ET">
            <area shape="rect" coords="257,34,275,51" alt="a" href="./imagemap.html">
            <area shape="rect" coords="222,243,240,263" alt="Palani" href="#">
          </map>
        </div>

      </div>

      <div id="showLanai" class="myDiv">
        <p> Click on an area of interest to view site-specific data.</p>
        <p style="display: inline;"> Map view:</p>
        <form style="display: inline;">
          <input type="radio" name="bn" value="0" checked="checked" id="form-no-data" /> No Data
          <input type="radio" name="bn" value="1" id="form-rain-fall" /> Rainfall
          <input type="radio" name="bn" value="2" id="form-evapo" /> Evapotranspiration
        </form>
        <div id="nodataLanai">
          <img id="a" style="width:20%; height:auto" src="./islands/lanai.png" usemap="#HI">

          <map name="HI">
            <area shape="rect" coords="257,34,275,51" alt="a" href="./imagemap.html">
            <area shape="rect" coords="222,243,240,263" alt="Palani" href="#">
          </map>
        </div>

        <div id="rainfallLanai" style="padding-top: 200px; padding-bottom: 200px;">Coming Soon</div>

        <div id="evapotranspirationLanai">
          <img id="a" src="./islands/ET_Hi.png" usemap="#ET">

          <map name="ET">
            <area shape="rect" coords="257,34,275,51" alt="a" href="./imagemap.html">
            <area shape="rect" coords="222,243,240,263" alt="Palani" href="#">
          </map>
        </div>

      </div>

      <div id="showMolokai" class="myDiv">
        <p> Click on an area of interest to view site-specific data.</p>
        <p style="display: inline;"> Map view:</p>
        <form style="display: inline;">
          <input type="radio" name="bn" value="0" checked="checked" id="form-no-data" /> No Data
          <input type="radio" name="bn" value="1" id="form-rain-fall" /> Rainfall
          <input type="radio" name="bn" value="2" id="form-evapo" /> Evapotranspiration
        </form>
        <div id="nodataMolokai"><img style="width:30%; height:auto" src="./islands/molokai.png" alt="Moloka???i" /></div>
      </div>
      <div id="showOahu" class="myDiv">
        <p> Click on an area of interest to view site-specific data.</p>
        <p style="display: inline;"> Map view:</p>
        <form style="display: inline;">
          <input type="radio" name="bn" value="0" checked="checked" id="form-no-data" /> No Data
          <input type="radio" name="bn" value="1" id="form-rain-fall" /> Rainfall
          <input type="radio" name="bn" value="2" id="form-evapo" /> Evapotranspiration
        </form>
        <div id="nodataOahu"> <img style="width:30%; height:auto" src="./islands/oahu.png" alt="O???ahu" /></div>
      </div>
      <div id="showKauai" class="myDiv">
        <p> Click on an area of interest to view site-specific data.</p>
        <p style="display: inline;"> Map view:</p>
        <form style="display: inline;">
          <input type="radio" name="bn" value="0" checked="checked" id="form-no-data" /> No Data
          <input type="radio" name="bn" value="1" id="form-rain-fall" /> Rainfall
          <input type="radio" name="bn" value="2" id="form-evapo" /> Evapotranspiration
        </form>
        <div id="nodataKauai"><img style="width:30%; height:auto" src="./islands/kauai.png" alt="Kauai" /></div>
      </div>

    </div>


  </div>

  <div id="footer">Footer</div>
  <script>
    const d = new Date();
    const month = new Array();
    month[0] = "January";
    month[1] = "February";
    month[2] = "March";
    month[3] = "April";
    month[4] = "May";
    month[5] = "June";
    month[6] = "July";
    month[7] = "August";
    month[8] = "September";
    month[9] = "October";
    month[10] = "November";
    month[11] = "December";

    let year = d.getFullYear();
    let classYear = document.getElementsByClassName("year");

    let name = month[d.getMonth()];
    let classMonth = document.getElementsByClassName("month"); 

    for (i = 0; i < classYear.length; i++) {
        classYear[i].innerHTML = year;
    }

    for (i = 0; i < classMonth.length; i++) {
        classMonth[i].innerHTML = name;
    }
  </script>

</body>

</html>