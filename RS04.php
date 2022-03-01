<html>
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <link rel = "stylesheet" type = "text/css" href = "./header.css">
        <link rel = "stylesheet" type = "text/css" href="./rs.css">
        <link rel="stylesheet" type="text/css" href="./footer.css">
        <link rel = "stylesheet" type = "text/css" href = "form.css">
        <link rel = "stylesheet" type = "text/css" href = "table.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
        <script src="./Plotly/plotlygraphs.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
          <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
          <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
          <script src = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
        <script>
            $(function(){
            $("#header").load("./header.html");
            $("#footer").load("./footer.html");
            });
            

        </script>
    </head>
    <body>
        <div id="header">Header</div>




        <div class="sidenav">
            <div class="container" id="container">
                <div class="card" id="card">
                    <div class="card-header" id="card">
                      <a data-toggle="collapse" href="#collapse-example" aria-expanded="true" aria-controls="collapse-example"  id="category">
                          <i class="fa fa-chevron-down pull-right"></i>
                          Average Climate Conditions
                      </a>
                    </div>
                    <div id="collapse-example" class="collapse" aria-labelledby="heading-example">
                        <div class="card-block" id="subcat">
                            <div style="padding-left: 5px">
                                <a href="#temp" >Temperature</a>  

                                <a href="#rain">Rainfall</a>  
                                    <div class="show" id="rain">Open Block 2</div>  
                                <a href="#et">ET</a>  
                                <a href="#ndvi">NDVI</a>  
                                    <div class="show" id="ndvi">Open Block 4</div>  
                            </div>     
                        </div>
                    </div>
                </div>

          </div>
               
          <a href="#rainForecast">Rainfall Forecast</a>
          <a href="#tool">Animal Management and Decision Support</a>
          <a href="#data">Historical Data</a>

            
        </div>

        <div class="main" style="padding-top: 80px; margin-left: 400px">
            <div class="show" id="et" > 
                <div class="name"> 
                  <h5>Evapotranspiration</h5>
                </div>

                <div class="wrap">
                  <div class="div1">
                    <img src="./islands/HI/RS04_et.png">
                  </div>
                </div>
                <div class="wrap">
                  <div class="div3">
                  <div id="plotly-div">
                  </div> 
                </div>
                <div id="myDiv2"></div>
            </div>

            </div>

            <div class="show" id="rainForecast">
                <div class="name"> 
                  <h5>Rainfall Forecast</h5>
                </div>
              <div id="gauge" class="box">
                <img src="./gauge/gauge-2.png" >
              </div>
              <div id="rainProj" class="box">
                <h5> <span>3-Month Rainfall Projections </span></h5>
                <img src="./graphs/RS04_rainfall.png">
              </div>


            </div>

            <div class="show" id="tool">
              <div id="input">
                  <p><span class="error" style="margin-left: 25%">* required field</span></p>
                  <form id="myForm" method="post" >
                    Grass Type: <select class="question" id = "grasstype" name="grasstype" >
                        <option value="Kikuyu" <?php if(isset($_POST['grasstype']) && $_POST['grasstype'] == 'Kikuyu') echo ' selected="selected"';?> >Kikuyu Grass</option>
                        <option value="Pangola"<?php if(isset($_POST['grasstype']) && $_POST['grasstype'] == 'Pangola') echo ' selected="selected"';?>>Pangola Grass</option>
                        <option value="Buffel"<?php if(isset($_POST['grasstype']) && $_POST['grasstype'] == 'Buffel') echo ' selected="selected"';?>>Buffelgrass</option>
                        <option value="MixKikuyu"<?php if(isset($_POST['grasstype']) && $_POST['grasstype'] == 'MixKikuyu') echo ' selected="selected"';?>>Mix Kikuyu Grass</option>
                        <option value="Guinea"<?php if(isset($_POST['grasstype']) && $_POST['grasstype'] == 'Guinea') echo ' selected="selected"';?>>Guineagrass</option>
                    </select> 
                    <br><br>  
                    Dry matter per animal units:    <input id="drymatter" placeholder="26" class="question" type="text" name="drymatter" value="<?php echo $drymatter;?>">
                    <br><br>
                    Number of animal units: <input id="animalunits" class="question" type="text" name="animalunits" value="<?php echo $animalunits;?>">
                    <span class="error">* </span>
                    <br><br>
                    Number of acres grazed: <input id="acres"class="question" type="text" name="acres" value="<?php echo $acres;?>">
                    <span class="error">* </span>
                    <br><br>

                    <input type="button" id="submit" onclick=" showDiv(); SubmitFormData();" value="Submit" />
                  </form>
                </div>
                <div id="results" style="display:none; padding-top:50px">
                </div>
                <script>
                  var input = document.getElementById("input");
                   input.addEventListener("keydown", function (e) {
                    if (e.key === "Enter") {  
                      e.preventDefault();
                      document.getElementById("submit").click();
                    }
                  });

                  function SubmitFormData() {
                      var x = document.forms["myForm"]["animalunits"].value;
                        if (x == "" || x == null) {
                          alert("Number of animal units must be filled out");
                          return false;
                        }
                      var y = document.forms["myForm"]["acres"].value;
                        if (y == "" || y == null) {
                          alert("Number of acres grazed must be filled out");
                          return false;
                        }
                      var grasstype = $("#grasstype").val();
                      var drymatter = $("#drymatter").val();
                      var animalunits = $("#animalunits").val();
                      var acres = $("#acres").val();
                      $.post("tool.php", { grasstype: grasstype, drymatter:drymatter, animalunits:animalunits, acres:acres },
                      function(data) {
                       $('#results').html(data);
                      });}
                      

                  function showDiv() {
                     document.getElementById('results').style.display = "block";
                  }
                          
                  function popupFunction() {
                    var popup = document.getElementById("myPopup");
                    popup.classList.toggle("show");
                }
              </script>
            </div>

            <div class="show" id="data">
                <div class="name"> 
                    <h5>Historical Data</h5>
                </div>
                <div class="wrapper">
                  <div id="rainHist" class="box">
                      <p>Average Rainfall and Temperature</p>
                    <img src=" ./RanchPointsRF/RS04_BI/RS04_BI_Climograph.png">
                  </div>
                  <span></span>
                  <div id="droughtHist" class="box">
                    <p> 100-year Drought History</p>
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

                <br>

        </div>

        <!--<div id="footer">Footer</div>-->
        <script>
            jQuery(document).ready(function($) {
              $('.show') .hide()
            $('a[href^="#"]').on('click', function(event) {
            $('.show') .hide()
                var target = $(this).attr('href');

                $('.show'+target).toggle();

            });
            });
        </script>


    </body>
</html>