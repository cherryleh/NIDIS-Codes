<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>RS04</title>


    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="form.css">
    <link rel="stylesheet" type="text/css" href="table.css">


    <!-- Font Awesome JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="plotly.js"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Menu</h3>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="wwn-toggle">Average
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

        </nav>

        <!-- Page Content  -->
        <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                    <div class="logos">
                        <img src="./logos/NOAA.png">
                        <img src="./logos/NIDIS.jpeg">
                    </div>
                    <div href="" class="logo" style="display: inline;"> <a href="index.html"
                            style="text-decoration: none;"> Hawai&#x02BB;i Rangeland <br> Information Portal (Beta)</a>
                    </div>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Select Ranch</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Links</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
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


        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
            integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
        </script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
            integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
        </script>

        <script type="text/javascript">
        //if not mobile
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
                
                var widthMulti = screen.width * 0.55;

                var updateMulti = {
                  width: widthMulti,  // or any new width
                  height: 400  // " "
                };

                Plotly.relayout('ET-div', updateMulti);
               
                
                var widthSingle = screen.width * 0.95;

                var updateSingle = {
                  width: widthSingle,  // or any new width
                  height: 400  // " "
                };

                Plotly.relayout('ET-hist', updateSingle);

                Plotly.relayout('NDVI-div', updateMulti);

                Plotly.relayout('NDVI-hist', updateSingle);
                console.log(screen.width)
            });
        });
        </script>
</body>

</html>