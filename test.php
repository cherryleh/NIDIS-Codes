<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Collapsible sidebar using Bootstrap 4</title>


        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style.css">
        <link rel = "stylesheet" type = "text/css" href = "form.css">
        <link rel = "stylesheet" type = "text/css" href = "table.css">
    

        <!-- Font Awesome JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
        <script src="plotly.js"></script>
    </head>

    <body>
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
    </body>
</html>