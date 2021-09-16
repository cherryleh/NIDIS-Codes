<?php

  $grasstype=$_POST['grasstype'];
  $drymatter=$_POST['drymatter'];
  $animalunits=$_POST['animalunits'];
  $acres=$_POST['acres'];

  $command = "./test.py 2>&1 $grasstype $drymatter $animalunits $acres";
  $pid = popen( $command,"r");
  while( !feof( $pid ) )
  {
   echo fread($pid, 256);
   flush();
   ob_flush();
   usleep(100000);
  }
  pclose($pid);
?>