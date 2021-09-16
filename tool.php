<html>

    <head>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <link rel = "stylesheet" type = "text/css" href = "form.css">
        <link rel="stylesheet" type="text/css" href="table.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!--<script src="http://code.jquery.com/jquery-latest.js"></script>-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <script> 
        $(function(){
          $("#header").load("header.html"); 
          $("#footer").load("footer.html");
        });
        </script>
        </head>

    <body>
        <div id="header" >Header</div>

        

        <table id="input">
        <tbody>
          <form id="myForm" method="post">
          <tr><td class="col-xs-6">Grass Type:</td>
          <div style="width: 400px"><td><select id="grasstype" class="col-sm-6">
                <option value="Kikuyu" <?php if(isset($_POST['grasstype']) && $_POST['grasstype'] == 'Kikuyu') echo ' selected="selected"';?> >Kikuyu Grass</option>
                <option value="Pangola"<?php if(isset($_POST['grasstype']) && $_POST['grasstype'] == 'Pangola') echo ' selected="selected"';?>>Pangola Grass</option>
                <option value="Buffel"<?php if(isset($_POST['grasstype']) && $_POST['grasstype'] == 'Buffel') echo ' selected="selected"';?>>Buffelgrass</option>
                <option value="MixKikuyu"<?php if(isset($_POST['grasstype']) && $_POST['grasstype'] == 'MixKikuyu') echo ' selected="selected"';?>>Mix Kikuyu Grass</option>
                <option value="Guinea"<?php if(isset($_POST['grasstype']) && $_POST['grasstype'] == 'Guinea') echo ' selected="selected"';?>>Guineagrass</option>
            </select></td></tr></div>
            <tr><td class="col-xs-6" > Dry matter per animal units:</td> <td><input type="text" id="drymatter" placeholder="26" class="col-sm-6" value="<?php echo isset($_POST['drymatter']) ? $_POST['drymatter'] : '' ?>" /></td>
            <tr><td class="col-xs-6">Number of animal units:</td> <td><input type="text" id="animalunits" class="col-sm-6" value="<?php echo isset($_POST['animalunits']) ? $_POST['animalunits'] : '' ?>"/></td>
            <tr><td class="col-xs-6">Number of acres grazed:</td> <td><input type="text" id="acres" class="col-sm-6" value="<?php echo isset($_POST['acres']) ? $_POST['acres'] : '' ?>"/></td>
          

            <tr ><td id="submit" colspan="2"><input type="button" id="submitFormData" onclick="SubmitFormData(); " value="Submit" /></td>
           </form>
        </tbody>
        </table>
        <!--<form id="myForm" method="post">
          Grass Type:
          <select id="grasstype" class="col-sm-6">
                <option value="Kikuyu" <?php if(isset($_POST['grasstype']) && $_POST['grasstype'] == 'Kikuyu') echo ' selected="selected"';?> >Kikuyu Grass</option>
                <option value="Pangola"<?php if(isset($_POST['grasstype']) && $_POST['grasstype'] == 'Pangola') echo ' selected="selected"';?>>Pangola Grass</option>
                <option value="Buffel"<?php if(isset($_POST['grasstype']) && $_POST['grasstype'] == 'Buffel') echo ' selected="selected"';?>>Buffelgrass</option>
                <option value="MixKikuyu"<?php if(isset($_POST['grasstype']) && $_POST['grasstype'] == 'MixKikuyu') echo ' selected="selected"';?>>Mix Kikuyu Grass</option>
                <option value="Guinea"<?php if(isset($_POST['grasstype']) && $_POST['grasstype'] == 'Guinea') echo ' selected="selected"';?>>Guineagrass</option>
            </select>
             Dry matter per animal units: <input type="text" id="drymatter" placeholder="26" class="col-sm-6" value="<?php echo isset($_POST['drymatter']) ? $_POST['drymatter'] : '' ?>" />
             Number of animal units:<input type="text" id="animalunits" class="col-sm-6" value="<?php echo isset($_POST['animalunits']) ? $_POST['animalunits'] : '' ?>"/>
             Number of acres grazed:<input type="text" id="acres" class="col-sm-6" value="<?php echo isset($_POST['acres']) ? $_POST['acres'] : '' ?>"/>
          

            <input type="button" id="submitFormData" onclick="SubmitFormData(); showDiv()" value="Submit" />
           </form>
           <br/>-->

           <div id="results">
           <!-- All data will display here  -->
           </div>
           <script>
                
            </script>

        
        <br>
        
        <div id="output">Output</div>

        <script>

            function SubmitFormData() {
                var grasstype = $("#grasstype").val();
                var drymatter = $("#drymatter").val();
                var animalunits = $("#animalunits").val();
                var acres = $("#acres").val();
                $.post("sendtopython.php", { grasstype: grasstype, drymatter: drymatter, animalunits:animalunits, acres:acres},
                function(data) {
                 $('#results').html(data);
                });
            }

            function showDiv() {
               document.getElementById('output').style.display = "block";
            }

            $(function() {
              $("#submit").click(function() {
                 $("#output").load("python.html")
              })
            })
        </script>

        <div id="footer" style="padding-top: 100px">Footer</div>

    </body>
</html>