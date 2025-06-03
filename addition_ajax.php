<?php
  $num1=$_GET['num1'];
  $num2=$_GET['num2'];

  $n1 = (int) $num1; 
  $n2 = (int) $num2; 

if((isset($n1)) && (isset($n2)))
  {
    $add=$n1+$n2;
    echo "Addition = ".$add;
  }
  else "enter both nos";
?>  
