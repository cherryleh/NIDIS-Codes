<html>

  <head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <link rel = "stylesheet" type = "text/css" href = "ranchpage.css">
      <link rel = "stylesheet" type = "text/css" href = "form.css">
      <link rel = "stylesheet" type = "text/css" href = "table.css">
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
      <script src=“Contents/jquery-1.9.1.js”></script>    
      <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
      <script src="http://code.jquery.com/jquery-latest.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
      <link rel = "stylesheet" type = "text/css" href = "header.css">

      <script> 
          $(function(){
              $("#header").load("./header.html"); 
              $("#footer").load("./footer.html"); 
            });

      </script>

    </head>

  <body>
    <div id="header">Header</div>
    <script>
      const etCSV = "et_df.csv"

      function plotFromCSV() {
          Plotly.d3.csv(etCSV, function(err, rows) {
              console.log(rows);
              processData(rows);
          });
      }

      function processData(allRows) {
          let x = [];
          let y1 = [];
          let row;
          let i = 0;
          while (i < allRows.length) {
              row = allRows[i];
              x.push(row["datetime"]);
              y1.push(row["ET"]);
              i += 1;
          }
          
          console.log("X", x);
          console.log("Y1", y1);
          makePlotly(x, y1,);
      }

      var selectorOptions = {
          buttons: [{
              step: 'month',
              stepmode: 'backward',
              count: 1,
              label: '1m'
          }, {
              step: 'month',
              stepmode: 'backward',
              count: 6,
              label: '6m'
          }, {
              step: 'year',
              stepmode: 'todate',
              count: 1,
              label: 'YTD'
          }, {
              step: 'year',
              stepmode: 'backward',
              count: 1,
              label: '1y'
          }, {
              step: 'all',
          }],
      };

      function makePlotly(x, y1) {
          let traces = [
              {
                  x: x,
                  y: y1,
                  name: "Evapotranspiration",
                  hovertemplate: 'Evapotranspiration: %{y}<extra></extra>',
                  line: {
                      color: "#387fba",
                      width: 3
                  }
                      
              }
          ];
          let layout = {
              yaxis: {
                  range: [-10, 80]
              },
              xaxis: {
                  rangeselector: selectorOptions,
                  rangeslider: {}
              },
          };
          let config = { 
              /*responsive: true,*/
              displayModeBar: true,
          };

              

          Plotly.newPlot("plot", traces, layout, config);
      }
      plotFromCSV();


    </script>
    <!--<script>
        const CSV = "ndvi_df.csv"
  
        function plotFromCSV() {
            Plotly.d3.csv(CSV, function(err, rows) {
                console.log(rows);
                processData(rows);
            });
        }
  
        function processData(allRows) {
            let x = [];
            let y1 = [];
            let row;
            let i = 0;
            while (i < allRows.length) {
                row = allRows[i];
                x.push(row["datetime"]);
                y1.push(row["NDVI"]);
                i += 1;
            }
            
            console.log("X", x);
            console.log("Y1", y1);
            makePlotly(x, y1,);
        }
  
        var selectorOptions = {
            buttons: [{
                step: 'month',
                stepmode: 'backward',
                count: 1,
                label: '1m'
            }, {
                step: 'month',
                stepmode: 'backward',
                count: 6,
                label: '6m'
            }, {
                step: 'year',
                stepmode: 'todate',
                count: 1,
                label: 'YTD'
            }, {
                step: 'year',
                stepmode: 'backward',
                count: 1,
                label: '1y'
            }, {
                step: 'all',
            }],
        };
  
        function makePlotly(x, y1) {
            let traces = [
                {
                    x: x,
                    y: y1,
                    name: "NDVI",
                    hovertemplate: 'NDVI: %{y}<extra></extra>',
                    line: {
                        color: "#387fba",
                        width: 3
                    }
                        
                }
            ];
            let layout = {
                yaxis: {
                    range: [0.2, 0.8]
                },
                xaxis: {
                    rangeselector: selectorOptions,
                    rangeslider: {}
                },
            };
            let config = { 
                responsive: true,
                displayModeBar: true,
            };
  
                
  
            Plotly.newPlot("ndvi", traces, layout, config);
        }
        plotFromCSV();
  
  
    </script>-->
    <script>
      $(document).ready(function(){
        $("input[name$='bn']").click(function(){
        var radio_value = $(this).val();
        /*var isl_value = $('#island-select option:selected')[0].value;*/
        console.log(radio_value)
          if(radio_value=='0') {
          $("#rainfall").show();
          $("#temp").hide();
          $("#ET").hide();
          $("#NDVI").hide();
        }
        else if(radio_value=='1') {
          $("#rainfall").hide();
          $("#temp").show();
          $("#ET").hide();
          $("#NDVI").hide();
        }
        else if(radio_value=='2') {
          $("#rainfall").hide();
          $("#temp").hide();
          $("#ET").show();
          $("#NDVI").hide();
        }
        else if(radio_value=='3') {
          $("#rainfall").hide();
          $("#temp").hide();
          $("#ET").hide();
          $("#NDVI").show();
          }
        });
        $('[name="bn"]:checked').trigger('click');
      });
    </script>

    <h5 id = "ranchsquare"> RS01 </h5>
    <div class="accordion" id="accordionPanelsStayOpenExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
            Average Climate Conditions
          </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
            <div class="accordion-body" style="height: 110%; width: 100%">
                <div id="radio">
                    <form style="display: inline; border: none; box-shadow: none">
                        <input type="radio" name="bn" value="0" /> Rainfall
                        <input type="radio" name="bn" value="1" /> Temperature
                        <input type="radio" name="bn" value="2" checked="checked"/> Evapotranspiration
                        <input type="radio" name="bn" value="3"/> NDVI
                    </form>
                </div>
                <div id="rainfall" class="myDiv">
                    <div class="name"> <p class="name">Rainfall</p></div>    
                </div>
                <div id="temp" class="myDiv">
                    <div class="name"> <p class="name">Temperature</p></div>
                </div>
                <div id="ET" class="myDiv">
                    <div class="name popup" onclick="popupFunction()"> <p>Evapotranspiration (mm/8 days)</p> <span class="popuptext" id="myPopup">A Simple Popup!</span></div>
                    <div class="wrap">
                        <div class="div1">
                            <img src="./islands/HI/RS4_et.png">
                            <!--<p> Evapotranspiration is the combination of processes that takes water from the surface and transforms it into water vapor in the air Source: Earth Engine</p>-->
                        </div>
                    </div>
                    <div class="wrap">
                        <div class="div3">
                            <div class="graph">
                                <img src="./graphs/RS01_ET.png">
                            </div> 
                        </div>
                    </div>
                    <div class="history">
                      <p> Historical Data </p>
                      <img src="./graphs/RS01_et_history.png">
                    </div>
                </div>
                <div id="NDVI" class="myDiv">
                  <div class="name popup"><p class="name">NDVI</p> </div>   
                <div class="wrap">
                    <div class="div1">
                        <img src="./islands/HI/RS4_et.png">
                    </div>
                </div>
                <div class="wrap">
                    <div class="div3">
                        <div class="graph">
                            <img src="./graphs/Palani Ranch_ndvi.png">
                        </div> 
                    </div>
                </div>
                <div class="history">
                  <div id="ndvi">
                    <p> Historical Data </p>
                    <img src="./graphs/RS01_ndvi_history.png">
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
            Animal Management, Decision Support and Forecasts
          </button>
        </h2>
        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
        <div class="accordion-body" id="body2">
                <p style="text-align: center"> The Decision support tool asks for four inputs: Grass type, dry matter per animal unit, number of animal units, and number of acres grazed.</p>
                
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
                <br>

                      <script>
                        /*var grasstype = $("#grasstype").val();
                          var drymatter = $("#drymatter").val();
                          var animalunits = $("#animalunits").val();
                          var acres = $("#acres").val();
                          $.post("new.php", { grasstype: grasstype, drymatter:drymatter, animalunits:animalunits, acres:acres },
                          function(data) {
                           $('#results').html(data);
                          });*/
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
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
            Past Droughts and Future Projections
          </button>
        </h2>
        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
          <div class="accordion-body" id="section 3">
            <div id="rainProj" class="sec3heading">
              <h5> <span>3-Month Rainfall Projections </span></h5>
              <img src="./graphs/RS01_rainfall.png">
            </div>
            <div id="rainHist" class="sec3heading">
              <h5><span> Average Rainfall and Temperature </span></h5>
              <img src=" ./RS01_BI/RS01_BI_Climograph.png">
            </div>
            <div id="rainTrend" class="sec3heading">
              <h5> <span>100-year Rainfall Trends</span></h5>
              <img src="./RS01_BI/RS01_BI_RF_Trend.png">
            </div>
            <div id="droughtHist" class="sec3heading">
              <h5><span> 100-year Drought History</span></h5>
              <img src="./RS01_BI/RS01_BIDrought_History.png">
            </div>
            
          </div> 
        </div>
      </div>
    </div>

    <div id="footer" style="margin-top: 19%">Footer</div>
  </body>
</html>