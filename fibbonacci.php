<?php
    $num = 2;
    $n1 = 0;
    $n2 = 1;
    echo "The Fibbonacci Series upto 10 Numbers<br>";
    echo $n1." ".$n2." ";
    while($num <10){
        $n3 = $n1 + $n2;
        echo $n3." ";
        $n1 = $n2;
        $n2 = $n3;
        $num++;
    }

?>