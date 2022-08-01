<html><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="generator" content="Codeply">
  <title>Codeply simple HTML/CSS/JS preview</title>
  <base target="_self"> 

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">  
  
  <link rel="stylesheet" href="style.css">
<link rel="stylesheet" type="text/css" href="form.css">
<link rel="stylesheet" type="text/css" href="table.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  <script src="plotly.js"></script>

  <style>/*!
 * Start Bootstrap - Simple Sidebar HTML Template (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

/* Toggle Styles */

#wrapper {
    padding-left: 0;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled {
    padding-left: 250px;
}

#sidebar-wrapper {
    position: fixed;
    left: 250px;
    z-index: 1000;
    overflow-y: auto;
    margin-left: -250px;
    width: 0;
    height: 100%;
    background: #000;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled #sidebar-wrapper {
    width: 250px;
}

#page-content-wrapper {
    padding: 15px;
    width: 100%;
}

#wrapper.toggled #page-content-wrapper {
    position: absolute;
    margin-right: -250px;
}

/* Sidebar Styles */

.sidebar-nav {
    position: absolute;
    top: 0;
    margin: 0;
    padding: 0;
    width: 250px;
    list-style: none;
}

.sidebar-nav li {
    text-indent: 20px;
    line-height: 40px;
}

.sidebar-nav li a {
    display: block;
    color: #999999;
    text-decoration: none;
}

.sidebar-nav li a:hover {
    background: rgba(255, 255, 255, 0.2);
    color: #fff;
    text-decoration: none;
}

.sidebar-nav li a:active,
.sidebar-nav li a:focus {
    text-decoration: none;
}

.sidebar-nav > .sidebar-brand {
    height: 65px;
    font-size: 18px;
    line-height: 60px;
}

.sidebar-nav > .sidebar-brand a {
    color: #999999;
}

.sidebar-nav > .sidebar-brand a:hover {
    background: none;
    color: #fff;
}

@media (min-width: 768px) {
    #wrapper {
        padding-left: 250px;
    }

    #wrapper.toggled {
        padding-left: 0;
    }

    #sidebar-wrapper {
        width: 250px;
    }

    #wrapper.toggled #sidebar-wrapper {
        width: 0;
    }

    #page-content-wrapper {
        padding: 20px;
    }

    #wrapper.toggled #page-content-wrapper {
        position: relative;
        margin-right: 0;
    }
}</style>
</head>
<body data-new-gr-c-s-check-loaded="14.1052.0" data-gr-ext-installed="">
  <nav class="navbar navbar-fixed-top" role="navigation">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#menu-toggle" id="menu-toggle"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>
        </div>


</nav>

