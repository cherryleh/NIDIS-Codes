<html>
    <body>
        <div>
        "Current version: " <span style="color:red"> <?php echo  file_get_contents('test.txt');?>;</span>
        </div>
        <p> <?php echo $_GET["ranch"]?></p>
        <img src='./maps/HI/<?php echo $_GET["ranch"]?>_et.png'>
    </body>
</html>