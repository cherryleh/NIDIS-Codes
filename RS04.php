
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>

    <script>
    $(function() {
        $("#header").load("./header.html");
        $("#footer").load("./footer.html");
    });
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="form.css">
    <link rel="stylesheet" type="text/css" href="table.css">
    <link rel="stylesheet" type="text/css" href="./header.css">
    <link rel="stylesheet" href="ranchpage.css">
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="plotly.js"></script>

</head>

<body>
    <aside id="sidebar">

        <nav class="sidebar py-2 mb-4">
            <ul class="nav flex-column" id="nav_accordion">
                <p style="padding-left: 2px; font-size: 24px"> Menu</p>
                <li class="nav-item has-submenu">
                    <a style="display:inline-block" class="nav-link" href="#climate-anchor"> Average Climate Conditions <div style="display:inline"><i class="bi bi-caret-down-fill"></i> </div></a> 
                    <ul class="submenu collapse">
                        <li><a class="nav-link" href="#rain-anchor">Rainfall </a></li>
                        <li><a class="nav-link" href="#">Temperature </a></li>
                        <li><a class="nav-link" href="#et-anchor">Evapotranspiration</a> </li>
                        <li><a class="nav-link" href="#NDVI-anchor">NDVI</a> </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#rainForecast-anchor"> Rainfall Forecast </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tool-anchor"> Animal Management and Decision Support Tool</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#data-anchor"> Historical Data</a>
                </li>
            </ul>
        </nav>
    </aside>
    <div class="header" id="header">Header</div>

    <div class="content">
        <div class="subcontent">
            <div class="anchor" id="climate-anchor"></div>
            <div id="climateConditions">
            <div class="anchor" id="rain-anchor"></div>
            <div id="rain">
                    <div class="name">
                        <p class="subtitle">Rainfall</p>
                        <div class="definition">
                            <p> Evapotranspiration is the combination of processes that takes water from the surface
                                and transforms it into water vapor in the air. These processes include the movement
                                of water through plant roots and the evaporation of that water through pores in the
                                plant's leaves, a process called transpiration. Water on the outsides of leaves,
                                such as water deposited by rain or fog interception, can be evaporated, a process
                                called wet canopy evaporation. Water can also evaporate directly from moist soil,
                                soil evaporation. To learn more, click <a
                                    href="http://evapotranspiration.geography.hawaii.edu/" target="_blank">here</a>.
                            </p>
                        </div>
                    </div>
                    <div class="charts">
                        <div class="map">
                            <img style="width: 100%; vertical-align: middle;" src="./maps/HI/RS04_et.png">
                        </div>
                        <div class="graph12m">
                            <div class="graphTitle">
                                <p> Rainfall <br> Past 12 months vs monthly averages </p>
                            </div>
                            <div class="monthlyPlot" id="RF-div"></div>
                            <p style="text-align: right; margin:0; padding-top: 1%"> Updated on the 8th of every
                                month </p>
                        </div>
                        <div class="histPlotly">
                            <div class="graphTitle">
                                <p> 20-year History</p>
                            </div>
                            <div id="dataRangeText" class="col-sm-12" align="center">
                              <p></p>
                            </div>
                            <div id="RF-hist">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="anchor" id="et-anchor"></div>
                <div id="evapotranspiration">
                    <div class="name">
                        <p class="subtitle">Evapotranspiration</p>
                        <div class="definition">
                            <p> Evapotranspiration is the combination of processes that takes water from the surface
                                and transforms it into water vapor in the air. These processes include the movement
                                of water through plant roots and the evaporation of that water through pores in the
                                plant's leaves, a process called transpiration. Water on the outsides of leaves,
                                such as water deposited by rain or fog interception, can be evaporated, a process
                                called wet canopy evaporation. Water can also evaporate directly from moist soil,
                                soil evaporation. To learn more, click <a
                                    href="http://evapotranspiration.geography.hawaii.edu/" target="_blank">here</a>.
                            </p>
                        </div>
                    </div>
                    <div class="charts">
                        <div class="map">
                            <img style="width: 100%; vertical-align: middle;" src="./maps/HI/RS04_et.png">
                        </div>
                        <div class="graph12m">
                            <div class="graphTitle">
                                <p> Evapotranspiration <br> Past 12 months vs monthly averages </p>
                            </div>
                            <div class="monthlyPlot" id="ET-div"></div>
                            <p style="text-align: right; margin:0; padding-top: 1%"> Updated on the 8th of every
                                month </p>
                        </div>
                        <div class="histPlotly">
                            <div class="graphTitle">
                                <p> 20-year History</p>
                            </div>
                            <div id="ET-hist">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="anchor" id="NDVI-anchor"></div>
                <div id="NDVI">
                    <div class="name">
                        <p class="subtitle">NDVI (Normalized Difference Vegetation Index)</p>
                        <div class="definition">
                            <p> Normalized Difference Vegetation Index (NDVI) is a widely used vegetation index that
                                measures the density of green in a region and is often used to monitor drought,
                                forecast agricultural production, and more. Values range from +1.0 to -1.0. High
                                NDVI values (approximately 0.6 to 0.9) suggest dense vegetation such as crops at
                                their peak growth.
                            </p>
                        </div>
                    </div>
                    <div class="charts">
                        <div class="map">
                            <img style="width: 100%; vertical-align: middle;" src="./maps/HI/RS04_et.png">
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
            <div class="anchor" id="rainForecast-anchor"></div>
            <div id="rainForecast">
                <p class="subtitle">Rainfall Forecast</p>
                <img id="gauge" src="./gauge/gauge.png"
                    style="width: 30%; display: block; margin-left: auto;margin-right: auto;">
                <div id="rainProj" class="sec3heading">
                    <p style="font-size: 20px">3-Month Rainfall Projections</p>
                    <img src="./graphs/RS04_rainfall.png">
                </div>
            </div>
            <div class="anchor" id="tool-anchor"></div>
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
                        Dry matter per animal units: <input id="drymatter" placeholder="26" class="question" type="text"
                            name="drymatter" value="<?php echo $drymatter;?>">
                        <br><br>
                        Number of animal units: <input id="animalunits" class="question" type="text" name="animalunits"
                            value="<?php echo $animalunits;?>">
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
            <div class="anchor" id="data-anchor"></div>
            <div id="data">
                <p class="subtitle">Historical Data</p>
                <div class="wrapperHist">
                    <div id="rainHist" class="graphHist box">
                        <p class="dataTitles" style="text-align: center">Average Rainfall and Temperature</p>
                        <img src=" ./RanchPointsRF/RS04_BI/RS04_BI_Climograph.png">
                    </div>
                    <span></span>
                    <div id="droughtHist" class="graphHist box">
                        <p class="dataTitles" style="text-align: center"> 100-year Drought History</p>
                        <img src="./RanchPointsRF/RS04_BI/RS04_BIDrought_History.png">
                    </div>
                </div>
                <div style="text-align: center">
                    <div id="rainTrend" class="box">
                        <p class="dataTitles" >100-year Rainfall Trends</p>
                        <img src="./RanchPointsRF/RS04_BI/RS04_BI_RF_Trend.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.sidebar .nav-link').forEach(function(element) {

            element.addEventListener('click', function(e) {

                let nextEl = element.nextElementSibling;
                let parentEl = element.parentElement;

                if (nextEl) {
                    e.preventDefault();
                    let mycollapse = new bootstrap.Collapse(nextEl);

                    if (nextEl.classList.contains('show')) {
                        mycollapse.hide();
                    } else {
                        mycollapse.show();
                        // find other submenus with class=show
                        var opened_submenu = parentEl.parentElement.querySelector(
                            '.submenu.show');
                        // if it exists, then close all of them
                        if (opened_submenu) {
                            new bootstrap.Collapse(opened_submenu);
                        }
                    }
                }
            }); // addEventListener
        }) // forEach
    });
    </script>

    <style>
    .sidebar li .submenu {
        list-style: none;
        margin: 0;
        padding: 0;
        padding-left: 1rem;
        padding-right: 1rem;
    }
    </style>
</body>