<?php
    function isPrime($num){
        if($num <2){
            return false;
        }
        for($i=1;$i<$num/2;$i++){
            if($num % $i == 0){
                return false;
            }
        }
        return true;
    }

    $number = 17;
    if(isPrime($number)){
        echo $number." The number is Prime";
    }else{
        echo $number." The number is Not Prime";
    }
?>