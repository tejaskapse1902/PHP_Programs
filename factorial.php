<?php
    $num = 8;
    $fact = 1;
    for($i = $num; $i >=1; $i--){
        $fact = $fact * $i;
    }
    echo "The Factorial of ".$num." is ".$fact;
?>