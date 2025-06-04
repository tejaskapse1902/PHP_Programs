<?php
    $n1=$_GET['num1'];
    $n2=$_GET['num2'];
    if((!empty($n1)) && (!empty($n2)))
    {
        $add=$n1+$n2;
        echo "Addition = ".$add;
    }
    else "enter both nos";
?>