<div id="wrapper" class="toggled">
    <div class="container-fluid">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <br>
                </li>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Average
                        Climate Conditions</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Rainfall</a>
                        </li>
                        <li>
                            <a href="#">Temperature</a>
                        </li>
                        <li>
                            <a href="#evaotranspiration">Evapotranspiration</a>
                        </li>
                        <li>
                            <a href="#NDVI">NDVI</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#rainForecast">Rainfall Forecast</a>
                </li>
                <li>
                    <a href="#tool">Animal Management and Decision Support Tool</a>
                </li>
                <li>
                    <a href="#data">Historical Data</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
            <div height=auto>
                    <h4 style="text-align: center; padding:0">RS04</h4>
                    <div class="climateConditions">
                        <div id="evapotranspiration">
                            <div class="name">
                                <p class="subtitle">Evapotranspiration</p>
                                <div class="definition">
                                    <p> Evapotranspiration is the combination of processes that takes water from the surface
                                        and transforms it into water vapor in the air. These processes include the movement
                                        of water through plant roots and the evaporation of that water through pores in the
                                        plant’s leaves, a process called transpiration. Water on the outsides of leaves,
                                        such as water deposited by rain or fog interception, can be evaporated, a process
                                        called wet canopy evaporation. Water can also evaporate directly from moist soil,
                                        soil evaporation. To learn more, click <a
                                            href="http://evapotranspiration.geography.hawaii.edu/" target="_blank">here.</a>
                                    </p>
                                </div>
                            </div>
                            <div class="containerA">
                                <div class="map">
                                    <img style="width: 100%; vertical-align: middle;" src="./islands/HI/RS04_et.png">
                                </div>
                                <div class="graph12m">
                                    <div class="graphText">
                                        <p> Evapotranspiration <br> Past 12 months vs monthly averages </p>
                                    </div>
                                    <div class="monthlyPlot" id="ET-div"></div>
                                    <p style="text-align: right; margin:0; padding-top: 1%"> Updated on the 8th of every
                                        month </p>
                                </div>
                                <div class="histPlotly">
                                    <div class="graphText">
                                        <p> 20-year History</p>
                                    </div>
                                    <div id="ET-hist">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id="NDVI">
                            <div class="name">
                                <p class="subtitle">NDVI (Normalized Difference Vegetation Index)</p>
                                <div class="definition">
                                    <p> Normalized Difference Vegetation Index (NDVI) is a widely used vegetation index that measures the density of green in a region and is often used to monitor drought, forecast agricultural production, and more. Values range from +1.0 to -1.0. High NDVI values (approximately 0.6 to 0.9) suggest dense vegetation such as crops at their peak growth. 
                                    </p>
                                </div>
                            </div>
                            <div class="containerA">
                                <div class="map">
                                    <img style="width: 100%; vertical-align: middle;" src="./islands/HI/RS04_et.png">
                                </div>
                                <div class="graph12m">
                                    <div class="graphText">
                                        <p> Evapotranspiration <br> Past 12 months vs monthly averages </p>
                                    </div>
                                    <div class="monthlyPlot" id="NDVI-div"></div>
                                    <p style="text-align: right; margin:0; padding-top: 1%"> Updated on the 8th of every
                                        month </p>
                                </div>
                                <div class="histPlotly">
                                    <div class="graphText">
                                        <p> 20-year History</p>
                                    </div>
                                    <div id="NDVI-hist">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div id="rainForecast">
                        <p class="subtitle">Rainfall Forecast</p>
                        <img src="./gauge/gauge.png"
                            style="width: 30%; display: block; margin-left: auto;margin-right: auto;">
                        <div id="rainProj" class="sec3heading">
                            <p style="font-size: 20px">3-Month Rainfall Projections</p>
                            <img src="./graphs/RS04_rainfall.png">
                        </div>
                    </div>

                    <div id="tool">
                        <p class="subtitle">Animal Management and Decision Support Tool</p>
                        <div id="input">
                            <p><span class="error" style="margin-left: 25%">* required field</span></p>
                            <form id="myForm" method="post">
                                Grass Type: <select class="question" id="grasstype" name="grasstype">
                                    <option value="Kikuyu"
                                        <?php if(isset($_POST['grasstype']) && $_POST['grasstype'] == 'Kikuyu') echo ' selected="selected"';?>>
                                        Kikuyu Grass</option>
                                    <option value="Pangola"
                                        <?php if(isset($_POST['grasstype']) && $_POST['grasstype'] == 'Pangola') echo ' selected="selected"';?>>
                                        Pangola Grass</option>
                                    <option value="Buffel"
                                        <?php if(isset($_POST['grasstype']) && $_POST['grasstype'] == 'Buffel') echo ' selected="selected"';?>>
                                        Buffelgrass</option>
                                    <option value="MixKikuyu"
                                        <?php if(isset($_POST['grasstype']) && $_POST['grasstype'] == 'MixKikuyu') echo ' selected="selected"';?>>
                                        Mix Kikuyu Grass</option>
                                    <option value="Guinea"
                                        <?php if(isset($_POST['grasstype']) && $_POST['grasstype'] == 'Guinea') echo ' selected="selected"';?>>
                                        Guineagrass</option>
                                </select>
                                <br><br>
                                Dry matter per animal units: <input id="drymatter" placeholder="26" class="question"
                                    type="text" name="drymatter" value="<?php echo $drymatter;?>">
                                <br><br>
                                Number of animal units: <input id="animalunits" class="question" type="text"
                                    name="animalunits" value="<?php echo $animalunits;?>">
                                <span class="error">* </span>
                                <br><br>
                                Number of acres grazed: <input id="acres" class="question" type="text" name="acres"
                                    value="<?php echo $acres;?>">
                                <span class="error">* </span>
                                <br><br>

                                <input type="button" id="submit" onclick=" showDiv(); SubmitFormData();" value="Submit" />
                            </form>
                        </div>
                        <div id="results" style="display:none; padding-top:50px">
                        </div>
                        <script>
                        var input = document.getElementById("input");
                        input.addEventListener("keydown", function(e) {
                            if (e.key === "Enter") {
                                e.preventDefault();
                                document.getElementById("submit").click();
                            }
                        });

                        function SubmitFormData() {
                            var regExp = /[a-zA-Z]/g;
                            var x = document.forms["myForm"]["animalunits"].value;
                            if (x == "" || x == null) {
                                alert("Number of animal units must be filled out");
                                return false;
                            } else if (regExp.test(x)) {
                                alert("Number of animal units must be a number");
                                return false;
                            }
                            var y = document.forms["myForm"]["acres"].value;
                            if (y == "" || y == null) {
                                alert("Number of acres grazed must be filled out");
                                return false;
                            } else if (regExp.test(y)) {
                                alert("Number of acres grazed must be a number");
                                return false;
                            }

                            var regExp = /[a-zA-Z]/g;



                            var grasstype = $("#grasstype").val();
                            var drymatter = $("#drymatter").val();
                            var animalunits = $("#animalunits").val();
                            var acres = $("#acres").val();
                            $.post("tool.php", {
                                    grasstype: grasstype,
                                    drymatter: drymatter,
                                    animalunits: animalunits,
                                    acres: acres
                                },
                                function(data) {
                                    $('#results').html(data);
                                });
                        }


                        function showDiv() {
                            document.getElementById('results').style.display = "block";
                        }

                        function popupFunction() {
                            var popup = document.getElementById("myPopup");
                            popup.classList.toggle("show");
                        }
                        </script>
                    </div>

                    <div id="data">
                        <p class="subtitle">Historical Data</p>
                        <div class="wrapper">
                            <div id="rainHist" class="box">
                                <p style="text-align: center">Average Rainfall and Temperature</p>
                                <img src=" ./RanchPointsRF/RS04_BI/RS04_BI_Climograph.png">
                            </div>
                            <span></span>
                            <div id="droughtHist" class="box">
                                <p style="text-align: center"> 100-year Drought History</p>
                                <img src="./RanchPointsRF/RS04_BI/RS04_BIDrought_History.png">
                            </div>
                        </div>
                        <div style="text-align: center">
                            <div id="rainTrend" class="box">
                                <p>100-year Rainfall Trends</p>
                                <img src="./RanchPointsRF/RS04_BI/RS04_BI_RF_Trend.png">
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
</div>
<!-- /#wrapper -->

  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script>
  $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    console.log('hello')
    });
  </script>



</body><grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration></html>