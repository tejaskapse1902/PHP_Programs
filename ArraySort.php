<?php
    $array1 = array("Tejas", 90, 67.89, 1000,true);
    $array2 = array("Tejas", 90, 67.89, 1000,true);

    sort($array1);
    sort($array2);

    if($array1 === $array2){
        echo "Both arrays are equal";
    }
    else{
        echo "Both arrays are not equal";
    }
?>